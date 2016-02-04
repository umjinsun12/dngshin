<?php if(!defined("__XE__"))exit;?><!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:common/js/xe.min.js--><?php $__tmp=array('common/js/xe.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/m.skins/flatMember/css/member.css--><?php $__tmp=array('modules/member/m.skins/flatMember/css/member.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="flatMember">
<h2 class="member-top-title"><?php echo $__Context->member_title = $__Context->lang->cmd_modify_member_password ?></h2>
<div class="member-header-wrap">
<div class="member-header">
	<?php 
		$__Context->oMemberModel = &getModel('member');
		$__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->logged_info->member_srl)
	 ?>
	<div class="profile-image"><a href="<?php echo getUrl('act','dispMemberInfo','member_srl','') ?>"><?php if($__Context->memberProfileImage->file){ ?><img src="<?php echo $__Context->memberProfileImage->file ?>" alt="profile-image" width="80" height="80" /><?php } ?></a></div>
	<ul class="member-menu"><?php if($__Context->member_config->identifier == 'email_address'){ ?><li><a href="<?php echo getUrl('act', 'dispMemberModifyEmailAddress') ?>"><?php echo $__Context->lang->cmd_modify_member_email_address ?></a></li><?php } ?><li><a href="<?php echo getUrl('act','dispMemberModifyInfo','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_info ?></a></li><li><a href="<?php echo getUrl('act','dispMemberModifyPassword','member_srl','') ?>" class="active"><?php echo $__Context->lang->cmd_modify_member_password ?></a></li></ul>
</div>
</div>
<div class="info-body">
	<?php Context::addJsFile("modules/member/ruleset/modifyPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_insert_member" class="ff" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="modifyPassword" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="act" value="procMemberModifyPassword" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
		<table class="info-table" cellpadding="0" cellspacing="0">
			<caption><?php echo $__Context->lang->cmd_modify_member_password ?></caption>
			<tr>
				<th><label for="uid"><?php echo Context::getLang($__Context->identifier) ?></label></th>
				<td><input type="text" disabled="disabled" value="<?php echo $__Context->formValue ?>" id="uid" /></td>
			</tr>
			<tr>
				<th><label for="cpw"><?php echo $__Context->lang->current_password ?></label></th>
				<td><input type="password" name="current_password" id="cpw" /></td>
			</tr>
			<tr>
				<th><label for="npw1"><?php echo $__Context->lang->password1 ?></label></th>
				<td><input type="password" name="password1" id="npw1" /> <p class="help-block"><?php echo $__Context->lang->about_password ?></p></td>
			</tr>
			<tr>
				<th><label for="npw2"><?php echo $__Context->lang->password2 ?></label></th>
				<td><input type="password" name="password2" id="npw2" /></td>
			</tr>
		</table>
		<div class="bt-wrap clearfix bt-wrap-full">
			<a href="javascript:history.go(-1)" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</div>
</section>
