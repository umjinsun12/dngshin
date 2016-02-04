<?php if(!defined("__XE__"))exit;?>
<!--#Meta:modules/krzip/tpl/css/default.css--><?php $__tmp=array('modules/krzip/tpl/css/default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/krzip/tpl/js/epostapi.js--><?php $__tmp=array('modules/krzip/tpl/js/epostapi.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="krZip" id="krzip-<?php echo $__Context->template_config->sequence_id ?>">
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-postcode" value="<?php echo $__Context->template_config->values[0] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-roadAddress" value="<?php echo $__Context->template_config->values[1] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-jibunAddress" value="<?php echo $__Context->template_config->values[2] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-detailAddress" value="<?php echo $__Context->template_config->values[3] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-extraAddress" value="<?php echo $__Context->template_config->values[4] ?>" />
	<div class="krzip-postcode-wrap">
		<label><?php echo $__Context->lang->cmd_krzip_postcode ?></label>
		<input type="text" class="krzip-postcode" value="<?php echo $__Context->template_config->values[0] ?>" disabled="disabled" />
		<input type="button" class="krzip-search btn" value="<?php echo $__Context->lang->cmd_search ?>" />
	</div>
	<div class="krzip-address-wrap">
		<label><?php echo $__Context->lang->cmd_krzip_address ?></label>
		<input type="text" class="krzip-roadAddress" value="<?php echo $__Context->template_config->values[1] ?>" disabled="disabled" />
		<input type="text" class="krzip-jibunAddress" value="<?php echo $__Context->template_config->values[2] ?>" disabled="disabled" />
		<input type="text" class="krzip-extraAddress" value="<?php echo $__Context->template_config->values[4] ?>" disabled="disabled" />
	</div>
	<div class="krzip-detailAddress-wrap">
		<label><?php echo $__Context->lang->cmd_krzip_detail_address ?></label>
		<input type="text" class="krzip-detailAddress" value="<?php echo $__Context->template_config->values[3] ?>" />
	</div>
</div>
<script>
//<![CDATA[
jQuery("#krzip-<?php echo $__Context->template_config->sequence_id ?>").Krzip();
//]]>
</script>
