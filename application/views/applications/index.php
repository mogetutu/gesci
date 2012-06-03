<ul class="nav nav-pills">
	<li class="active">
		<a href="<?=site_url('applications/index');?>">PERSONAL INFO</a>
	</li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-horizontal well" action="<?=site_url('applications/index');?>" method="post">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="select01">Country of Residence</label>
			<div class="controls">
				<select id="select01" name="country_of_residence">
					<option value="Botswana"
					<?php if ((isset($country_of_residence)) && $country_of_residence == 'Botswana') {echo 'selected';}?>>Botswana</option>
					<option value="Ethiopia"<?php if ((isset($country_of_residence)) && $country_of_residence == 'Ethiopia') {echo 'selected';}?>>Ethiopia</option>
					<option value="Malawi" <?php if ((isset($country_of_residence)) && $country_of_residence == 'Malawi') {echo 'selected';}?>>Malawi</option>
					<option value="Mozambique" <?php if ((isset($country_of_residence)) && $country_of_residence == 'Mozambique') {echo 'selected';}?>>Mozambique</option>
					<option value="Namibia" <?php if ((isset($country_of_residence)) && $country_of_residence == 'Namibia') {echo 'selected';}?>>Namibia</option>
					<option value="Rwanda" <?php if ((isset($country_of_residence)) && $country_of_residence == 'Rwanda') {echo 'selected';}?>>Rwanda</option>
					<option value="Uganda" <?php if ((isset($country_of_residence)) && $country_of_residence == 'Uganda') {echo 'selected';}?>>Uganda</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="multiSelect">Gender</label>
			<div class="controls">
				<label class="radio">
                <input type="radio" name="gender" id="optionsRadios1" value="male" checked>
                Male
              </label>
              <label class="radio">
                <input type="radio" name="gender" id="optionsRadios2" value="female" <?php if (isset($gender) == 'female') {echo 'checked';}?>>
                Female
              </label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Date of Birth</label>
			<div class="controls">
				<div class="input-append date" id="dp3" data-date="1970-01-01" data-date-format="yyyy-mm-dd">
				  <input class="span9" name="date_of_birth" size="16" type="text" value="<?=isset($date_of_birth)?$date_of_birth:'1970-01-01'?>">
				  <span class="add-on"><i class="icon-th"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01">Nationality</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="nationality" value="<?php if (isset($nationality)) {echo $nationality;}?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Work Place Address</label>
			<div class="controls">
				<textarea class="input-xlarge" rows="4" name="address"><?php if (isset($address)) {echo $address;}?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Phone</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="phone" name="phone" value="<?php if (isset($phone)) {echo $phone;}?>" required>
				<span class="help-block">*Please include country code.</span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01">Mobile Phone</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="mobilephone" name="mobilephone" value="<?php if (isset($mobilephone)) {echo $mobilephone;}?>" required>
				<span class="help-block">*Please include country code.</span>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01">Alternate Email</label>
			<div class="controls">
				<input type="email" class="input-xlarge" id="email" name="alternate_email" value="<?php if (isset($alternate_email)) {echo $alternate_email;}?>" required>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>