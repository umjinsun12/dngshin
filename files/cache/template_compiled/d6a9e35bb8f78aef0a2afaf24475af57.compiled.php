<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/tpl/js/itemextrasetup.js--><?php $__tmp=array('modules/nproduct/tpl/js/itemextrasetup.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#JSPLUGIN:ui--><?php Context::loadJavascriptPlugin('ui'); ?>
<div>
	<ul id="extraList" class="x_unstyled">
		<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->key=>$__Context->val){ ?><li id="record_<?php echo $__Context->val->extra_srl ?>" class="x_nav-list">
			<span class="iconMoveTo"></span>
			<span style="width:90px;"><?php echo $__Context->val->column_title ?></span>
			<a href="#extraDelete" class="delete modalAnchor extendFormDelete" data-extra-srl="<?php echo $__Context->val->extra_srl ?>" style="float:right;"><?php echo $__Context->lang->cmd_delete ?></a>
			<a href="#extraDefine" class="modify modalAnchor _edit" data-extra-srl="<?php echo $__Context->val->extra_srl ?>" style="float:right;margin-right:10px;"><?php echo $__Context->lang->cmd_modify ?></a>
			<?php if($__Context->val->index_extra){ ?><span><?php echo $__Context->lang->default_reg_field ?></span><?php } ?>
		</li><?php } ?>
	</ul>
	<p class="btnArea">
		<a href="#extraDefine" class="x_btn modalAnchor extendFormEdit"><?php echo $__Context->lang->cmd_append_field ?></a>
	</p>
</div>
<?php Context::addJsFile("modules/nproduct/ruleset/insertItemExtra.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" id="extraDefine" class="x_modal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertItemExtra" />
	<input type="hidden" name="act" value="procNproductAdminInsertItemExtra" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<div id="extendForm">
	</div>
</form>
<form action="./" id="extraDelete" class="x_modal" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="act" value="procNproductAdminDeleteItemExtra" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<input type="hidden" name="extra_srl" id="extra_srl" />
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->delete ?></h1>
	</div>
	<div class="x_modal-body">
		<?php echo $__Context->lang->item_to_delete ?> : <span id="item_to_delete"></span>
	</div>
	<div class="x_modal-footer">
		<button type="submit" class="x_btn x_btn-inverse"><?php echo $__Context->lang->cmd_delete ?></button>
	</div>
</form>
