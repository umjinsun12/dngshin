<?php if(!defined("__XE__"))exit;?><!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:common/js/xe.min.js--><?php $__tmp=array('common/js/xe.min.js','','','-1000000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/m.skins/flatMember/css/member.css--><?php $__tmp=array('modules/member/m.skins/flatMember/css/member.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/member/tpl/js/signup_check.js--><?php $__tmp=array('modules/member/tpl/js/signup_check.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="flatMember">
<div class="login-wrap">
<div class="signup-body">
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/signup_form/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("./files/ruleset/insertMember.xml", FALSE, "", 0, "body", TRUE, "") ?><form  id="fo_insert_member" class="ff" action="./" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@insertMember" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="act" value="procMemberInsert" />
		<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/signup_form/1" />
		<?php if(!$__Context->is_logged && $__Context->member_config->agreement){ ?>
		<div class="terms-container">
			<div class="terms-body"><?php echo $__Context->member_config->agreement ?></div>
			<input type="checkbox" id="agree-terms" name="accept_agreement" value="Y" /> <label for="agree-terms"><span class="check-dummy"></span> <span><?php echo $__Context->lang->about_accept_agreement ?></span></label> 
		</div>
		<?php } ?>
		<div class="signup-form">
			<dl>
				<dt><label for="<?php echo $__Context->identifierForm->name ?>"><em>*</em> <?php echo $__Context->identifierForm->title ?></label></dt>
				<dd><input<?php if($__Context->identifierForm->name!='email_address'){ ?> type="text"<?php };
if($__Context->identifierForm->name=='email_address'){ ?> type="email"<?php } ?> name="<?php echo $__Context->identifierForm->name ?>" id="<?php echo $__Context->identifierForm->name ?>" value="<?php echo $__Context->identifierForm->value ?>" /></dd>
				
				<dt><label for="password"><em>*</em> <?php echo $__Context->lang->password ?></label></dt>
				<dd><input type="password" name="password" id="password" value=""/></dd>
				
				<dt><label for="password2"><em>*</em> <?php echo $__Context->lang->password3 ?></label></dt>
				<dd><input type="password" name="password2" id="password2" value=""/><p class="help-block"></dd>
				
				<!--<?php if($__Context->formTags&&count($__Context->formTags))foreach($__Context->formTags as $__Context->formTag){;
if($__Context->formTag->name != 'signature'){ ?><dt><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTag->title ?></label></dt><dd><?php echo $__Context->formTag->inputTag ?></dd><?php }} ?>-->
				
				<dt><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTags[0]->title ?></label></dt>
				<dd><?php echo $__Context->formTags[0]->inputTag ?></dd>
				<dt><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTags[1]->title ?></label></dt>
				<dd><?php echo $__Context->formTags[1]->inputTag ?></dd>
				
				<dt><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTags[2]->title ?></label></dt>
				<dd><?php echo $__Context->formTags[2]->inputTag ?></dd>
				
				<dt><label for="<?php echo $__Context->formTag->name ?>"><?php echo $__Context->formTags[3]->title ?></label></dt>
				<dd><?php echo $__Context->formTags[3]->inputTag ?></dd>
										
				<input type="hidden" name="allow_mailing" id="mailingYes" value="Y"<?php if($__Context->member_info->allow_mailing == 'Y'){ ?> checked="checked"<?php } ?> /> <label for="mailingYes" class="next-radio"></label>
				<input type="hidden" name="allow_message" value="<?php echo $__Context->key ?>"<?php if($__Context->member_info->allow_message == $__Context->key || (!$__Context->member_info && $__Context->key == 'Y')){ ?> checked="checked"<?php } ?> id="allow_<?php echo $__Context->key ?>" /> <label for="allow_<?php echo $__Context->key ?>" class="next-radio"></label>									
				
			</dl>
			<div class="warn"><em>*</em> 필수입력사항(required)</div>
		</div>
		<div class="bt-wrap clearfix">
			<a href="javascript:history.go(-1)" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</div>
</div>
</section>
