<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/message/tpl/js/config.js--><?php $__tmp=array('modules/message/tpl/js/config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>
		<?php echo $__Context->lang->message ?>
		<a href="#aboutSkin" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="aboutSkin" hidden><?php echo $__Context->lang->about_skin ?></p>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/message/tpl/config/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form action="./" method="post" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<input type="hidden" name="module" value="message" />
<input type="hidden" name="act" value="procMessageAdminInsertConfig" />
<input type="hidden" name="xe_validator_id" value="modules/message/tpl/config/1" />
	<div class="x_control-group">
		<label for="skin" class="x_control-label"><?php echo $__Context->lang->skin ?></label>
		<div class="x_controls">
			<select name="skin" id="skin" style="width:auto" onchange="doGetSkinColorset(this.options[this.selectedIndex].value)">
				<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key == $__Context->config->skin){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div id="colorset" class="x_control-group" style="display:none">
		<label class="x_control-label" for="message_colorset"><?php echo $__Context->lang->colorset ?></label>
		<div class="x_controls">
			<div id="message_colorset"></div>
		</div>
	</div>
	<div class="x_control-group">
		<label for="mskin" class="x_control-label"><?php echo $__Context->lang->mobile_skin ?></label>
		<div class="x_controls">
			<select name="mskin" id="mskin" style="width:auto" onchange="doGetSkinColorset(this.options[this.selectedIndex].value, 'M')">
				<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key == $__Context->config->mskin){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
			</select>
		</div>
	</div>
	<div id="mcolorset" class="x_control-group" style="display:none">
		<label class="x_control-label" for="message_mcolorset"><?php echo $__Context->lang->colorset ?></label>
		<div class="x_controls">
			<div id="message_mcolorset"></div>
		</div>
	</div>
	<div class="btnArea">
		<button class="x_btn x_btn-primary" type="submit"><?php echo $__Context->lang->cmd_registration ?></button>
	</div>
</form>
