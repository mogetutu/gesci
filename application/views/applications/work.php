<div class="tabbable tabs-left">
<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li class="active"><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
</div>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-horizontal well" method="post" action="<?=site_url('applications/work');?>">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="select01">Sponsoring Ministry/Organisation</label>
			<div class="controls">
				<select id="select01" name="sponsor" class="input-xlarge">
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Education') echo 'selected'; ?>>Ministry of Education</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Higher Education') echo 'selected'; ?>>Ministry of Higher Education</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Planning') echo 'selected'; ?>>Ministry of Planning</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Infrastructure') echo 'selected'; ?>>Ministry of Infrastructure</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Information and Communications/Communications') echo 'selected'; ?>>Ministry of Information and Communications/Communications</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Environment') echo 'selected'; ?>>Ministry of Environment</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Finance') echo 'selected'; ?>>Ministry of Finance</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Science and Technology') echo 'selected'; ?>>Ministry of Science and Technology</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Ministry of Youth/Youth Affairs and Sports/Culture') echo 'selected'; ?>>Ministry of Youth/Youth Affairs and Sports/Culture</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Office of the President/PrimeMinister') echo 'selected'; ?>>Office of the President/PrimeMinister</option>
					<option <?php if(isset($sponsor) && $sponsor == 'Other') echo 'selected'; ?>>Other</option>
				</select>
				<input type="text" name="other_sponsor" class="input-xlarge" value="<?php if(isset($other_sponsor)) echo $other_sponsor; ?>" placeholder="Other – please specify">

			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="multiSelect">Sector/Department</label>
			<div class="controls">
				<input type="text" name="sector" class="input-xlarge" value="<?php if(isset($sector)) echo $sector; ?>" placeholder="Please specify">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="fileInput">Role</label>
			<div class="controls">
				<select name="role">
					<option <?php if(isset($role) && $role == 'Deputy Director General') echo 'selected'; ?>>Deputy Director General</option>
					<option <?php if(isset($role) && $role == 'Director') echo 'selected'; ?>>Director</option>
					<option <?php if(isset($role) && $role == 'Assistant Director') echo 'selected'; ?>>Assistant Director</option>
					<option <?php if(isset($role) && $role == 'Manager') echo 'selected'; ?>>Manager</option>
					<option <?php if(isset($role) && $role == 'Coordinator') echo 'selected'; ?>>Coordinator</option>
					<option <?php if(isset($role) && $role == 'Other') echo 'selected'; ?>>Other</option>
				</select>
				<input type="text" class="input-xlarge" name="other_role" value="<?php if(isset($other_role)) echo $other_role; ?>" placeholder="Other – please specify">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="textarea">Years in organisation/ministry</label>
			<div class="controls">
				<input type="number" class="input-xlarge" maxlength="2" min="1" max="99" name="years" value="<?php if(isset($years)) echo $years; ?>" placeholder="" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="textarea">Individuals directly supervised by you</label>
			<div class="controls">
				<input type="number" class="input-xlarge" min="1" max="999" name="supervised" value="<?php if (isset($supervised)) echo $supervised;?>" placeholder="" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="textarea">Years of professional experience</label>
			<div class="controls">
				<input type="number" class="input-xlarge" min="1" max="99" name="experience" value="<?php if (isset($experience)) echo $experience;?>" placeholder="" required>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>