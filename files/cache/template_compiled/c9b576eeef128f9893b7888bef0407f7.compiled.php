<?php if(!defined("__XE__"))exit;?>
<!--#Meta:modules/nproduct/m.skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/m.skins/default/css/_style.list.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/_style.list.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	
<table class="item-table" width="100%">
	<tbody>
		<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->no=>$__Context->val){ ?><tr id="item_<?php echo $__Context->val->item_srl ?>">
			<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->k=>$__Context->v){ ?>
			<?php if($__Context->k == 'image'){ ?><td><a href="<?php echo getUrl('mid',$__Context->mid,'item_srl',$__Context->val->item_srl,'act','') ?>"><img src="<?php echo $__Context->val->getThumbnail($__Context->module_info->list_thumbnail_width,$__Context->module_info->list_thumbnail_height,$__Context->module_info->list_thumbnail_type) ?>" /></a></td><?php } ?>
			<?php if($__Context->v->type == 'title'){ ?><td class="item_name">
				<p><a href="<?php echo getUrl('mid',$__Context->mid,'item_srl',$__Context->val->item_srl,'act','') ?>"><?php echo $__Context->val->item_name ?></a></p>
			</td><?php } ?><!-- name -->
			<?php if(!$__Context->val->discount_amount && $__Context->k == 'amount'){ ?><td><span class="item_price"><?php echo $__Context->val->printPrice() ?></span></td><?php } ?>
			<?php if($__Context->val->discount_amount && $__Context->k == 'amount'){ ?><td><span style="text-decoration:line-through;"><?php echo nproductItem::formatMoney($__Context->val->price) ?></span><br /><span class="font_size12"><strong><?php echo $__Context->val->printDiscountedPrice() ?></strong></span></td><?php } ?>
			<?php } ?>
		</tr><?php } ?>
		<?php if(!count($__Context->list)){ ?><tr>
			<td colspan="3"><?php echo $__Context->lang->msg_no_items ?></td>
		</tr><?php } ?>
	</tbody>
</table>
