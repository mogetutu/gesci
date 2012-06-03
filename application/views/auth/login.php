<!-- Login Form here -->
Welcome to the ALICT application process. It should take approximately 10 minutes to complete this application form. Please be sure to regularly save your application using the save button at the foot of the page. This will enable you to complete your application in parts if you wish. Please also be aware that all of the information in this form will be shared with your line manager in a confirmation email that both you and your line manager will receive.
<br>
Therefore ensure the details you submit to us are accurate and verifiable.
<br>
If you have any problems completing the application form please email us helpdesk@gesci.org
<br>
Please complete your application and submit it us by August 1st 2012.
<br>
<legend>Have an Account? Sign In Here</legend>
<form action="<?=base_url();?>auth/login" autocomplete="off" method="post" class="well" id="login">
	<?=form_input($identity); ?>
    <input type="password" name="password" value="" placeholder="Password" class="input-xlarge"  rel="popover" data-content="Quickly,Nobody is looking enter password." data-original-title="Password" required>
    <label class="checkbox"><?php echo form_checkbox('remember', '1', FALSE);?>Remember Me</label>
	<a href="<?=site_url('auth/create_user');?>" class="btn btn-primary" title="Create Account">Create Account</a>
    <?php echo form_submit('submit', 'Sign In','class="btn btn-warning"');?>
</form>
<a href="<?=site_url('auth/forgot_password');?>" title="Forgotten Password?">Forgotten Password?</a>