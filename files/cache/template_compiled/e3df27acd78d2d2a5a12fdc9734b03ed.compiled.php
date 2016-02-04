<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/categorylist.css--><?php $__tmp=array('modules/nproduct/skins/default/css/categorylist.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/button.css--><?php $__tmp=array('modules/nproduct/skins/default/css/button.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/categorylist.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/categorylist.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="category-box">
	<div class="category-route">
		<ul>
			<li class="h_btn"><a href="<?php echo getUrl('category','','document_srl','item_srl','') ?>">홈</a></li>
			<?php if($__Context->category_info->route&&count($__Context->category_info->route))foreach($__Context->category_info->route as $__Context->key=>$__Context->val){;
if($__Context->val){ ?><li>&gt;<a href="<?php echo getUrl('category',$__Context->val,'document_srl','','item_srl','') ?>"><?php echo $__Context->entire_category_index[$__Context->val]->category_name ?></a></li><?php }} ?>
		</ul>
	</div>
	<div class="category-list totalcorners <?php echo $__Context->module_info->colorset ?>">
		<div id="current-category"><?php echo $__Context->parent_category_info->category_name ?></div>
		<div class="cate_list">
			<ul class="children">
				<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->no=>$__Context->val){ ?><li><a href="<?php echo getUrl('category',$__Context->val->node_id,'document_srl','','item_srl','') ?>"<?php if($__Context->category==$__Context->val->node_id){ ?> class="active"<?php } ?>><?php echo $__Context->val->category_name ?></a></li><?php } ?>
			</ul>
		</div>
	</div>
	<ul id="siblings">
		<?php if($__Context->siblings&&count($__Context->siblings))foreach($__Context->siblings as $__Context->no=>$__Context->val){ ?><li><a href="<?php echo getUrl('category',$__Context->val->node_id,'document_srl','','item_srl','') ?>"><?php echo $__Context->val->category_name ?></a></li><?php } ?>
	</ul>
</div>
