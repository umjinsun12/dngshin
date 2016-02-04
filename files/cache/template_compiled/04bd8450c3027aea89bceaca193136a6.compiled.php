<?php if(!defined("__XE__"))exit;
$__Context->wi = $__Context->widget_info; 
	$__Context->t_date = date(Ymd);
 ?>
<!--#Meta:widgets/flatContent/skins/default/css/widget.css--><?php $__tmp=array('widgets/flatContent/skins/default/css/widget.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:widgets/flatContent/skins/default/css/wRetina.css--><?php $__tmp=array('widgets/flatContent/skins/default/css/wRetina.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:widgets/flatContent/skins/default/js/swiper.js--><?php $__tmp=array('widgets/flatContent/skins/default/js/swiper.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:widgets/flatContent/skins/default/js/widget.js--><?php $__tmp=array('widgets/flatContent/skins/default/js/widget.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->wi->list_type == "imageNews"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','imageNews.html') ?>
<?php }elseif($__Context->wi->list_type == "webzine"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','webzine.html') ?>
<?php }elseif($__Context->wi->list_type == "gallery"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','gallery.html') ?>
<?php }elseif($__Context->wi->list_type == "ranking"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','ranking.html') ?>
<?php }elseif($__Context->wi->list_type == "comment"){ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','comment.html') ?>
<?php }else{ ?>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','news.html') ?>
<?php } ?>