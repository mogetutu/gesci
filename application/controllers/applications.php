<?php if (! defined('BASEPATH')) exit('No direct script access');

class Applications extends MY_Controller
{
	public $models = array('personal','education','skill','supervisor','work','statement','declaration','submitted_form');
	//php 5 constructor
	function __construct()
	{
		parent::__construct();
		$this->ion_auth->logged_in_check();
		$this->user = $this->session->userdata('user_id');
	}
	/**
	 * First Page after login
	 * View and Update Personal information of application
	 * @access public
	 * @author mogetutu <imogetutu@gmail.com>
	 * @copyright mogetutu™ 2012
	 * @version 1.0
	 * @return boolean
	 */
	public function index()
	{
		$this->data['user'] = $this->ion_auth->profile();
		$row = $this->list_values('personal');
		$this->manage_content($row,'applications/index','personal');
		if ($row)
		{
			return true;
		}

	}
	/**
	 * Add or Update education information
	 * @author mogetutu <imogetutu@gmail.com>
	 * @access public
	 * @copyright mogetutu™ 2012
	 * @version 1.0
	 * @return boolean
	 */
	public function education()
	{
		$row = $this->list_values('education');
		$this->manage_content($row,'applications/education','education');
		return $row;
	}
	/**
	 * Add and Update work information
	 * @access public
	 * @author mogetutu <imogetutu@gmail.com>
	 * @copyright mogetutu™ 2012
	 * @version 1.0
	 * @return boolean
	 */
	public function work()
	{
		$row = $this->list_values('work');
		$this->manage_content($row,'applications/work','work');
		return $row;
	}
	/**
	 * Add or Update Supervisor Details
	 * @access public
	 * @author mogetutu <imogetutu@gmail.com>
	 * @copyright mogetutu™ 2012
	 * @version 1.0
	 * @return boolean
	 */
	public function supervisor()
	{
		$row = $this->list_values('supervisor');
		$this->manage_content($row,'applications/supervisor','supervisor');
		return $row;
	}
	/**
	 * Add or Update Skills
	 * @author mogetutu <imogetutu@gmail.com>
	 * @access public
	 * @return void
	 */
	public function skills()
	{
		$row = $this->list_values('skill');
		// Insert or update skills here
		$this->manage_content($row, 'applications/skills', 'skill');
		return $row;
	}

	public function statement()
	{
		$row = $this->list_values('statement');
		// Insert or update statements here
		$this->manage_content($row, 'applications/statement', 'statement');
		return $row;
	}

	public function declaration()
	{
		$row = $this->list_values('declaration');
		// Insert or update declarations here
		$this->manage_content($row, 'applications/declaration', 'declaration');
		return $row;
	}

