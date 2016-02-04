<?php if(!defined("__XE__"))exit;
echo $__Context->page_content ?>
<?php if($__Context->grant->manager){ ?>
    <!--#Meta:modules/page/tpl/js/page_admin.js--><?php $__tmp=array('modules/page/tpl/js/page_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
    <div class="btnArea">
		<p class="etc"><?php echo $__Context->lang->about_mcontent ?></p>
		<span class="btn-group">
			<button class="btn" type="button" onclick="doRemoveWidgetCache(<?php echo $__Context->module_info->module_srl ?>); return false;"><?php echo $__Context->lang->cmd_remake_cache ?></button>
			<?php if($__Context->logged_info->is_admin=='Y'){ ?>
			<a class="btn" href="<?php echo getUrl('act','dispPageAdminInfo','module_srl',$__Context->module_info->module_srl) ?>"><?php echo $__Context->lang->cmd_setup ?></a>
			<?php } ?>
			<a class="btn" href="<?php echo getUrl('act','dispPageAdminMobileContentModify','document_srl','') ?>"><?php echo $__Context->lang->cmd_page_modify ?></a>
			<a class="btn" href="<?php echo getUrl('act','','module_srl',$__Context->module_info->module_srl) ?>">PC</a>
		</span>
    </div>
<?php } ?>
