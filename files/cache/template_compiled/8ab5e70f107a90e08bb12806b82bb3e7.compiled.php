<?php if(!defined("__XE__"))exit;?><!-- load target="css/bWhite.css" / -->
<?php  
	$__Context->mi = $__Context->module_info;
	if (!$__Context->mi->duration_new) $__Context->mi->duration_new = 24;
	$__Context->t_date = date(Ymd);
 ?>
<!--#Meta:modules/board/m.skins/gwangBoard/css/board.css--><?php $__tmp=array('modules/board/m.skins/gwangBoard/css/board.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/gwangBoard/css/bRetina.css--><?php $__tmp=array('modules/board/m.skins/gwangBoard/css/bRetina.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/gwangBoard/js/bCommon.js--><?php $__tmp=array('modules/board/m.skins/gwangBoard/js/bCommon.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/gwangBoard/js/mboard.js--><?php $__tmp=array('modules/board/m.skins/gwangBoard/js/mboard.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/gwangBoard/js/kakaolink.js--><?php $__tmp=array('modules/board/m.skins/gwangBoard/js/kakaolink.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->mi->video == 'Y'){ ?><!--#Meta:modules/board/m.skins/gwangBoard/js/video.js--><?php $__tmp=array('modules/board/m.skins/gwangBoard/js/video.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<section class="flatBoard">