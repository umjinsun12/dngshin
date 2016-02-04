<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_setting.html') ?>
<div class="bd">
<?php if($__Context->oDocument->isExists()){ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','read.html') ?>
<?php }else{ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_list.html') ?>
<?php } ?>
</div>
