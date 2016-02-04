<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_header.html') ?>
 
<script src="/modules/member/m.skins/flatMember/js/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Montserrat:400,700"]
      }
    });
  </script>
  
<div class="login-wrap">
<div class="login-body">
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/member/m.skin/default/login_form/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<form action="./" method="POST" class="ff"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="module" value="member" />
		<input type="hidden" name="act" value="procMemberLogin" />
		<input type="hidden" name="redirect_url" value="<?php echo getUrl('act','') ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/member/m.skin/default/login_form/1" />
		<div class="login-form-wrap">
			<?php if($__Context->identifier == 'user_id'){ ?><input class="w-input input-form" type="text" name="user_id" id="email-field" required placeholder="<?php echo $__Context->lang->user_id ?>" title="<?php echo $__Context->lang->user_id ?>" /><?php } ?>
			<div class="separator-fields"></div>
			<?php if($__Context->identifier != 'user_id'){ ?><input class="w-input input-form" type="email" name="user_id" id="email-field" required placeholder="<?php echo $__Context->lang->email_address ?>" title="<?php echo $__Context->lang->email_address ?>" /><?php } ?>
			<input class="w-input input-form" type="password" name="password" id="password-field" required placeholder="<?php echo $__Context->lang->password ?>" title="<?php echo $__Context->lang->password ?>" />
			<div class="separator-fields"></div>
			<input type="hidden" name="keep_signed" id="autoLogin" value="Y" /><label for="autoLogin"></label>
			<div class="hp" id="keep_msg" style="display:none;">
				<?php echo $__Context->lang->about_keep_warning ?>
			</div>
			<div class="separator-fields"></div>
			<button type="submit" class="w-button action-button"><?php echo $__Context->lang->cmd_login ?></button>
		</div>
		<div class="bt-wrap2" style="padding-top:22px;">
			<a href="<?php echo getUrl('act','dispMemberSignUpForm') ?>" class="btLeft btSignup"><?php echo $__Context->lang->cmd_signup ?></a>
			<a href="<?php echo getUrl('act','dispMemberFindAccount') ?>" class="btRight btFind"><?php echo $__Context->lang->cmd_find_member_account ?></a>
		</div>
	</form>
</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_footer.html') ?>
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
