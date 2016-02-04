<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php  Context::loadLang('./modules/board/m.skins/default/lang') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_header.html') ?>
<?php if($__Context->oDocument->isExists()){ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','read.html') ?>
<?php }else{ ?>
	<?php if($__Context->mi->board_type == 'news'){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list_news.html') ?>
	<?php }elseif($__Context->mi->board_type == 'webzine'){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list_webzine.html') ?>
	<?php }elseif($__Context->mi->board_type == 'gallery'){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list_gallery.html') ?>
	<?php }elseif($__Context->mi->board_type == 'blogBox'){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list_blogBox.html') ?>
	<?php }elseif($__Context->mi->board_type == 'talkBox'){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list_talkBox.html') ?>
	<?php }else{ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_list.html') ?>
	<?php } ?>
<?php } ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_footer.html') ?>
