<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/skins/default/css/btn.css--><?php $__tmp=array('modules/nproduct/skins/default/css/btn.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/_style.grid.css--><?php $__tmp=array('modules/nproduct/skins/default/css/_style.grid.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
	
<ul class="item-list <?php echo $__Context->module_info->colorset ?>">
	<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->no=>$__Context->val){ ?><li id="item_<?php echo $__Context->val->item_srl ?>" style="width:<?php echo $__Context->module_info->list_thumbnail_width ?>px">
		<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->k=>$__Context->v){ ?>
		<?php if($__Context->k == 'checkbox'){ ?><input class="check" type="checkbox" name="cart" value="<?php echo $__Context->val->item_srl ?>" /><?php } ?>
		<?php if($__Context->k== 'image'){ ?><a class="thumbnail" href="<?php echo getUrl('mid',$__Context->mid,'document_srl',$__Context->val->document_srl,'act','') ?>" style="height:<?php echo $__Context->module_info->list_thumbnail_height ?>px">
			<img src="<?php echo $__Context->val->getThumbnail($__Context->module_info->list_thumbnail_width,$__Context->module_info->list_thumbnail_height,$__Context->module_info->list_thumbnail_type) ?>" alt="" />
		</a><?php } ?>
		<?php if($__Context->k == 'title'){ ?><div class="item_name">
			<a href="<?php echo getUrl('mid',$__Context->mid,'document_srl',$__Context->val->document_srl,'act','') ?>"><?php echo $__Context->val->item_name ?></a>
		</div><?php } ?>
		<?php if($__Context->k == 'quantity'){ ?><div>
			<div class="item_num">
				<?php echo $__Context->lang->quantity ?>
				<span class="num">
					<input type="text" id="quantity_<?php echo $__Context->val->item_srl ?>" class="quantity" value="1" />
					<span class="iconUp" data-for="quantity_<?php echo $__Context->val->item_srl ?>"></span>
					<span class="iconDown" data-for="quantity_<?php echo $__Context->val->item_srl ?>"></span>
				</span>
			</div>
		</div><?php } ?>
		<?php if($__Context->k == 'amount' && $__Context->val->discount_amount){ ?><div><span style="text-decoration:line-through;"><?php echo $__Context->val->printPrice() ?></span></div><?php } ?>
		<?php if($__Context->k == 'amount' && !$__Context->val->discount_amount){ ?><div><span>&nbsp;</span></div><?php } ?>
		<?php if($__Context->k == 'amount'){ ?><div class="item_price"><?php echo $__Context->val->printDiscountedPrice() ?></div><?php } ?>
		<?php if($__Context->k == 'cart_buttons'){ ?><div class="item_choice">
			<a href="#" class="small <?php echo $__Context->btn_color ?> nuribtn" onclick="addItemsToCart(<?php echo $__Context->val->item_srl ?>); return false;"><?php echo $__Context->lang->cmd_cart ?></a>
			<a href="#" class="small light nuribtn" onclick="addItemsToFavorites(<?php echo $__Context->val->item_srl ?>); return false;"><?php echo $__Context->lang->cmd_favorites ?></a> 
		</div><?php } ?>
		<?php if($__Context->k == 'sales_count'){ ?><div><span><?php echo $__Context->lang->sales_count ?> : <?php echo $__Context->val->sales_count ?></span></div><?php } ?>
		<?php if($__Context->v->idx > -1 && $__Context->val->getExtraVarValue($__Context->k) != NULL){ ?><div><?php echo $__Context->val->getExtraVarTitle($__Context->k) ?> : <?php echo $__Context->val->getExtraVarValue($__Context->k) ?></div><?php } ?>
		<?php } ?>
	</li><?php } ?>
</ul>
