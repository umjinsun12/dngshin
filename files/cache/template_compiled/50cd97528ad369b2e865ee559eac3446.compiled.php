<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/message/m.skins/flatMessage/message.css--><?php $__tmp=array('modules/message/m.skins/flatMessage/message.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/message/m.skins/flatMessage/msRetina.css--><?php $__tmp=array('modules/message/m.skins/flatMessage/msRetina.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="flatMessage">
<div class="login-wrap">
<div class="login-body">
	<div class="message-wrap">
	<p class="message"><?php echo $__Context->system_message ?></p>
	<script>document.location.replace('?mid=applogin');</script>
	</div>
	<?php if(!$__Context->is_logged){ ?>
	<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/message/m.skins/flatMessage/filter','openid_login.xml');$__xmlFilter->compile(); ?>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/login_form/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php Context::addJsFile("./files/ruleset/login.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="<?php echo getUrl('','act','procMemberLogin') ?>" method="post"  class="ff"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@login" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/message/m.skin/flatMessage/system_message/1" />
		<div class="login-form-wrap">
			<?php if($__Context->member_config->identifier == 'user_id'){ ?><input class="w-input input-form" type="text" name="user_id" id="uid" required placeholder="<?php echo $__Context->lang->user_id ?>" title="<?php echo $__Context->lang->user_id ?>" /><?php } ?>
			<div class="separator-fields"></div>
			<?php if($__Context->member_config->identifier != 'user_id'){ ?><input class="w-input input-form" type="email" name="user_id" id="uid" required placeholder="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" /><?php } ?>	
			<input class="w-input input-form" type="password" name="password" id="upw" required placeholder="<?php echo $__Context->lang->password ?>" title="<?php echo $__Context->lang->password ?>" />
			<div class="separator-fields"></div>			
			<input type="hidden" name="keep_signed" id="autoLogin" value="Y" /><label for="autoLogin"></label>
			<div class="hp" id="keep_msg" style="display:none;">
				<?php echo $__Context->lang->about_keep_warning ?>
			</div>
			<button type="submit" class="w-button action-button"><?php echo $__Context->lang->cmd_login ?></button>
		</div>
		<div class="bt-wrap2" style="padding-top:22px;">
			<a href="<?php echo getUrl('mid',$__Context->mid,'act','dispMemberSignUpForm') ?>" class="btLeft btSignup"><?php echo $__Context->lang->cmd_signup ?></a>
			<a href="<?php echo getUrl('act','dispMemberFindAccount') ?>" class="btRight btFind"><?php echo $__Context->lang->cmd_find_member_account ?></a>
		</div>
	</form>
	<?php } ?>
	<?php if($__Context->is_logged){ ?>
	<div class="logout">
		<a href="<?php echo getUrl('act','dispMemberLogout','module','') ?>" class="btDark"><?php echo $__Context->lang->cmd_logout ?></a>
	</div>
	<?php } ?>
</div>
</div>
</section>
<script>
jQuery(function($){
	var keep_msg = $('#keep_msg');
	keep_msg.hide();
	$('#autoLogin').change(function(){
		if($(this).is(':checked')){
			keep_msg.show();
		} else {
			keep_msg.hide();
		}
	});
});
</script>