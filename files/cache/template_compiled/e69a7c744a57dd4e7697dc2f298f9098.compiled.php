<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_header.html') ?>
<h2 class="member-top-title"><?php echo $__Context->lang->msg_rechecked_password ?></h2>
<div class="member-header-wrap">
<div class="member-header">
	<?php 
		$__Context->oMemberModel = &getModel('member');
		$__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->logged_info->member_srl)
	 ?>
	<div class="profile-image"><a href="<?php echo getUrl('act','dispMemberInfo','member_srl','') ?>"><?php if($__Context->memberProfileImage->file){ ?><img src="<?php echo $__Context->memberProfileImage->file ?>" alt="profile-image" width="80" height="80" /><?php } ?></a></div>
	<ul class="member-menu"><?php if($__Context->member_config->identifier == 'email_address'){ ?><li><a href="<?php echo getUrl('act', 'dispMemberModifyEmailAddress') ?>"><?php echo $__Context->lang->cmd_modify_member_email_address ?></a></li><?php } ?><li><a href="<?php echo getUrl('act','dispMemberModifyInfo','member_srl','') ?>" class="active"><?php echo $__Context->lang->cmd_modify_member_info ?></a></li><li><a href="<?php echo getUrl('act','dispMemberModifyPassword','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_password ?></a></li></ul>
</div>
</div>
<?php 
	$__Context->validator_ids = array(
		'modules/member/m.skin/flatMember/rechecked_password/1' => 1,
		'modules/member/m.skin/flatMember/modify_info/1' => 1
	);
 ?>
<div class="info-body">
	<?php if($__Context->XE_VALIDATOR_MESSAGE && isset($__Context->validator_ids[$__Context->XE_VALIDATOR_ID])){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("modules/member/ruleset/recheckedPassword.xml", FALSE, "", 0, "body", TRUE, "") ?><form class="ff" action="./index.php" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="recheckedPassword" />
		<input type="hidden" name="act" value="procMemberModifyInfoBefore" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/flatMember/rechecked_password/1" />
		<table class="info-table" cellpadding="0" cellspacing="0">
			<caption><?php echo $__Context->lang->msg_rechecked_password ?></caption>
			<tr>
				<th><label for="identifier"><?php echo $__Context->identifierTitle ?></label></th>
				<td><p id="identifier"><?php echo $__Context->identifierValue ?></p></td>
			</tr>
			<tr>
				<th><label for="password"><?php echo $__Context->lang->password ?></label></th>
				<td><input id ="password" type="password" name="password" /></td>
			</tr>
		</table>
		<div class="pass_ex"><?php echo $__Context->lang->about_rechecked_password ?></div>
		<div class="bt-wrap clearfix bt-wrap-full">
			<a href="javascript:history.go(-1)" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_confirm ?></button>
		</div>
	</form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_footer.html') ?>