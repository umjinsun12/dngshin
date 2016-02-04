<?php if(!defined("__XE__"))exit;?><!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:common/js/xe.min.js--><?php $__tmp=array('common/js/xe.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/m.skins/flatMember/css/member.css--><?php $__tmp=array('modules/member/m.skins/flatMember/css/member.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="flatMember">
<h2 class="member-top-title"><?php echo $__Context->lang->cmd_find_member_account ?></h2>
<div class="login-wrap">
<div class="find-body">
	<section>
		<h3><?php echo $__Context->lang->cmd_find_member_account_with_email ?></h3>
		<p><?php echo $__Context->lang->about_find_member_account ?></p>
		<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/find_member_account/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<?php Context::addJsFile("modules/member/ruleset/findAccount.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./"  method="post" class="ff"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="findAccount" />
			<input type="hidden" name="module" value="member" />
			<input type="hidden" name="act" value="procMemberFindAccount" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
			<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
			<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', 'dispMemberFindAccount') ?>" />
			<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/find_member_account/1" />
			<input id="email_address1" type="email" name="email_address" required placeholder="<?php echo $__Context->lang->email_address ?>" />
			<button type="submit" class="btDark"><?php echo $__Context->lang->cmd_send_mail ?></button>
		</form>
	</section>
	<?php if(count($__Context->lang->find_account_question_items)>1){ ?><section>
		<h3><?php echo $__Context->lang->cmd_find_member_account_with_email_question ?></h3>
		<p><?php echo $__Context->lang->about_find_account_question ?></p>
		<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/find_member_account/2'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<?php Context::addJsFile("./files/ruleset/find_member_account_by_question.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" class="ff" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@find_member_account_by_question" />
			<input type="hidden" name="module" value="member" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />	
			<input type="hidden" name="act" value="procMemberFindAccountByQuestion" />
			<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'act', 'dispMemberGetTempPassword') ?>" />
			<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
			<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/find_member_account/2" />
			
			<?php if($__Context->identifier == 'user_id'){ ?><input type="text" name="user_id" id="user_id2" required placeholder="<?php echo $__Context->lang->user_id ?>" /><?php } ?>
			<input type="email" name="email_address" id="email_address2" required placeholder="<?php echo $__Context->lang->email_address ?>" />
			<select id="question" name="find_account_question">
			<?php for($__Context->i=1,$__Context->c=count($__Context->lang->find_account_question_items);$__Context->i<$__Context->c;$__Context->i++){ ?>
				<option value="<?php echo $__Context->i ?>"><?php echo $__Context->lang->find_account_question_items[$__Context->i] ?></option>
			<?php } ?>
			</select>
			<input type="text" name="find_account_answer" required placeholder="<?php echo $__Context->lang->find_account_question ?>" />
			<button type="submit" class="btDark"><?php echo $__Context->lang->cmd_get_temp_password ?></button>
		</form>
	</section><?php } ?>
	<section>
		<h3><?php echo $__Context->lang->cmd_resend_auth_mail ?></h3>
		<p><?php echo $__Context->lang->about_resend_auth_mail ?></p>
		<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/skin/default/find_member_account/3'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
		</div><?php } ?>
		<?php Context::addJsFile("modules/member/ruleset/resendAuthMail.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="resendAuthMail" />
			<input type="hidden" name="module" value="member" />
			<input type="hidden" name="act" value="procMemberResendAuthMail" />
			<input type="hidden" name="success_return_url" value="<?php echo getUrl(act, $__Context->act) ?>" />
			<input type="hidden" name="xe_validator_id" value="modules/member/skin/default/find_member_account/3" />
			
			<input type="email" id="email_address" name="email_address" value="" required placeholder="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" />
			<button type="submit" class="btDark"><?php echo $__Context->lang->cmd_resend_auth_mail ?></button>
		</form>
	</section>
</div>
</div>
</section>
