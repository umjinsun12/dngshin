<?php if(!defined("__XE__"))exit;?><!-- load target="css/bWhite.css" / -->
<?php  
	$__Context->mi = $__Context->module_info;
	if (!$__Context->mi->duration_new) $__Context->mi->duration_new = 24;
	$__Context->t_date = date(Ymd);
 ?>
<!--#Meta:modules/board/m.skins/bupBoard/css/board.css--><?php $__tmp=array('modules/board/m.skins/bupBoard/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/bupBoard/css/bRetina.css--><?php $__tmp=array('modules/board/m.skins/bupBoard/css/bRetina.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/bupBoard/js/bCommon.js--><?php $__tmp=array('modules/board/m.skins/bupBoard/js/bCommon.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/bupBoard/js/mboard.js--><?php $__tmp=array('modules/board/m.skins/bupBoard/js/mboard.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/bupBoard/js/kakaolink.js--><?php $__tmp=array('modules/board/m.skins/bupBoard/js/kakaolink.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->mi->video == 'Y'){ ?><!--#Meta:modules/board/m.skins/bupBoard/js/video.js--><?php $__tmp=array('modules/board/m.skins/bupBoard/js/video.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
	
<section class="flatBoard">