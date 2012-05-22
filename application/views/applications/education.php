<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li class="active"><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-horizontal well" method="post" action="<?=site_url('applications/education');?>">
	<fieldset>
		<div class="control-group">
			<label class="control-label" for="select01">Highest Qualification</label>
			<div class="controls">
				<select id="select01" name="qualification">
					<option <?php if((isset($qualification)) && ($qualification == 'PhD')) echo 'selected';?> >PhD</option>
					<option <?php if((isset($qualification)) && ($qualification == 'Masters')) echo 'selected';?>>Masters</option>
					<option <?php if((isset($qualification)) && ($qualification == 'Bachelors')) echo 'selected';?>>Bachelors</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Degree Name</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="degree" value="<?php if(isset($degree)) echo $degree;?>" required>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="input01">Year of Graduation</label>
			<div class="controls">
				<input type="number" class="input-xlarge" id="input01" maxlength="4" min="1950" max="2012" name="graduation" value="<?php if(isset($graduation)) echo $graduation;?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">College/University</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="college" value="<?php if(isset($college)) echo $college;?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Country</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="input01" name="country" value="<?php if(isset($country)) echo $country;?>" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Notes</label>
			<div class="controls">
				<textarea name="notes" class="input-xlarge"><?=isset($notes)?$notes:'';?></textarea>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>