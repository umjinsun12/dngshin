<?php if(!defined("__XE__"))exit;?>
<load target="" />
<!--#Meta:modules/krzip/tpl/css/popup.css--><?php $__tmp=array('modules/krzip/tpl/css/popup.css','','','100000');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/krzip/tpl/js/epostapi.search.js--><?php $__tmp=array('modules/krzip/tpl/js/epostapi.search.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="krZip" id="krzip-<?php echo $__Context->template_config->sequence_id ?>">
	<div class="krzip-search-wrap">
		<div class="krzip-input-wrap">
			<input type="text" class="krzip-input" placeholder="<?php echo $__Context->lang->cmd_search ?>" />
		</div>
		<input type="button" class="krzip-search" />
	</div>
	<ul class="krzip-addressList">
	</ul>
</div>
<script>
//<![CDATA[
jQuery("#krzip-<?php echo $__Context->template_config->sequence_id ?>").Krzip();
//]]>
</script>
