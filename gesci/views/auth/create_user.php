<legend>Create Account here.<p class="help-block"> An activation email will be sent to your email account after creation</p></legend>
<?php echo form_open("auth/create_user",array('class'=>'form-horizontal well','autocomplete'=>'off'));?>
      <div class="control-group">
      <label class="control-label">First Name:</label>
      <div class="controls"><?php echo form_input($first_name);?></div>
      </div>

      <div class="control-group">
      <label class="control-label">Last Name:</label>
      <div class="controls"><?php echo form_input($last_name);?></div>
      </div>

      <div class="control-group">
      <label class="control-label">Email:</label>
      <div class="controls"><?php echo form_input($email);?></div>
      </div>

      <div class="control-group">
      <label class="control-label">Password:</label>
      <div class="controls"><?php echo form_input($password);?>
      <span class="help-block">*More that six characters required for the password.</span>
      </div>

      </div>

      <div class="control-group">
      <label class="control-label">Confirm Password:</label>
      <div class="controls"><?php echo form_input($password_confirm);?></div>
      </div>
      <div class="control-group">
            <div class="controls">
            <?php echo form_submit('submit', 'Create User','class="btn btn-success"');?>
            <a href="<?=site_url();?>" class="btn btn-warning" title="Sign In">Sign In</a>
      </div>
      </div>
<?php echo form_close();?>