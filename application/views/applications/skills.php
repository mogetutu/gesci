<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li class="active"><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form well" method="post" action="<?=site_url('applications/skills');?>">
	<fieldset>
		<div class="control-group">
			<label class="control-label">I have computer equipment available to use at work</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="w_computer" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="w_computer" id="optionsCheckbox" value="SOMETIMES"
					<?php if((isset($w_computer)) && ($w_computer == 'SOMETIMES')) echo 'checked';?>>SOMETIMES
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I have computer equipment available to use at home</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="h_computer" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="h_computer" id="optionsCheckbox" value="NO"
					<?php if((isset($h_computer)) && ($h_computer=='NO')) echo 'checked';?>>NO
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I am willing to use an internet cafe when I have no connectivity at home or in work</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="internet_cafe" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="internet_cafe" id="optionsCheckbox" value="NO"
					<?php if((isset($internet_cafe)) && ($internet_cafe == 'NO')) echo 'checked'; ?>
					>NO
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I have a reliable internet connection at work </label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="internet_work" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="internet_work" id="optionsCheckbox" value="NO"
					<?php if((isset($internet_work)) && ($internet_work == 'NO')) echo 'checked'; ?>>NO
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I have a reliable internet connection at home </label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="internet_home" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="internet_home" id="optionsCheckbox" value="NO"
					<?php if((isset($internet_home)) && ($internet_home == 'NO')) echo 'checked'; ?>>NO
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I have a: wireless or broadband connection at work</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="broadband_work" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="broadband_work" id="optionsCheckbox" value="NO"
					<?php if((isset($broadband_work)) && ($broadband_work == 'NO')) echo 'checked'; ?>>NO
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">I have a: wireless or broadband connection at home</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="broadband_home" id="optionsCheckbox" value="YES" checked>YES
					<br>
					<input type="radio" name="broadband_home" id="optionsCheckbox" value="NO"
					<?php if((isset($broadband_home)) && ($broadband_home == 'NO')) echo 'checked'; ?>>NO
				</label>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">List any computer courses you have taken:</label>
			<textarea name="computer_courses" placeholder="" required>
				<?=isset($computer_courses)?$computer_courses:'';?>
			</textarea>
		</div><!-- / computer courses -->

		<div class="control-group">
			<label class="control-label">I regularly using the following applications and social utilities</label>
			<label class="checkbox">
				<input type="checkbox" name="ms_word" id="optionsCheckbox" value="ms_word"
					<?php if((isset($ms_word)) && ($ms_word == 'ms_word')) echo 'checked'; ?>>Microsoft Word
			</label><!-- / MS Word -->

			<label class="checkbox">
				<input type="checkbox" name="ms_excel" id="optionsCheckbox" value="ms_excel"
					<?php if((isset($ms_excel)) && ($ms_excel == 'ms_excel')) echo 'checked'; ?>>Microsoft Excel
			</label><!-- / MS Excel -->

			<label class="checkbox">
				<input type="checkbox" name="ms_project" id="optionsCheckbox" value="ms_project"
					<?php if((isset($ms_project)) && ($ms_project == 'ms_project')) echo 'checked'; ?>>Microsoft Project
			</label><!-- / MS Project -->

			<label class="checkbox">
				<input type="checkbox" name="lotus_notes" id="optionsCheckbox" value="lotus_notes"
					<?php if((isset($lotus_notes)) && ($lotus_notes == 'lotus_notes')) echo 'checked'; ?>>Lotus Notes
			</label><!-- / Lotus Notes -->

			<label class="checkbox">
				<input type="checkbox" name="facebook" id="optionsCheckbox" value="facebook"
					<?php if((isset($facebook)) && ($facebook == 'facebook')) echo 'checked'; ?>>Facebook
			</label><!-- / facebook -->

			<label class="checkbox">
				<input type="checkbox" name="myspace" id="optionsCheckbox" value="myspace"
					<?php if((isset($myspace)) && ($myspace == 'myspace')) echo 'checked'; ?>>MySpace
			</label><!-- / MySpace -->

			<label class="checkbox">
				<input type="checkbox" name="youtube" id="optionsCheckbox" value="youtube"
					<?php if((isset($youtube)) && ($youtube == 'youtube')) echo 'checked'; ?>>YouTube
			</label><!-- / Youtube -->

			<label class="checkbox">
				<input type="checkbox" name="photoshop" id="optionsCheckbox" value="photoshop"
					<?php if((isset($photoshop)) && ($photoshop == 'photoshop')) echo 'checked'; ?>>Adobe Photoshop
			</label><!-- / Youtube -->

			<label class="checkbox">
				<input type="checkbox" name="google_docs" id="optionsCheckbox" value="google_docs"
					<?php if((isset($google_docs)) && ($google_docs == 'google_docs')) echo 'checked'; ?>>Google Docs
			</label><!-- / Google Docs -->

			<label class="checkbox">
				<input type="checkbox" name="google_calendar" id="optionsCheckbox" value="google_calendar"
					<?php if((isset($google_calendar)) && ($google_calendar == 'google_calendar')) echo 'checked'; ?>>Google Calendar
			</label><!-- / Google Calendar -->

			<label class="checkbox">
				<input type="checkbox" name="gmail" id="optionsCheckbox" value="gmail"
					<?php if((isset($gmail)) && ($gmail == 'gmail')) echo 'checked'; ?>>Gmail
			</label><!-- / Gmail -->

			<label class="checkbox">
				<input type="checkbox" name="hotmail" id="optionsCheckbox" value="hotmail"
					<?php if((isset($hotmail)) && ($hotmail == 'hotmail')) echo 'checked'; ?>>Hotmail
			</label><!-- / hotmail -->

			<label class="checkbox">
				<input type="checkbox" name="skype" id="optionsCheckbox" value="skype"
					<?php if((isset($skype)) && ($skype == 'skype')) echo 'checked'; ?>>Skype
			</label><!-- / hotmail -->
			<div class="controls">
				<input type="text" name="other_apps" value="" placeholder="Other">
			</div><!-- / other-->


		</div><!-- / Programs -->

		<div class="control-group">
			<label class="control-label">Language Skills</label>
			<div class="controls">
				<input type="text" name="language" class="input-xlarge" disabled value="English" />
				<label class="radio">
					<input type="radio" name="language_level" id="optionsCheckbox" value="Good" checked>Good
					<br>
					<input type="radio" name="language_level" id="optionsCheckbox" value="Average"
					<?php if((isset($language_level)) && ($language_level == 'Average')) echo 'checked'; ?>>Average
					<br>
					<input type="radio" name="language_level" id="optionsCheckbox" value="Basic"
					<?php if((isset($language_level)) && ($language_level == 'Basic')) echo 'checked'; ?>>Basic
				</label>
				<input type="text" name="language_other" class="input-xlarge" value="<?=isset($language_other)?$language_other:'';?>" placeholder="Other - specify language" />
				<label class="radio">
					<input type="radio" name="language_other_level" id="optionsCheckbox" value="Good" checked>Good
					<br>
					<input type="radio" name="language_other_level" id="optionsCheckbox" value="Average"
					<?php if((isset($language_other_level)) && ($language_other_level == 'Average')) echo 'checked'; ?>>Average
					<br>
					<input type="radio" name="language_other_level" id="optionsCheckbox" value="Basic"
					<?php if((isset($language_other_level)) && ($language_other_level == 'Basic')) echo 'checked'; ?>>Basic
				</label>
			</div>
		</div>
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button class="btn">Cancel</button>
	</fieldset>
</form>