<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/nproduct/tpl/filter','update_item.xml');$__xmlFilter->compile(); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/nproduct/tpl/filter','delete_item.xml');$__xmlFilter->compile(); ?>
<?php Context::unloadFile('modules/menu/tpl/css/themes/default/style.css','',''); ?>
<!--#Meta:modules/nproduct/tpl/js/script.js--><?php $__tmp=array('modules/nproduct/tpl/js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/js/updateitem.js--><?php $__tmp=array('modules/nproduct/tpl/js/updateitem.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/js/jstree.min.js--><?php $__tmp=array('modules/nproduct/tpl/js/jstree.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/css/themes/default/style.css--><?php $__tmp=array('modules/nproduct/tpl/css/themes/default/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/css/updateitem.css--><?php $__tmp=array('modules/nproduct/tpl/css/updateitem.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/js/productpicker.js--><?php $__tmp=array('modules/nproduct/tpl/js/productpicker.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/css/productpicker.css--><?php $__tmp=array('modules/nproduct/tpl/css/productpicker.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<style>
	.x_controls ul { list-style:none; margin:0; padding:0; }
	.x_controls ul li { float:left; margin-right:10px;}
</style>
<script>
var g_module_srl = <?php echo $__Context->module_srl ?>; // used in updateitem.js
var v=xe.getApp('validator')[0];
<?php if($__Context->extra_vars&&count($__Context->extra_vars))foreach($__Context->extra_vars as $__Context->key=>$__Context->val){ ?>
v.cast('ADD_MESSAGE',['<?php echo $__Context->val->column_name ?>','<?php echo $__Context->val->column_title ?>']);
<?php } ?>
xe.lang.product_picker = '<?php echo $__Context->lang->product_picker ?>';
xe.lang.cmd_delete = '<?php echo $__Context->lang->cmd_delete ?>';
xe.lang.cmd_append = '<?php echo $__Context->lang->cmd_append ?>';
</script>
<?php Context::addJsFile("./files/ruleset/nproduct_insertItem.xml", FALSE, "", 0, "body", TRUE, "") ?><form method="post" class="x_form-horizontal"  enctype="multipart/form-data"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@nproduct_insertItem" />
	<input name="module" type="hidden" value="<?php echo $__Context->module ?>" />
	<input name="act" type="hidden" value="procNproductAdminUpdateItem" />
	<input name="item_srl" type="hidden" value="<?php echo $__Context->item_srl ?>" />
	<input name="module_srl" type="hidden" value="<?php echo $__Context->item_info->module_srl ?>" />
	<input name="category_id" type="hidden" value="<?php echo $__Context->item_info->category_id ?>" />
	<input name="document_srl" type="hidden" value="<?php echo $__Context->item_info->document_srl ?>" />
	<input name="description" type="hidden" value="<?php echo $__Context->oDocument->getContentText() ?>" />
	<input name="delivery_info" type="hidden" value="<?php echo htmlspecialchars($__Context->item_info->delivery_info) ?>" />
	<input name="proc_module" type="hidden" value="<?php echo $__Context->module_info->proc_module ?>" />
	<input name="s_item_name" type="hidden" value="<?php echo $__Context->s_item_name ?>" />
	<input name="category" type="hidden" value="<?php echo $__Context->category ?>" />
	<section class="section">
	<h1><?php echo $__Context->lang->title_product_basicinfo ?></h1>
		<div class="x_control-group">
			<label class="x_control-label" for="disp_module_srl"><?php echo $__Context->lang->display_page ?></label>
			<div class="x_controls">
				<select name="disp_module_srl">
					<?php if($__Context->modinst&&count($__Context->modinst))foreach($__Context->modinst as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->module_srl ?>"<?php if($__Context->val->module_srl==$__Context->item_info->module_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->browser_title ?>(<?php echo $__Context->val->mid ?>)</option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="category_depth1"><?php echo $__Context->lang->select_category ?></label>
			<div class="x_controls">
				<select id="category_depth1" class="category" depth="1">
					<option value=""><?php echo $__Context->lang->category_depth1 ?></option>
					<?php if($__Context->category_data->list[0]&&count($__Context->category_data->list[0]))foreach($__Context->category_data->list[0] as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->node_id ?>"<?php if($__Context->category_data->depth1==$__Context->val->node_id){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->category_name ?></option><?php } ?>
				</select>
				<select id="category_depth2" class="category" depth="2">
					<option value=""><?php echo $__Context->lang->category_depth2 ?></option>
					<?php if($__Context->category_data->list[1]&&count($__Context->category_data->list[1]))foreach($__Context->category_data->list[1] as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->node_id ?>"<?php if($__Context->category_data->depth2==$__Context->val->node_id){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->category_name ?></option><?php } ?>
				</select>
				<select id="category_depth3" class="category" depth="3">
					<option value=""><?php echo $__Context->lang->category_depth3 ?></option>
					<?php if($__Context->category_data->list[2]&&count($__Context->category_data->list[2]))foreach($__Context->category_data->list[2] as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->node_id ?>"<?php if($__Context->category_data->depth3==$__Context->val->node_id){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->category_name ?></option><?php } ?>
				</select>
				<select id="category_depth4" class="category" depth="4">
					<option value=""><?php echo $__Context->lang->category_depth4 ?></option>
					<?php if($__Context->category_data->list[3]&&count($__Context->category_data->list[3]))foreach($__Context->category_data->list[3] as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->node_id ?>"<?php if($__Context->category_data->depth4==$__Context->val->node_id){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->category_name ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="item_name"><?php echo $__Context->lang->product_name ?> <em style="color:red">*</em></label>
			<div class="x_controls">
				<input name="item_name" type="text" class="x_span6" value="<?php echo $__Context->item_info->item_name ?>" />
				<a href="#item_name_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="item_name_help" class="x_help-block" hidden><?php echo $__Context->lang->about_product_name ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="item_code"><?php echo $__Context->lang->item_code ?></label>
			<div class="x_controls">
				<input name="item_code" type="text" value="<?php echo $__Context->item_info->item_code ?>" />
				<a href="#item_code_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="item_code_help" class="x_help-block" hidden><?php echo $__Context->lang->about_product_code ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="thumbnail_image"><?php echo $__Context->lang->thumbnail ?></label>
			<div class="x_controls">
				<?php if($__Context->item_info->thumbnail_url){ ?><div><img src="<?php echo $__Context->item_info->thumbnail_url ?>" /></div><?php } ?>
				<input type="file" name="thumbnail_image" />
				<a href="#thumbnail_image_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="thumbnail_image_help" class="x_help-block" hidden><?php echo $__Context->lang->about_thumbnail_image ?></p>
			</div>
		</div>
		<?php if($__Context->item_info->download_file){ ?><div id="contents_file_select" class="x_control-group">
			<label class="x_control-label" for="contents_file"><?php echo $__Context->lang->contents_file ?></label>
			<div class="x_controls">
				<p id="file_info"><a href="<?php echo $__Context->item_info->download_file->download_url ?>"><?php echo $__Context->item_info->download_file->source_filename ?></a> (<?php echo FileHandler::filesize($__Context->item_info->download_file->file_size) ?>) <button onClick="delete_file(<?php echo $__Context->item_info->file_srl ?>)"><?php echo $__Context->lang->cmd_delete ?></button></p>
				<p><a href="<?php echo getUrl('act','dispNstore_digital_contentsAdminItemList') ?>"><?php echo $__Context->lang->nstore_digital_management ?></a><?php echo $__Context->lang->upload_module ?></p>
			</div>
		</div><?php } ?>
		<div class="x_control-group">
			<label class="x_control-label" for="display"><?php echo $__Context->lang->display_or_not ?> <em style="color:red">*</em></label>
			<div class="x_controls">
				<label for="display_Y"><input type="radio" name="display" id="display_Y" value="Y"<?php if($__Context->item_info->display=='Y'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->lang->display ?></label>
				<label for="display_N"><input type="radio" name="display" id="display_N" value="N"<?php if($__Context->item_info->display=='N'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->lang->not_display ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="price"><?php echo $__Context->lang->price ?> <em style="color:red">*</em></label>
			<div class="x_controls">
				<input name="price" type="text" value="<?php echo $__Context->item_info->price ?>" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="discount_amount"><?php echo $__Context->lang->total_discount ?></label>
			<div class="x_controls">
				<input name="discount_amount" type="text" value="<?php echo $__Context->item_info->discount_amount ?>" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="discount_info"><?php echo $__Context->lang->discount_title ?></label>
			<div class="x_controls">
				<input name="discount_info" type="text" value="<?php echo $__Context->item_info->discount_info ?>" />
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="taxfree"><?php echo $__Context->lang->tax_or_not ?></label>
			<div class="x_controls">
				<label for="taxfree_1"><input type="radio" name="taxfree" id="taxfree_1" value="N"<?php if($__Context->item_info->taxfree=='N'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->lang->taxation ?></label>
				<label for="taxfree_2"><input type="radio" name="taxfree" id="taxfree_2" value="Y"<?php if($__Context->item_info->taxfree=='Y'){ ?> checked="checked"<?php } ?> /><?php echo $__Context->lang->no_taxation ?></label>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label" for="editor"><?php echo $__Context->lang->description ?> <em style="color:red">*</em></div>
			<div class="x_controls">
				<?php echo $__Context->editor ?>
			</div>
		</div>
		<?php if($__Context->extra_vars&&count($__Context->extra_vars))foreach($__Context->extra_vars as $__Context->key=>$__Context->val){ ?>
			<div class="x_control-group">
				<label class="x_control-label"><?php echo $__Context->val->getTitle(TRUE) ?></label>
				<div class="x_controls">
					<?php echo $__Context->val->getFormHTML(FALSE) ?>
					<a href="#<?php echo $__Context->val->name ?>_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
					<p id="<?php echo $__Context->val->name ?>_help" class="x_help-block" hidden><?php echo $__Context->val->desc ?></p>
				</div>
			</div>
		<?php } ?>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->order_options ?></div>
			<div class="x_controls">
				<span class="btn small" data-item-srl="<?php echo $__Context->item_srl ?>"><a href="#modifyOptions" class="modalAnchor modifyOptions"><?php echo $__Context->lang->cmd_modify ?></a></span>
				<?php if($__Context->options&&count($__Context->options))foreach($__Context->options as $__Context->key=>$__Context->val){ ?><div>
					<ul>
						<li><?php echo $__Context->val->title ?> (<?php echo $__Context->item_info->printPrice($__Context->val->price) ?>)</li>
					</ul>
				</div><?php } ?>
			</div>
		</div>
	</section>
	<section class="section collapsed">
		<h1><?php echo $__Context->lang->title_extra_options ?></h1>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->related_items ?></div>
			<div class="x_controls">
				<div style="clear:both">
					<ul class="list_header"><li class="title"><?php echo $__Context->lang->item_name ?></li><li class="check"><?php echo $__Context->lang->force_purchase ?></li><li class="delete"><?php echo $__Context->lang->cmd_delete ?></li></ul>
					<input name="related_items" type="text" class="product_picker" value="<?php echo htmlspecialchars($__Context->item_info->related_items) ?>" />
				</div>
				<div style="clear:both">
					<a href="#related_items_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
					<p id="related_items_help" class="x_help-block" hidden><?php echo $__Context->lang->about_related_items ?></p>
				</div>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->minimum_order_quantity ?></div>
			<div class="x_controls">
				<input name="minimum_order_quantity" type="text" value="<?php echo $__Context->item_info->minimum_order_quantity ?>" />
				<a href="#minimum_order_quantity_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="minimum_order_quantity_help" class="x_help-block" hidden><?php echo $__Context->lang->about_minimum_order_quantity ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->refund_policy ?></div>
			<div class="x_controls">
				<span class="btn small" id="<?php echo $__Context->item_srl ?>"><a href="#modifyDeliveryInfo" class="modalAnchor modifyDeliveryInfo"><?php echo $__Context->lang->cmd_modify ?></a></span>
				<?php echo $__Context->item_info->delivery_info ?>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->group_discount ?></div>
			<div class="x_controls">
				<?php if($__Context->group_list&&count($__Context->group_list))foreach($__Context->group_list as $__Context->key=>$__Context->val){ ?>
					<div class="x_control-group">
						<div class="x_control-label" for="group_discount_<?php echo $__Context->key ?>"><?php echo $__Context->val->title ?></div>
						<div class="x_controls">
							<label for="group_opt_1_<?php echo $__Context->key ?>"><input type="radio" name="group_opt_<?php echo $__Context->key ?>" id="group_opt_1_<?php echo $__Context->key ?>" value="1"<?php if($__Context->group_discount[$__Context->key]->opt=='1'){ ?> checked="checked"<?php } ?>><?php echo $__Context->lang->price ?></label>
							<label for="group_opt_2_<?php echo $__Context->key ?>"><input type="radio" name="group_opt_<?php echo $__Context->key ?>" id="group_opt_2_<?php echo $__Context->key ?>" value="2"<?php if($__Context->group_discount[$__Context->key]->opt=='2'){ ?> checked="checked"<?php } ?>><?php echo $__Context->lang->ratio ?>&nbsp;<input type="text" name="group_discount_<?php echo $__Context->key ?>" id="group_discount_<?php echo $__Context->key ?>" value="<?php echo $__Context->group_discount[$__Context->key]->price ?>" /></label>
							
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="x_control-group">
			<div class="x_control-label" for=""><?php echo $__Context->lang->addgroup_after_purchase ?></div>
			<div class="x_controls">
				<?php if($__Context->group_list&&count($__Context->group_list))foreach($__Context->group_list as $__Context->key=>$__Context->val){ ?>
					<label for="group_srl_<?php echo $__Context->key ?>"><input type="checkbox" name="group_srl_list[]" id="group_srl_<?php echo $__Context->key ?>" value="<?php echo $__Context->key ?>"<?php if(in_array($__Context->val->group_srl,$__Context->item_info->group_srl_list)){ ?> checked="checked"<?php } ?> /><?php echo $__Context->val->title ?></label>
				<?php } ?>
			</div>
		</div>
	</section>
	<div class="btnArea">
		<button type="submit" class="x_btn x_btn-primary"><?php echo $__Context->lang->cmd_save ?></button>
		<a href="#deleteItem" class="x_btn modalAnchor deleteItem"><?php echo $__Context->lang->cmd_delete ?></a>
		<a class="x_btn" href="<?php echo getUrl('act','dispNproductAdminItemList') ?>"><?php echo $__Context->lang->cmd_list ?></a>
	</div>
</form>
<div class="x_modal" id="modifyDeliveryInfo">
	<?php Context::addJsFile("modules/nproduct/ruleset/insertDeliveryInfo.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="fg form"  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertDeliveryInfo" />
		<input type="hidden" name="act" value="procNproductAdminInsertDeliveryInfo" />
		<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
		<div id="extendForm">
		</div>
	</form>
</div>
<div class="x_modal" id="adminManualOrder">
	<?php Context::addJsFile("modules/nproduct/ruleset/insertManualOrder.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" class="fg form"  method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertManualOrder" />
		<input type="hidden" name="act" value="procNproductAdminInsertManualOrder" />
		<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
		<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
		<input type="hidden" name="item_srl" value="<?php echo $__Context->item_srl ?>" />
		<div id="orderForm">
		</div>
	</form>
</div>
<form action="./" id="deleteItem" class="x_modal" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="act" value="procNproductAdminDeleteItem" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', 'dispNproductAdminItemList') ?>" />
	<input type="hidden" name="item_srl" value="<?php echo $__Context->item_srl ?>" />
	<div class="x_modal-header">
		<h1><?php echo $__Context->lang->cmd_delete ?></h1>
	</div>
	<div class="x_modal-content">
		<p><?php echo $__Context->lang->msg_sure_to_delete ?></p>
	</div>
	<div class="x_modal-footer">
		<button type="submit" class="x_btn x_btn-inverse"><?php echo $__Context->lang->cmd_delete ?></button>
	</div>
</form>
<div class="x_modal" id="modifyOptions">
	<form action="./" class="fg form" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="act" value="procNproductInsertOptions" />
		<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
		<input name="item_srl" type="hidden" value="<?php echo $__Context->item_srl ?>" />
		<div id="optionsForm">
		</div>
	</form>
</div>
