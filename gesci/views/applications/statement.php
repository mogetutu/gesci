<ul class="nav nav-pills">
	<li><a href="<?=site_url('applications/index');?>">PERSONAL INFO</a></li>
	<li><a href="<?=site_url('applications/education');?>">EDUCATION</a></li>
	<li><a href="<?=site_url('applications/work');?>">CURRENT POSITION</a></li>
	<li><a href="<?=site_url('applications/supervisor');?>">SUPERVISOR’S INFO</a></li>
	<li><a href="<?=site_url('applications/skills');?>">SKILLS</a></li>
	<li class="active"><a href="<?=site_url('applications/statement');?>">STATEMENT</a></li>
	<li><a href="<?=site_url('applications/declaration');?>">DECLARATION</a></li>
	<li class="actions"><a href="<?=site_url('applications/submit');?>" onclick="return confirm('Are you sure? Once submitted you will not be able to modify your submission')" title=""><i class="icon-envelope icon-white"></i> SUBMIT APPLICATION</a></li>
	<li class="actions"><a href="<?=site_url('auth/logout');?>"><i class="icon-off icon-white"></i> LOGOUT</a></li>
</ul>
<legend>Welcome <?=$this->session->userdata('username');?></legend>
<form class="form-inline well" action="<?=site_url('applications/statement');?>" method="post">
<div class="control-group">
	<label class="control-label">What benefits do you expect to gain from participating in the ALICT Course? (200 Words)</label>
	<div class="controls">
		<textarea name="benefits" rows="8" class="input-xlarge" pattern="(\S*\s*){0,150}" required><?=isset($benefits)?$benefits:'';?></textarea>
	</div><!-- / controls-->

</div><!-- / control group-->
<div class="control-group">
	<label class="control-label">How will you use what you have learned in your organisation? (200 Words)</label>
	<div class="controls">
		<textarea name="uses" rows="8" class="input-xlarge" pattern="(\S*\s*){0,150}" required><?=isset($uses)?$uses:'';?></textarea>
	</div><!-- / controls-->

</div><!-- / control group-->
<div class="form-action">
	<button type="submit" class="btn btn-primary">Save changes</button>
	<button class="btn">Cancel</button>
</div>
</form>