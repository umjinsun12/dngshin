<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/tpl','header.html') ?>
<!--#Meta:modules/member/tpl/js/default_config.js--><?php $__tmp=array('modules/member/tpl/js/default_config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php Context::addJsFile("modules/member/ruleset/insertDefaultConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="x_form-horizontal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertDefaultConfig" />
	<input type="hidden" name="module" value="member" />
	<input type="hidden" name="act" value="procMemberAdminInsertDefaultConfig" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('', 'module', 'admin', 'act', $__Context->act) ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/member/tpl/1" />
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $__Context->lang->enable_join ?></div>
		<div class="x_controls">
			<label class="x_inline" for="enable_join_yes"><input type="radio" name="enable_join" id="enable_join_yes" value="Y"<?php if($__Context->config->enable_join == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_yes ?></label>
			<label class="x_inline" for="enable_join_no"><input type="radio" name="enable_join" id="enable_join_no" value="N"<?php if($__Context->config->enable_join != 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_no ?></label>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $__Context->lang->enable_confirm ?></div>
		<div class="x_controls">
			<label class="x_inline" for="enable_confirm_yes"><input type="radio" name="enable_confirm" id="enable_confirm_yes" value="Y"<?php if($__Context->config->enable_confirm == 'Y'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->cmd_yes ?></label>
			<label class="x_inline" for="enable_confirm_no"><input type="radio" name="enable_confirm" id="enable_confirm_no" value="N"<?php if($__Context->config->enable_confirm != 'Y'){ ?> checked="checked"<?php } ?>/> <?php echo $__Context->lang->cmd_no ?></label>
			<p class="x_help-block"><?php echo $__Context->lang->about_enable_confirm ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<div class="x_control-label"><?php echo $__Context->lang->cmd_config_password_strength ?></div>
		<div class="x_controls">
			<label class="x_inline" for="password_strength1"><input type="radio" name="password_strength" id="password_strength1" value="low"<?php if($__Context->config->password_strength == 'low'){ ?> checked="checked"<?php } ?> /> <?php echo $__Context->lang->password_strength_low ?>(<?php echo $__Context->lang->about_password_strength['low'] ?>)</label><br>
			<label class="x_inline" for="password_strength2"><input type="radio" name="password_strength" id="password_strength2" value="normal"<?php if(!$__Context->config->password_strength || $__Context->config->password_strength == 'normal'){ ?> checked="checked"<?php } ?>/> <?php echo $__Context->lang->password_strength_normal ?>(<?php echo $__Context->lang->about_password_strength['normal'] ?>)</label><br>
			<label class="x_inline" for="password_strength3"><input type="radio" name="password_strength" id="password_strength3" value="high"<?php if($__Context->config->password_strength == 'high'){ ?> checked="checked"<?php } ?>/> <?php echo $__Context->lang->password_strength_high ?>(<?php echo $__Context->lang->about_password_strength['high'] ?>)</label><br>
			<p class="x_help-block"><?php echo $__Context->lang->about_password_strength_config ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="webmaster_name"><?php echo $__Context->lang->webmaster_name ?></label>
		<div class="x_controls">
			<input type="text" id="webmaster_name" name="webmaster_name" value="<?php echo $__Context->config->webmaster_name ?>" size="20" />
			<p class="x_help-inline"><?php echo $__Context->lang->about_webmaster_name ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="webmaster_email"><?php echo $__Context->lang->webmaster_email ?></label>
		<div class="x_controls">
			<input type="email" id="webmaster_email" name="webmaster_email" value="<?php echo $__Context->config->webmaster_email ?>" size="40" />
			<p class="x_help-inline"><?php echo $__Context->lang->about_webmaster_email ?></p>
		</div>
	</div>
	<div class="x_control-group">
		<label class="x_control-label" for="member_sync"><?php echo $__Context->lang->cmd_member_sync ?></label>
		<div class="x_controls">
			<input id="member_sync" type="button" value="<?php echo $__Context->lang->cmd_member_sync ?>" class="__sync x_btn x_btn-warning" />
			<p class="x_help-inline"><?php echo $__Context->lang->about_member_sync ?></p>
		</div>
	</div>
	<div class="btnArea x_clearfix">
		<span class="x_pull-right"><input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_save ?>" /></span>
	</div>
</form>
