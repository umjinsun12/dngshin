<?php if(!defined("__XE__"))exit;
$__Context->list_config_e = array();
 ?>
<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->key => $__Context->val){ ?>
<?php if($__Context->val->idx != -1){ ?>
<?php 
$__Context->list_config_e[$__Context->val->idx]=$__Context->val->name;
 ?>
<?php } ?>
<?php } ?>
<div class="hx h2">
	<h2><a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid) ?>"><?php echo $__Context->mex_info->board_title ?></a> <em>[<?php echo number_format($__Context->total_count) ?>]</em></h2>
	<?php if($__Context->module_info->use_category == "Y"){ ?><a href="<?php echo getUrl('page','','act','dispBoardCategory','') ?>" class="ca"><?php echo $__Context->lang->category ?></a><?php } ?>
	<a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>" class="write"><?php echo $__Context->lang->cmd_write ?></a>
</div>
<?php if($__Context->mex_info->list_style == 'webzine'){ ?>
  <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_style_webzine.html') ?>
<?php }elseif($__Context->mex_info->list_style == 'gallery'){ ?>
  <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_style_gallery.html') ?>
<?php }else{ ?>
  <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_style_list.html') ?>
<?php } ?>
<div class="pn">
	<?php if($__Context->page != 1){ ?>
	<a href="<?php echo getUrl('page',$__Context->page-1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prev"><?php echo $__Context->lang->cmd_prev ?></a> 
	<?php } ?>
	<strong><?php echo $__Context->page ?> / <?php echo $__Context->page_navigation->last_page ?></strong>
	<?php if($__Context->page != $__Context->page_navigation->last_page){ ?>
	<a href="<?php echo getUrl('page',$__Context->page+1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="next"><?php echo $__Context->lang->cmd_next ?></a>
	<?php } ?>
</div>
<div class="sh">
	<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
		<select name="search_target">
			<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
			<option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
			<?php } ?>
		</select>
		<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" accesskey="S" title="<?php echo $__Context->lang->cmd_search ?>" />
		<button type="submit" class="shbn" title="<?php echo $__Context->lang->cmd_search ?>"></button>
	</form>
</div>
