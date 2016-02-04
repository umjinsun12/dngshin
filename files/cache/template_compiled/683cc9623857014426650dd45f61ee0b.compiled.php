<?php if(!defined("__XE__"))exit;?><form action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" />
	<input type="hidden" name="act" value="procDgibiAdminUpdateSimpleSetup" />
	
	<?php lang->dgibi_title ?>
	<input type="text" name="title" value="<?php echo $__Context->config->title ?>" />
	
</form>