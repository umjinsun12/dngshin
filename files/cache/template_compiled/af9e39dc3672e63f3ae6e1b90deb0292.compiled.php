<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/tpl/js/script.js--><?php $__tmp=array('modules/nproduct/tpl/js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/js/displaycategories.js--><?php $__tmp=array('modules/nproduct/tpl/js/displaycategories.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/nproduct/tpl/filter','update_display_category.xml');$__xmlFilter->compile(); ?>
<!--#JSPLUGIN:ui--><?php Context::loadJavascriptPlugin('ui'); ?>
<div>
	<ul id="categories" class="x_unstyled">
		<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->no=>$__Context->val){ ?><li id="record_<?php echo $__Context->val->category_srl ?>" class="x_nav-list">
			<span class="iconMoveTo"></span>
			<span class="category_name"><?php echo htmlspecialchars($__Context->val->category_name) ?> [<?php echo $__Context->val->category_srl ?>]</span>
			<a href="#" class="delete" onclick="delete_category(<?php echo $__Context->val->category_srl ?>); return false;" style="float:right;"><?php echo $__Context->lang->cmd_delete ?></a>
			<a href="#editCategory" class="modify modalAnchor _edit" style="float:right;margin-right:10px;"><?php echo $__Context->lang->cmd_modify ?></a>
		</li><?php } ?>
	</ul>
	<p class="btnArea">
		<a href="#editCategory" class="x_btn modalAnchor _add"><?php echo $__Context->lang->add_category ?></a>
	</p>
</div>
<?php Context::addJsFile("modules/nproduct/ruleset/insertCategory.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" id="editCategory" class="x_modal"  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertCategory" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="procNproductAdminInsertDisplayCategory" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="category_srl" value="" />
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->add_category ?></h1>
	</div>
	<div class="x_modal-body x_form-horizontal">
		<div class="x_control-group">
			<label for="category_name" class="x_control-label"><?php echo $__Context->lang->category_name ?></label>
			<div class="x_controls">
				<input type="text" id="category_name" name="category_name" value="" />
			</div>
		</div>
	</div>
	<div class="x_modal-footer">
		<button type="submit" class="x_btn x_btn-inverse"><?php echo $__Context->lang->cmd_save ?></button>
	</div>
</form>
<script>
	jQuery(function($) {
		$("#categories").sortable({ handle:'.iconMoveTo', opacity: 0.6, cursor: 'move',
			update: function(event,ui) {
				var order = jQuery(this).sortable("serialize");
				var params = new Array();
				params['order'] = order;
				var response_tags = new Array('error','message');
				exec_xml('nstore_digital', 'procNproductAdminUpdateDCListOrder', params, function(ret_obj) { }, response_tags);
			}
		});
	});
</script>
