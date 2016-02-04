<?php if(!defined("__XE__"))exit;
if(!$__Context->module){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/tpl','header.html') ?>
<?php } ?>
<?php echo $__Context->grant_content ?>
