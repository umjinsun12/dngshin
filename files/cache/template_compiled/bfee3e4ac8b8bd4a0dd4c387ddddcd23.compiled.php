<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/m.skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/m.skins/default/css/categorylist.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/categorylist.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/m.skins/default/css/button.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/button.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/categorylist.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/categorylist.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="category-box">
	<div class="category-route">
		<ul>
			<li><span class="h_btn"></span><a href="<?php echo getUrl('category','','item_srl','') ?>"><?php echo $__Context->lang->home ?></a></li>
			<?php if($__Context->category_info->route&&count($__Context->category_info->route))foreach($__Context->category_info->route as $__Context->key=>$__Context->val){;
if($__Context->val){ ?><li>&gt;<a href="<?php echo getUrl('category',$__Context->val,'item_srl','') ?>"><?php echo $__Context->entire_category_index[$__Context->val]->category_name ?></a></li><?php }} ?>
		</ul>
	</div>
	<div class="category-list totalcorners <?php echo $__Context->module_info->colorset ?>">
		<div id="current-category"><span style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis; width:70%; display:inline-block;"><?php echo $__Context->parent_category_info->category_name ?></span><span class="arrow"></span></div>
		<div class="cate_list"<?php if($__Context->module_info->category_width){ ?> style="width:<?php echo $__Context->module_info->category_width ?>"<?php } ?>>
			<ul class="children">
				<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->no=>$__Context->val){ ?><li><a href="<?php echo getUrl('category',$__Context->val->node_id,'item_srl','') ?>"<?php if($__Context->category==$__Context->val->node_id){ ?> class="active"<?php } ?>><?php echo $__Context->val->category_name ?></a></li><?php } ?>
			</ul>
		</div>
	</div>
	<ul id="siblings">
		<?php if($__Context->siblings&&count($__Context->siblings))foreach($__Context->siblings as $__Context->no=>$__Context->val){ ?><li><a href="<?php echo getUrl('category',$__Context->val->node_id,'item_srl','') ?>"><?php echo $__Context->val->category_name ?></a></li><?php } ?>
	</ul>
</div>
