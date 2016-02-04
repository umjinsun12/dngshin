<?php if(!defined("__XE__"))exit;
if($__Context->module_info->display_mobile_title != 'hide'){ ?><h1><?php echo $__Context->oDocument->getTitle() ?></h1><?php } ?>
<?php echo $__Context->oDocument->getContent($__Context->module_info->display_popupmenu != 'hide') ?>
