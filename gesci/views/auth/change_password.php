<legend>Change Password</legend>
<form action="<?=site_url('auth/change_password');?>" method="post" class="form-horizontal well">
      <p>Old Password:<br />
      <?php echo form_input($old_password);?>
      </p>

      <p>New Password:<br />
      <?php echo form_input($new_password);?>
      </p>

      <p>Confirm New Password:<br />
      <?php echo form_input($new_password_confirm);?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', 'Change');?></p>

<?php echo form_close();?>