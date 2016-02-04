<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/license/tpl','_header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<form action="./" class="x_form-horizontal" method="post" enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="procLicenseAdminConfig" />
	<?php if(in_array('elearning', $__Context->products)){ ?><section class="section">
	<h1><?php echo $__Context->lang->elearning ?></h1>
		<?php if($__Context->ELEARNING_MESSAGE){ ?><div class="message <?php echo $__Context->ELEARNING_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->ELEARNING_MESSAGE ?></p>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->license_id ?></label>
			<div class="x_controls">
				<input type="text" name="e_user_id" value="<?php echo $__Context->config->e_user_id ?>" />
				<a href="#e_user_id_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="e_user_id_help" class="x_help-block" hidden><?php echo $__Context->lang->about_license_id ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->serial_number ?></label>
			<div class="x_controls">
				<input type="text" name="e_serial_number" value="<?php echo $__Context->config->e_serial_number ?>" />
				<a href="#e_serial_number_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="e_serial_number_help" class="x_help-block" hidden><?php echo $__Context->lang->about_serial_number ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->expiration_date ?></label>
			<div class="x_controls">
				<span><?php echo zdate($__Context->elearning_expiration, 'Y-m-d') ?></span>
				<a href="#elearning_expiration_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="elearning_expiration_help" class="x_help-block" hidden><?php echo $__Context->lang->about_expiration ?></p>
			</div>
		</div>
	</section><?php } ?>
	<?php if(in_array('nstore', $__Context->products)){ ?><section class="section">
		<h1><?php echo $__Context->lang->shoppingmall ?></h1>
		<?php if($__Context->NSTORE_MESSAGE){ ?><div class="message <?php echo $__Context->NSTORE_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->NSTORE_MESSAGE ?></p>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->license_id ?></label>
			<div class="x_controls">
				<input type="text" name="user_id" value="<?php echo $__Context->config->user_id ?>" />
				<a href="#user_id_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="user_id_help" class="x_help-block" hidden><?php echo $__Context->lang->about_license_id ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->serial_number ?></label>
			<div class="x_controls">
				<input type="text" name="serial_number" value="<?php echo $__Context->config->serial_number ?>" />
				<a href="#serial_number_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="serial_number_help" class="x_help-block" hidden><?php echo $__Context->lang->about_serial_number ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->expiration_date ?></label>
			<div class="x_controls">
				<span><?php echo zdate($__Context->nstore_expiration, 'Y-m-d') ?></span>
				<a href="#expiration_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="expiration_help" class="x_help-block" hidden><?php echo $__Context->lang->about_expiration ?></p>
			</div>
		</div>
	</section><?php } ?>
	<?php if(in_array('nstore_digital', $__Context->products)){ ?><section class="section">
		<h1><?php echo $__Context->lang->contentsmall ?></h1>
		<?php if($__Context->NSTORE_DIGITAL_MESSAGE){ ?><div class="message <?php echo $__Context->NSTORE_DIGITAL_MESSAGE_TYPE ?>">
			<p><?php echo $__Context->NSTORE_DIGITAL_MESSAGE ?></p>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->license_id ?></label>
			<div class="x_controls">
				<input type="text" name="d_user_id" value="<?php echo $__Context->config->d_user_id ?>" />
				<a href="#d_user_id_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="d_user_id_help" class="x_help-block" hidden><?php echo $__Context->lang->about_license_id ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->serial_number ?></label>
			<div class="x_controls">
				<input type="text" name="d_serial_number" value="<?php echo $__Context->config->d_serial_number ?>" />
				<a href="#d_serial_number_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="d_serial_number_help" class="x_help-block" hidden><?php echo $__Context->lang->about_serial_number ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label"><?php echo $__Context->lang->expiration_date ?></label>
			<div class="x_controls">
				<span><?php echo zdate($__Context->nstore_digital_expiration, 'Y-m-d') ?></span>
				<a href="#nstore_digital_expiration_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="nstore_digital_expiration_help" class="x_help-block" hidden><?php echo $__Context->lang->about_expiration ?></p>
			</div>
		</div>
	</section><?php } ?>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit" accesskey="s"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</div>
</form>
