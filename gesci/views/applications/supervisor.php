<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li class="active"><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-horizontal well" action="<?=site_url('applications/supervisor');?>" method="post">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="input01">First name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="firstname" value="<?php if(isset($firstname)) echo $firstname; ?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Last name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="lastname" value="<?php if(isset($lastname)) echo $lastname;?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Title</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="title" value="<?php if(isset($title)) echo $title;?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Work Phone Number</label>
			<div class="controls">
				<input type="text" class="input-xlarge" required name="w_phone" value="<?php if(isset($w_phone)) echo $w_phone;?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Direct Phone Number</label>
			<div class="controls">
				<input type="text" class="input-xlarge" name="h_phone" value="<?php if(isset($h_phone)) echo $h_phone;?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Email</label>
			<div class="controls">
				<input type="email" class="input-xlarge" required name="email" value="<?php if(isset($email)) echo $email;?>">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Alternative Email</label>
			<div class="controls">
				<input type="email" class="input-xlarge" name="a_email" value="<?php if(isset($a_email)) echo $a_email;?>">
			</div>
		</div>


		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>