<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth
*
* Author: Ben Edmunds
*		  ben.edmunds@gmail.com
*         @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

class Ion_auth
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;

	/**
	 * account status ('not_activated', etc ...)
	 *
	 * @var string
	 **/
	protected $status;

	/**
	 * extra where
	 *
	 * @var array
	 **/
	public $_extra_where = array();

	/**
	 * extra set
	 *
	 * @var array
	 **/
	public $_extra_set = array();

	/**
	 * __construct
	 *
	 * @return void
	 * @author Ben
	 **/
	public function __construct()
	{
		// $this =& get_instance();
		$this->load->config('ion_auth', TRUE);
		$this->load->library('email');
		$this->load->library('session');
		$this->lang->load('ion_auth');
		$this->load->model('ion_auth_model');
		$this->load->helper('cookie');

		//auto-login the user if they are remembered
		if (!$this->logged_in() && get_cookie('identity') && get_cookie('remember_code'))
		{
			$this->ion_auth = $this;
			$this->ion_auth_model->login_remembered_user();
		}

		$this->ion_auth_model->trigger_events('library_constructor');
	}

	/**
	 * __call
	 *
	 * Acts as a simple way to call model methods without loads of stupid alias'
	 *
	 **/
	public function __call($method, $arguments)
	{
		if (!method_exists( $this->ion_auth_model, $method) )
		{
			throw new Exception('Undefined method Ion_auth::' . $method . '() called');
		}

		return call_user_func_array( array($this->ion_auth_model, $method), $arguments);
	}

	/**
	 * __get
	 *
	 * Enables the use of CI super-global without having to define an extra variable.
	 *
	 * I can't remember where I first saw this, so thank you if you are the original author. -Militis
	 *
	 * @access	public
	 * @param	$var
	 * @return	mixed
	 */
	public function __get($var)
	{
		return get_instance()->$var;
	}


	/**
	 * forgotten password feature
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function forgotten_password($identity)    //changed $email to $identity
	{
		if ( $this->ion_auth_model->forgotten_password($identity) )   //changed
		{
			// Get user information
			$user = $this->where($this->config->item('identity', 'ion_auth'), $identity)->users()->row();  //changed to get_user_by_identity from email

			if ($user)
			{
				$data = array(
					'identity'		=> $user->{$this->config->item('identity', 'ion_auth')},
					'forgotten_password_code' => $user->forgotten_password_code
				);

				$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_forgot_password', 'ion_auth'), $data, true);
				$this->email->clear();
				$this->email->set_newline("\r\n");
				$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
				$this->email->to($user->email);
				$this->email->subject($this->config->item('site_title', 'ion_auth') . ' - Forgotten Password Verification');
				$this->email->message($message);

				if ($this->email->send())
				{
					$this->set_message('forgot_password_successful');
					return TRUE;
				}
				else
				{
					$this->set_error('forgot_password_unsuccessful');
					return FALSE;
				}
			}
			else
			{
				$this->set_error('forgot_password_unsuccessful');
				return FALSE;
			}
		}
		else
		{
			$this->set_error('forgot_password_unsuccessful');
			return FALSE;
		}
	}

	/**
	 * forgotten_password_complete
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function forgotten_password_complete($code)
	{
		$this->ion_auth_model->trigger_events('pre_password_change');

		$identity = $this->config->item('identity', 'ion_auth');
		$profile  = $this->where('forgotten_password_code', $code)->users()->row(); //pass the code to profile

		if (!is_object($profile))
		{
			$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));
			$this->set_error('password_change_unsuccessful');
			return FALSE;
		}

		$new_password = $this->ion_auth_model->forgotten_password_complete($code, $profile->salt);

		if ($new_password)
		{
			$data = array(
				'identity'     => $profile->{$identity},
				'new_password' => $new_password
			);

			$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_forgot_password_complete', 'ion_auth'), $data, true);

			$this->email->clear();
			$this->email->set_newline("\r\n");
			$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
			$this->email->to($profile->email);
			$this->email->subject($this->config->item('site_title', 'ion_auth') . ' - New Password');
			$this->email->message($message);

			if ($this->email->send())
			{
				$this->set_message('password_change_successful');
				$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_successful'));
				return TRUE;
			}
			else
			{
				$this->set_error('password_change_unsuccessful');
				$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));
				return FALSE;
			}
		}

		$this->ion_auth_model->trigger_events(array('post_password_change', 'password_change_unsuccessful'));
		return FALSE;
	}

	/**
	 * register
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function register($username, $password, $email, $additional_data = array(), $group_name = array()) //need to test email activation
	{
		$this->ion_auth_model->trigger_events('pre_account_creation');

		$email_activation = $this->config->item('email_activation', 'ion_auth');

		if (!$email_activation)
		{
			$id = $this->ion_auth_model->register($username, $password, $email, $additional_data, $group_name);
			if ($id !== FALSE)
			{
				$this->set_message('account_creation_successful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful'));
				return $id;
			}
			else
			{
				$this->set_error('account_creation_unsuccessful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));
				return FALSE;
			}
		}
		else
		{
			$id = $this->ion_auth_model->register($username, $password, $email, $additional_data, $group_name);

			if (!$id)
			{
				$this->set_error('account_creation_unsuccessful');
				return FALSE;
			}

			$deactivate = $this->ion_auth_model->deactivate($id);

			if (!$deactivate)
			{
				$this->set_error('deactivate_unsuccessful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));
				return FALSE;
			}

			$activation_code = $this->ion_auth_model->activation_code;
			$identity        = $this->config->item('identity', 'ion_auth');
			$user            = $this->ion_auth_model->user($id)->row();

			$data = array(
				'identity'   => $user->{$identity},
				'id'         => $user->id,
				'email'      => $email,
				'activation' => $activation_code,
			);

			$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_activate', 'ion_auth'), $data, true);

			$this->email->clear();
			$this->email->set_newline("\r\n");
			$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
			$this->email->to($email);
			$this->email->subject($this->config->item('site_title', 'ion_auth') . ' - Account Activation');
			$this->email->message($message);

			if ($this->email->send() == TRUE)
			{
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));
				$this->set_message('activation_email_successful');
				return $id;
			}

			$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful'));
			$this->set_error('activation_email_unsuccessful');
			return FALSE;
		}
	}

	/**
	 * invitation
	 *
	 * @return void
	 * @author isaak mogetutu <imogetutu@gmail.com>
	 **/
	public function invitation_request($username, $password, $email, $additional_data)
	//need to test email activation
	{
		$referrer = $this->current_user();
		$this->ion_auth_model->trigger_events('pre_account_creation');

		$email_activation = $this->config->item('email_activation', 'ion_auth');

		if (!$email_activation)
		{
			$id = $this->ion_auth_model->register($username, $password, $email, $additional_data);
			if ($id !== FALSE)
			{
				$this->session->set_flashdata('message','Invitation Creation was Successful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful'));
				return $id;
			}
			else
			{
				$this->set_error('invitation_creation_unsuccessful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));
				return FALSE;
			}
		}
		else
		{
			$id = $this->ion_auth_model->register($username, $password, $email, $additional_data);

			if (!$id)
			{
				$this->set_error('invitation_creation_unsuccessful');
				return FALSE;
			}

			$deactivate = $this->ion_auth_model->deactivate($id);

			if (!$deactivate)
			{
				$this->set_error('deactivate_unsuccessful');
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful'));
				return FALSE;
			}

			// Add Referrer to record created
			$this->db->where('id',$id)->update('users', array('referral_id'=>$referrer));

			$activation_code = $this->ion_auth_model->activation_code;
			$user            = $this->ion_auth_model->user($id)->row();
			$identity        = $this->config->item('identity', 'ion_auth');
			$referral        = $this->ion_auth_model->user($referrer)->row();
			$data = array(
				'referrer'   => $referral->username,
				'id'         => $user->id,
				'identity'	 => $user->{$identity},
				'email'      => $email,
				'password'   => $password,
				'activation' => $activation_code,
			);

			$message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('email_invite', 'ion_auth'), $data, true);

			$this->email->clear();
			$this->email->set_newline("\r\n");
			$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
			$this->email->to($email);
			$this->email->subject($this->config->item('site_title', 'ion_auth') . ' - Account Invitation');
			$this->email->message($message);

			if ($this->email->send() == TRUE)
			{
				$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));
				$this->set_message('activation_email_successful');
				return $id;
			}

			$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful'));
			$this->set_error('activation_email_unsuccessful');
			return FALSE;
		}
	}

	/**
	 * logout
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function logout()
	{
		$this->ion_auth_model->trigger_events('logout');

		$identity = $this->config->item('identity', 'ion_auth');
		$this->session->unset_userdata($identity);
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('user_id');

		//delete the remember me cookies if they exist
		if (get_cookie('identity'))
		{
			delete_cookie('identity');
		}
		if (get_cookie('remember_code'))
		{
			delete_cookie('remember_code');
		}

		$this->session->sess_destroy();
		$this->set_message('logout_successful');
		return TRUE;
	}

	/**
	 * logged_in
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function logged_in()
	{
		$this->ion_auth_model->trigger_events('logged_in');

		$identity = $this->config->item('identity', 'ion_auth');

		return (bool) $this->session->userdata($identity);
	}

	public function logged_in_check($url = 'auth')
	{
		if (!$this->logged_in())
		{
			redirect($url,'refresh');
		}
	}

	public function current_user()
	{
		return $this->session->userdata('user_id');
	}

	public function profile()
	{
		return $this->ion_auth_model->user()->row();
	}

	/**
	 * is_admin
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function is_admin()
	{
		$this->ion_auth_model->trigger_events('is_admin');

		$admin_group = $this->config->item('admin_group', 'ion_auth');

		return $this->in_group($admin_group);
	}

	/**
	 * in_group
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function in_group($check_group, $id=false)
	{
		$this->ion_auth_model->trigger_events('in_group');

		$users_groups = $this->ion_auth_model->get_users_groups($id)->result();
		$groups = array();
		foreach ($users_groups as $group)
		{
			$groups[] = $group->name;
		}

		if (is_array($check_group))
		{
			foreach($check_group as $key => $value)
			{
				if (in_array($value, $groups))
				{
					return TRUE;
				}
			}
		}
		else
		{
			if (in_array($check_group, $groups))
			{
				return TRUE;
			}
		}

		return FALSE;
	}

}