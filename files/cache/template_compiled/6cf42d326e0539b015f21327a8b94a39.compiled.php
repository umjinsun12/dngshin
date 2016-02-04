<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/mobileex/tpl/js/mobileex_admin.js--><?php $__tmp=array('modules/mobileex/tpl/js/mobileex_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->xe_ver == 7){ ?>
<!--#Meta:modules/mobileex/tpl/css/before_admin_css.css--><?php $__tmp=array('modules/mobileex/tpl/css/before_admin_css.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>
         <?php echo $__Context->lang->mobileex ?> <span class="gray"><?php echo $__Context->lang->cmd_management ?></span>
	</h1>
</div>
<ul class="x_nav x_nav-tabs">
        <li <?php if($__Context->act=='dispMobileexAdminConfig'){ ?>class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispMobileexAdminConfig') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li>
        <li <?php if($__Context->act=='dispMobileexAdminModuleList'){ ?>class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispMobileexAdminModuleList') ?>"><?php echo $__Context->lang->cmd_each_config ?> <?php echo $__Context->lang->item_module ?></a></li>
        <?php if($__Context->act=='dispMobileexAdminEachConfig' && $__Context->module_srl){ ?><li class="x_active"><a href="<?php echo getUrl('act','dispMobileexAdminEachConfig') ?>"><?php echo $__Context->module_info->browser_title;
echo $__Context->lang->cmd_each_config ?></a></li><?php } ?>
        <?php if($__Context->act=='dispMobileexAdminMobileSkinInfo' && $__Context->module_srl){ ?><li class="x_active"><a href="<?php echo getUrl('act','dispMobileexAdminMobileSkinInfo') ?>"><?php echo $__Context->module_info->browser_title ?> 모바일스킨설정</a></li><?php } ?>
</ul>
<?php }else{ ?>
<h3 class="xeAdmin"><?php echo $__Context->lang->mobileex ?> <span class="gray"><?php echo $__Context->lang->cmd_management ?></span></h3>
<div class="header4 gap1">
    <ul class="localNavigation">
        <li <?php if($__Context->act=='dispMobileexAdminConfig'){ ?>class="on"<?php } ?>><a href="<?php echo getUrl('act','dispMobileexAdminConfig') ?>"><?php echo $__Context->lang->cmd_setup ?></a></li>
        <li <?php if($__Context->act=='dispMobileexAdminModuleList'){ ?>class="on"<?php } ?>><a href="<?php echo getUrl('act','dispMobileexAdminModuleList') ?>"><?php echo $__Context->lang->cmd_each_config ?> <?php echo $__Context->lang->item_module ?></a></li>
        <?php if($__Context->act=='dispMobileexAdminEachConfig' && $__Context->module_srl){ ?><li class="on"><a href="<?php echo getUrl('act','dispMobileexAdminEachConfig') ?>"><?php echo $__Context->module_info->browser_title;
echo $__Context->lang->cmd_each_config ?></a></li><?php } ?>
        <?php if($__Context->act=='dispMobileexAdminMobileSkinInfo' && $__Context->module_srl){ ?><li class="on"><a href="<?php echo getUrl('act','dispMobileexAdminMobileSkinInfo') ?>"><?php echo $__Context->module_info->browser_title ?> 모바일스킨설정</a></li><?php } ?>
    </ul>
</div>
<?php } ?>
