<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/m.skins/default/css/btn.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/btn.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/m.skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/m.skins/default/css/itemlist.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/itemlist.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/loadcount.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/loadcount.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!-- <!--#Meta:modules/nproduct/m.skins/default/css/button.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/button.css','','','');Context::loadFile($__tmp);unset($__tmp); ?> -->
<?php if(!$__Context->module_info->list_style){ ?>
<?php $__Context->module_info->list_style='list' ?>
<?php } ?>
<?php if(!$__Context->listStyle){ ?>
<?php $__Context->listStyle=$__Context->module_info->list_style ?>
<?php } ?>
<?php $__Context->btn_color='blue' ?>
<?php if($__Context->module_info->colorset=='black'){ ?>
	<?php $__Context->btn_color='purple' ?>
<?php } ?>
<!--#Meta:modules/nproduct/m.skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/m.skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/script.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/m.skins/default','header.html') ?>
<div style="background:#ddd; padding:10px; text-align:right; font-size:12px;">
	<span style="float:left">
		<a href="<?php echo getUrl('mid',$__Context->mileage_mid) ?>" target=_blank>마일리지 : <?php echo $__Context->nmileage ?><span id="n_mileage"></span></a>
	</span>
	<?php if($__Context->logged_info){ ?><span><a href="<?php echo getUrl('mid', $__Context->module_info->ncart_mid, 'act', 'dispNcartFavoriteItems') ?>">Wish List (<span id="count_favorites_items">0</span>)</a> | </span><?php } ?>  
	<a href="<?php echo getUrl('mid', $__Context->module_info->ncart_mid) ?>"> Cart (<span id="count_cart_items">0</span>)</a>
</div>
<?php if($__Context->module_info->category_display!='N'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/m.skins/default','categorylist.html');
} ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<div id="itemlist" class="<?php echo $__Context->module_info->colorset ?>">
	<form class="list_header">
		<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
		<input type="hidden" name="error_return_url" value="" />
		<input type="hidden" name="listStyle" value="<?php echo $__Context->listStyle ?>" />
		<div class="display_list">
			<select name="disp_numb" onchange="this.form.submit();">
				<option value="1"<?php if($__Context->disp_numb=='1'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->cmd_order_lowprice ?></option>
				<option value="2"<?php if($__Context->disp_numb=='2'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->cmd_order_highprice ?></option>
				<option value="3"<?php if($__Context->disp_numb=='3'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->cmd_order_bestsell ?></option>
				<option value="4"<?php if($__Context->disp_numb=='4'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->cmd_order_review ?></option>
			</select>
			<!--
					<a href="<?php echo getUrl('sort_index','price','order_type','asc') ?>"><?php echo $__Context->lang->cmd_order_lowprice ?></a>
					<span>|</span>
					<a href="<?php echo getUrl('sort_index','price','order_type','desc') ?>"><?php echo $__Context->lang->cmd_order_highprice ?></a>
					<span>|</span>
					<a href="<?php echo getUrl('sort_index','sales_count','order_type','desc') ?>"><?php echo $__Context->lang->cmd_order_bestsell ?></a>
					<span>|</span>
					<a href="<?php echo getUrl('sort_index','review_count','order_type','desc') ?>"><?php echo $__Context->lang->cmd_order_review ?></a>
					--!>
		</div>	
		
		<ul class="display_style">
			<li><a href="<?php echo getUrl('listStyle','list') ?>"><img src="/modules/nproduct/m.skins/default/img/icon_list.gif" /></a></li>
			<li><a href="<?php echo getUrl('listStyle','grid') ?>"><img src="/modules/nproduct/m.skins/default/img/icon_grid.gif" /></a></li>
		</ul>
	</form>
	<div class="product_list">
		<?php if($__Context->listStyle=='list'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/m.skins/default','_style.list.html');
} ?>
		<?php if($__Context->listStyle=='grid'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/m.skins/default','_style.grid.html');
} ?>
	</div>
	<div class="search">
		<form action="" class="pagination" method="post"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="error_return_url" value="" />
			<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
			<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
			<?php if($__Context->order_target){ ?><input type="hidden" name="order_target" value="<?php echo $__Context->order_target ?>" /><?php } ?>
			<?php if($__Context->order_type){ ?><input type="hidden" name="order_type" value="<?php echo $__Context->order_type ?>" /><?php } ?>
			<?php if($__Context->category_srl){ ?><input type="hidden" name="category_srl" value="<?php echo $__Context->category ?>" /><?php } ?>
			<?php if($__Context->childrenList){ ?><input type="hidden" name="childrenList" value="<?php echo $__Context->childrenList ?>" /><?php } ?>
			<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
			<a href="<?php echo getUrl('page', '') ?>" class="direction">&laquo; FIRST</a>
			<?php if($__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
				<?php $__Context->isGoTo = true ?>
				<a href="<?php echo getUrl('page', '') ?>">1</a>
				<a href="#goTo" class="tgAnchor" title="<?php echo $__Context->lang->cmd_go_to_page ?>">...</a>
			<?php } ?>
			<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
				<?php $__Context->last_page = $__Context->page_no ?>
				<?php if($__Context->page_no == $__Context->page){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
				<?php if($__Context->page_no != $__Context->page){ ?><a href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
			<?php } ?>
			<?php if($__Context->last_page != $__Context->page_navigation->last_page){ ?>
				<?php $__Context->isGoTo = true ?>
				<a href="#goTo" class="tgAnchor" title="<?php echo $__Context->lang->cmd_go_to_page ?>">...</a>
				<a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>"><?php echo $__Context->page_navigation->last_page ?></a>
			<?php } ?>
			<a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" class="direction">LAST &raquo;</a>
			<?php if($__Context->isGoTo){ ?><span id="goTo" class="tgContent">
				<input name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
				<button type="submit">Go</button>
			</span><?php } ?>
		</form>
		<?php if(0){ ?><form action="" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<select name="search_target">
				<option value=""><?php echo $__Context->lang->search_target ?></option>
				<?php $__Context->lang->search_target_list = array_merge($__Context->lang->search_target_list, $__Context->usedIdentifiers) ?>
				<?php if($__Context->lang->search_target_list&&count($__Context->lang->search_target_list))foreach($__Context->lang->search_target_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->search_target==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
			</select>
			<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" />
			<input type="submit" value="<?php echo $__Context->lang->cmd_search ?>" />
			<a href="<?php echo getUrl('search_target', '', 'search_keyword', '') ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
		</form><?php } ?>
	</div><!-- 네비게이션 -->
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/m.skins/default','footer.html') ?>
