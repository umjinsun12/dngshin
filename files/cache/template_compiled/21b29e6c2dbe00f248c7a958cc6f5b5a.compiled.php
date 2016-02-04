<?php if(!defined("__XE__"))exit;?><form action="./" method="post" class="form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="procNproductAdminUpdateItemList" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('','module',$__Context->module,'act',$__Context->act,'module_srl',$__Context->module_srl) ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
	<table class="x_table">
		<thead>
			<tr>
				<th><?php echo $__Context->lang->item_number ?></th>
				<th><?php echo $__Context->lang->item_code ?></th>
				<th></th>
				<th><?php echo $__Context->lang->item_name ?></th>
				<th><?php echo $__Context->lang->tax_or_not ?></th>
				<th><?php echo $__Context->lang->display_or_not ?></th>
				<th><?php echo $__Context->lang->price ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__Context->cnt=0 ?>
			<?php if($__Context->update_list&&count($__Context->update_list))foreach($__Context->update_list as $__Context->item_code=>$__Context->upd){ ?><tr>
				<?php $__Context->val=$__Context->original_list[$__Context->item_code] ?>
				<?php $__Context->org_taxfree='' ?>
				<?php $__Context->org_display='' ?>
				<?php if($__Context->val->taxfree=='Y'){;
$__Context->org_taxfree=$__Context->lang->no_taxation;
} ?>
				<?php if($__Context->val->taxfree=='N'){;
$__Context->org_taxfree=$__Context->lang->taxation;
} ?>
				<?php if($__Context->val->display=='Y'){;
$__Context->org_display=$__Context->lang->display;
} ?>
				<?php if($__Context->val->display=='N'){;
$__Context->org_display=$__Context->lang->not_display;
} ?>
				<td><input type="hidden" name="item_srls[]"<?php if($__Context->val->item_srl){ ?> value="<?php echo $__Context->val->item_srl ?>"<?php };
if(!$__Context->val->item_srl){ ?> value="0"<?php } ?> /><?php echo ++$__Context->cnt ?></td>
				<?php if($__Context->val->item_code){ ?><td><input type="hidden" name="item_code[]" value="<?php echo $__Context->upd->item_code ?>" /><?php echo $__Context->val->item_code ?></td><?php } ?>
				<?php if(!$__Context->val->item_code){ ?><td><input type="text" name="item_code[]" style="width:120px;border:solid red 1px;" value="<?php echo $__Context->upd->item_code ?>" /><?php echo $__Context->val->item_code ?></td><?php } ?>
				<td><a href="<?php echo getUrl('act','dispNstore_digitalAdminUpdateItem','item_srl',$__Context->val->item_srl) ?>"><span style="margin-right:6px;"><img src="<?php echo $__Context->val->getThumbnail(30) ?>" /></span></a></td>
				<td><div><?php echo $__Context->val->item_name ?><div><input type="text" name="item_name[]"<?php if($__Context->upd->item_name!=$__Context->val->item_name){ ?> style="border:solid red 1px;"<?php } ?> value="<?php echo $__Context->upd->item_name ?>" /></td>
				<td><div><?php echo $__Context->org_taxfree ?></div><select name="taxfree[]"<?php if($__Context->upd->taxfree!=$__Context->val->taxfree){ ?> style="border:solid red 1px;"<?php } ?>><option value="N"<?php if($__Context->upd->taxfree=='N'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->taxation ?></option><option value="Y"<?php if($__Context->upd->taxfree=='Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->no_taxation ?></option></select></td>
				<td><div><?php echo $__Context->org_display ?></div><select name="display[]"<?php if($__Context->upd->display!=$__Context->val->display){ ?> style="border:solid red 1px;"<?php } ?>><option value="Y"<?php if($__Context->upd->display=='Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->display ?></option><option value="N"<?php if($__Context->upd->display=='N'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->not_display ?></option></select></td>
				<td><?php if($__Context->val->price){ ?><div><?php echo $__Context->val->price ?></div><?php } ?><input type="text" name="price[]"<?php if($__Context->upd->price==$__Context->val->price){ ?> style="width:50px"<?php };
if($__Context->upd->price!=$__Context->val->pricee){ ?> style="width:50px;border:solid red 1px;"<?php } ?> value="<?php echo $__Context->upd->price ?>" /></td>
			</tr><?php } ?>
			<?php if(!count($__Context->original_list)){ ?><tr>
				<td colspan="7"><?php echo $__Context->lang->msg_no_items ?></td>
			</tr><?php } ?>
		</tbody>
	</table>
	<div class="btnArea">
		<button type="submit" class="x_btn"><?php echo $__Context->lang->cmd_apply ?></button>
	</div>
</form>
<div><?php echo $__Context->lang->about_bulk_registration ?></div>
<form action="./" class="form" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
	<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
	<textarea name="item_list" style="width:600px;height:200px;"></textarea>
	<button type="submit" class="x_btn"><?php echo $__Context->lang->cmd_confirm ?></button>
</form>