	public function submit()
	{
		$this->view = false;
		$submitted = $this->submitted_form->get_by('user_id',$this->user);
		if($submitted)
		{
			$this->session->set_flashdata('message','You application has already been submitted');
			redirect('applications/declaration','refresh');
		}
		if(!(self::index()))
		{
			$this->session->set_flashdata('message','Please Fill in Personal Info Section');
			redirect('applications/','refresh');
		}
		if (!(self::education()))
		{
			$this->session->set_flashdata('message','Please Fill in Education Info Section');
			redirect('applications/education','refresh');
		}
		if(!(self::work()))
		{
			$this->session->set_flashdata('message','Please Fill in Current Work Info Section');
			redirect('applications/work','refresh');
		}
		if(!(self::supervisor()))
		{
			$this->session->set_flashdata('message','Please Fill in Supervisor Details Section');
			redirect('applications/supervisor','refresh');
		}
		if(!(self::skills()))
		{
			$this->session->set_flashdata('message','Please Fill in Skills Section');
			redirect('applications/skills','refresh');
		}
		if(!(self::statement()))
		{
			$this->session->set_flashdata('message','Please Fill in Statement Info Section');
			redirect('applications/statement','refresh');
		}
		if(!(self::declaration()))
		{
			$this->session->set_flashdata('message','Please Fill in Declaration Section');
			redirect('applications/declaration','refresh');
		}
		else
		{
			$_POST['user_id'] = $this->user;
			$_POST['status'] = 'completed';
			$_POST['date_modified'] = date('Y-m-d H:i:s');
			$this->submitted_form->insert($this->input->post());
			$email = $this->session->userdata('email');
			$username = $this->session->userdata('username');
			$personal->country_of_residence ="";
			$personal->gender ="";
			$personal->nationality ="";
			$personal->addresss ="";
			$personal->alternate_email ="";
			$personal->phone ="";
			$personal->mobilephone ="";
			$education->qualification ="";
			$education->degree ="";
			$education->graduation ="";
			$education->college ="";
			$education->country ="";
			$education->notes ="";
			$work->sponsor ="";
			$work->other_sponsor ="";
			$work->sector ="";
			$work->role ="";
			$work->other_role ="";
			$work->years ="";
			$work->supervised ="";
			$work->experience = "";
			$supervisor->firstname = "";
			$supervisor->lastname = "";
			$supervisor->title = "";
			$w_phone->role = "";
			$h_phone->other_role = "";
			$supervisor->email = "";
			$supervisor->a_email = "";
			$skill->w_computer = "";
			$skill->h_computer = "";
			$skill->internet_cafe = "";
			$skill->internet_work = "";
			$skill->internet_home = "";
			$skill->broadband_work = "";
			$skill->broadband_home = "";
			$skill->language = "";
			$skill->language_level = "";
			$skill->language_other = "";
			$skill->language_other_level = "";
			$statement->benefits = "";
			$statement->uses = "";
			$personal = $this->personal->get_by('user_id',$this->user);
			$education = $this->education->get_by('user_id',$this->user);
			$work = $this->work->get_by('user_id',$this->user);
			$supervisor = $this->supervisor->get_by('user_id',$this->user);
			$skill = $this->skill->get_by('user_id',$this->user);
			$statement = $this->statement->get_by('user_id',$this->user);
			$declaration = $this->declaration->get_by('user_id',$this->user);

				$this->load->library('email');

				$this->email->from('helpdesk@gesci.org', 'GESCI');
				$this->email->to($email);
				$this->email->cc($supervisor->email);

				$this->email->subject('ALICT Application Form Submission');
				$this->email->message('Hi '.$username. ',<br>Your Form has been successfully submitted.
					<br>
					<h4>Personal Information</h4><hr>
					<p>Country of Residence:'.$personal->country_of_residence.'</p>
					<p>Gender:'.$personal->gender.'</p>
					<p>Nationality:'.$personal->nationality.'</p>
					<p>Address:'.$personal->addresss.'</p>
					<p>Alternate Email:'.$personal->alternate_email.'</p>
					<p>Phone:'.$personal->phone.'</p>
					<p>Mobile Phone:'.$personal->mobilephone.'</p>
					<h4>Educational Information</h4><hr>
					<p>Highest Qualification:'.$education->qualification.'</p>
					<p>Degree Name:'.$education->degree.'</p>
					<p>Year of Graduation:'.$education->graduation.'</p>
					<p>College/University/Institution:'.$education->college.'</p>
					<p>Country:'.$education->country.'</p>
					<p>Notes:'.$education->notes.'</p>
					<h4>Current Position</h4><hr>
					<p>Sponsoring Organisation:'.$work->sponsor.'</p>
					<p>Sponsoring Organisation:'.$work->other_sponsor.'</p>
					<p>Sector/Department:'.$work->sector.'</p>
					<p>Role:'.$work->role.'</p>
					<p>Role:'.$work->other_role.'</p>
					<p>Years in Ministry/Organisation:'.$work->years.'</p>
					<p>Individuals Directly supervised by you:'.$work->supervised.'</p>
					<p>Years of Professional Experience:'.$work->experience.'</p>
					<h4>Supervisors information</h4><hr>
					<p>First Name:'.$supervisor->firstname.'</p>
					<p>Last Name:'.$supervisor->lastname.'</p>
					<p>Title:'.$supervisor->title.'</p>
					<p>Work Phone Number:'.$w_phone->role.'</p>
					<p>Direct Phone Number:'.$h_phone->role.'</p>
					<p>Email:'.$supervisor->email.'</p>
					<p>Alternate Email:'.$supervisor->a_email.'</p>
					<h4>Skills information</h4><hr>
					<p>I have computer equipment available to use at work:'.$skill->w_computer.'</p>
					<p>I have computer equipment available to use at home:'.$skill->h_computer.'</p>
					<p>I am willing to use an internet cafe when I have no connectivity at home or in work:'.$skill->internet_cafe.'</p>
					<p>I have a reliable internet connection at work:'.$skill->internet_work.'</p>
					<p>I have a reliable internet connection at home:'.$skill->internet_home.'</p>
					<p>I have a: wireless or broadband connection at work:'.$skill->broadband_work.'</p>
					<p>I have a: wireless or broadband connection at home:'.$skill->broadband_home.'</p>
					<p>Language Skills:'.$skill->language.'-'.$skill->language_level.'</p>
					<p>Language Skills:'.$skill->language_other.'-'.$skill->language_other_level.'</p>
					<h4>Statements</h4><hr>
					<p>What benefits do you expect to gain from participating in the ALICT Course?:'.$statement->benefits.'</p>
					<p>How will you use what you have learned in your organisation?:'.$statement->uses.'</p>

					');

				$this->email->send();

			$this->session->set_flashdata('message','Your application has been submitted');
			redirect('applications/declaration','refresh');
		}
	}

	public function list_values($model)
	{
		$row = $this->$model->get_by('user_id',$this->user);
		if($row)
		{
			foreach ($row as $key => $value) {
				$this->data[$key] = $value;
			}
			return $row;

		}
		return false;
	}
	/**
	 * Add or Update record to table matching model accessed
	 * @author mogetutu <imogetutu@gmail.com>
	 * @param  int $row record id
	 * @param  string $url callback url
	 * @param  string $model model accessed
	 * @return void
	 */
	public function manage_content($row ='', $url, $model)
	{
		if ($row && $this->input->post())
		{
			if($this->submitted_form->get_by('user_id',$this->user))
			{
				$this->session->set_flashdata('message','Sorry, Form has been submitted');
				redirect($url,'refresh');
			}
			else
			{
				$save = $this->$model->update($row->id,$this->input->post());
				// Check for changes in the database record
				if($this->db->affected_rows())
				{
					// redirect to page and refresh
					$this->session->set_flashdata('message','Changes added');
					redirect($url,'refresh');
				}
				else
				{
					// redirect to page and refresh
					$this->session->set_flashdata('message','Nothing to update');
					redirect($url,'refresh');
				}
			}

		}
		elseif($this->input->post())
		{
			// set user id in session
			$_POST['user_id'] = $this->user;
			// Insert new record here from post
			if($this->$model->insert($this->input->post()))
			{
				$this->session->set_flashdata('message','Record added');
				redirect($url,'refresh');
			}
			else
			{
				$this->session->set_flashdata('message','Oops! something went wrong');
				redirect($url,'refresh');
			}
		}
	}

}