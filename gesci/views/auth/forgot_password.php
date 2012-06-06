<legend>Please enter your email address so we can send you an email to reset your password.</legend>
<?php echo form_open("auth/forgot_password",array('class'=>'well'));?>

      <p>Email Address:<br />
      <?php echo form_input($email);?>
      </p>

      <p>
      	<?php echo form_submit('submit', 'Reset Password','class="btn btn-warning"');?>
      	<a href="<?=site_url('auth/login');?>" class="btn btn-success" title="Sign In">Sign In</a>
      </p>

<?php echo form_close();?>