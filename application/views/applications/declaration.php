<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li class="active"><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-inline well" action="<?=site_url('applications/declaration');?>" method="post">
	<fieldset>
		<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					To the best of my knowledge, the information on this application is accurate and complete. I understand that if I am offered a place I might be required to provide evidence of my qualifications. I agree to the processing and disclosure of all data on this form by GESCI. connected with my studies, or for any other legitimate purpose, including the compilation of statistical analysis.
				</label>
				<input type="checkbox" name="declaration_1" id="optionsCheckbox" value="1"
				<?php if((isset($declaration_1)) && ($declaration_1 == true)) echo 'checked';?> required>
			</div>
			<div class="controls">
				<label class="checkbox">
					I agree that this data can be sent to my supervisor for verification purposes and to confirm that my supervisor has consented to my participation on this course should I be selected as a participant.
				</label><br>
				<input type="checkbox" name="declaration_2" id="optionsCheckbox" value="1"
				<?php if((isset($declaration_2)) && ($declaration_2 == true)) echo 'checked';?> required>
			</div>
			<div class="controls">
				<label class="checkbox">
					I accept the general terms and conditions of the ALICT course.I certify that I will participate in the online training for an average dedication of a minimum of 5 hours a week, as well as participate in two face-to-face events. I understand the dates in the calendar (link to calendar) are approximate and can be adjusted by GESCI.
				</label>
				<input type="checkbox" name="declaration_3" id="optionsCheckbox" value="1"
				<?php if((isset($declaration_3)) && ($declaration_3 == true)) echo 'checked';?> required>
			</div>
			<div class="controls">
				<label class="checkbox">
					All GESCI learning materials provided in this course are for open sharing but need to be referenced accordingly.
				</label>
				<br>
				<input type="checkbox" name="declaration_4" id="optionsCheckbox" value="1"
				<?php if((isset($declaration_4)) && ($declaration_4 == true)) echo 'checked';?> required>
			</div>
		</div>
		<div class="form-action">
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
		</div>
	</fieldset>
</form>