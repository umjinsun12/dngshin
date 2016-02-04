<?php if(!defined("__XE__"))exit;?><!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:common/js/xe.min.js--><?php $__tmp=array('common/js/xe.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/m.skins/flatMember/css/msignup.css--><?php $__tmp=array('modules/member/m.skins/flatMember/css/msignup.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="flatMember">
<h2 class="hx h2"><?php echo $__Context->lang->cmd_modify_member_email_address ?></h2>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/modify_email_address/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<h2 class="member-top-title"><?php echo $__Context->lang->msg_update_member ?></h2>
<div class="member-header-wrap">
<div class="member-header">
	<?php 
		$__Context->oMemberModel = &getModel('member');
		$__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->logged_info->member_srl)
	 ?>
	<div class="profile-image">
		<a href="<?php echo getUrl('act','dispMemberInfo','member_srl','') ?>"><?php if($__Context->memberProfileImage->file){ ?><img src="<?php echo $__Context->memberProfileImage->file ?>" alt="profile-image" width="80" height="80" /><?php } ?></a></div>
	<ul class="member-menu">
		<?php if($__Context->member_config->identifier == 'email_address'){ ?><li>
			<a href="<?php echo getUrl('act', 'dispMemberModifyEmailAddress') ?>" class="active"><?php echo $__Context->lang->cmd_modify_member_email_address ?></a>
		</li><?php } ?>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyInfo','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_info ?></a>
		</li>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyPassword','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_password ?></a>			
		</li>
	</ul>
</div>
</div>
<?php Context::addJsFile("modules/member/ruleset/modifyEmailAddress.xml", FALSE, "", 0, "body", TRUE, "") ?><form  class="ff" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="modifyEmailAddress" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberModifyEmailAddress" />
	<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/modify_email_address/1" />
	<p><?php echo $__Context->lang->about_modify_member_email_address ?></p>
	<ul>
		<li>
			<label for="email_address"><?php echo $__Context->lang->email_address ?></label>
			<input type="email" id="email_address" name="email_address" value="" />
		</li>
	</ul>
	<div class="bna">
		<input type="submit" class="bn dark" value="<?php echo $__Context->lang->cmd_send_auth_new_emaill_address ?>" />
	</div>
</form>
</section>