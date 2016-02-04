<?php if(!defined("__XE__"))exit;
Context::loadFile(array("./common/js/jquery.js", 'head', '', -100000), true)  ?>
<?php  Context::loadFile(array("./common/js/js_app.js", 'head', '', -100000), true)  ?>
<?php  Context::loadFile(array("./common/js/common.js", 'head', '', -100000), true)  ?>
<?php  Context::loadFile(array("./common/js/xml_handler.js", 'head', '', -100000), true)  ?>
<?php  Context::loadFile(array("./common/js/xml_js_filter.js", 'head', '', -100000), true)  ?>
<!--#Meta:modules/member/tpl/js/signup_check.js--><?php $__tmp=array('modules/member/tpl/js/signup_check.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/tpl/js/member_admin.js--><?php $__tmp=array('modules/member/tpl/js/member_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/m.skins/flatMember/css/member.css--><?php $__tmp=array('modules/member/m.skins/flatMember/css/member.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<script type="text/javascript" >
	xe.lang.deleteProfileImage = '<?php echo $__Context->lang->msg_delete_extend_form ?>';
	xe.lang.deleteImageMark = '<?php echo $__Context->lang->msg_delete_extend_form ?>';
	xe.lang.deleteImageName = '<?php echo $__Context->lang->msg_delete_extend_form ?>';
</script>
<section class="flatMember">
<h2 class="member-top-title"><?php echo $__Context->lang->msg_update_member ?></h2>
<div class="member-header-wrap">
<div class="member-header">
	<?php 
		$__Context->oMemberModel = &getModel('member');
		$__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->logged_info->member_srl)
	 ?>
	<div class="profile-image"><a href="<?php echo getUrl('act','dispMemberInfo','member_srl','') ?>"><?php if($__Context->memberProfileImage->file){ ?><img src="<?php echo $__Context->memberProfileImage->file ?>" alt="profile-image" width="80" height="80" /><?php } ?></a></div>
	<ul class="member-menu">
		<?php if($__Context->member_config->identifier == 'email_address'){ ?><li>
			<a href="<?php echo getUrl('act', 'dispMemberModifyEmailAddress') ?>"><?php echo $__Context->lang->cmd_modify_member_email_address ?></a>
		</li><?php } ?>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyInfo','member_srl','') ?>" class="active"><?php echo $__Context->lang->cmd_modify_member_info ?></a>
		</li>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyPassword','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_password ?></a>			
		</li>
	</ul>
</div>
</div>
<div class="info-body">
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/modify_info/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("./files/ruleset/insertMember.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_insert_member" class="ff" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@insertMember" />
		<input type="hidden" name="act" value="procMemberModifyInfo" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="member_srl" value="<?php echo $__Context->member_info->member_srl ?>" />
		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/modify_info/1" />
		<table class="info-table" cellpadding="0" cellspacing="0">
			<caption><?php echo $__Context->lang->msg_update_member ?></caption>
			<tr>
				<th><em>*</em> <?php echo $__Context->identifierForm->title ?></th>
				<td><input id="identifierForm" type="text" name="<?php echo $__Context->identifierForm->name ?>" value="<?php echo $__Context->identifierForm->value ?>" disabled="disabled" /><input type="hidden" name="<?php echo $__Context->identifierForm->name ?>" value="<?php echo $__Context->identifierForm->value ?>" /></td>
			</tr>
			<?php if($__Context->formTags&&count($__Context->formTags))foreach($__Context->formTags as $__Context->formTag){ ?><tr>
				<th><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTag->title ?></label></th>
				<?php if($__Context->formTag->name != 'signature'){ ?><td><?php echo $__Context->formTag->inputTag ?></td><?php } ?>
				<?php if($__Context->formTag->name =='signature'){ ?><td><textarea id="<?php echo $__Context->formTag->name ?>" name="signature" rows="8" cols="42" class="itxx"><?php echo $__Context->member_info->signature ?></textarea></td><?php } ?>
			</tr><?php } ?>
			<tr>
				<th><?php echo $__Context->lang->allow_mailing ?></th>
				<td><input id="mailing" type="checkbox" name="allow_mailing" value="Y" class="checkbox" <?php if($__Context->member_info->allow_mailing!='N'){ ?>checked="checked"<?php } ?> /> <label for="mailing"><span class="check-dummy"></span> <span><?php echo $__Context->lang->allow_mailing ?></span></label></td>
			</tr>
		</table>
		<div class="bt-wrap clearfix bt-wrap-full">
			<a href="javascript:history.go(-1)" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</div>
</section>
