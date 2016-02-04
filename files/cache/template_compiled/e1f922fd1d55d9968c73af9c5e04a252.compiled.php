<?php if(!defined("__XE__"))exit;
$__Context->mi = $__Context->module_info;
	$__Context->cd = $__Context->config;
	$__Context->lgi = $__Context->logged_info;
	$__Context->lang->yyear = '년';
	$__Context->lang->mmo = '월';
	$__Context->lang->dday = '일';
 ?>
<!--#Meta:modules/attendance/skins/default/css/gray.css--><?php $__tmp=array('modules/attendance/skins/default/css/gray.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/attendance/skins/default/css/font-awesome.css--><?php $__tmp=array('modules/attendance/skins/default/css/font-awesome.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<section class="xl">
	<ul class="nav nav-tabs">
		<li<?php if($__Context->act!='dispAttendanceBoardGiftList'){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('','mid','attendance','act','dispAttendanceBoard') ?>">출석부</a>
		</li>
		<?php if($__Context->is_logged){ ?><li<?php if($__Context->act=='dispAttendanceBoardGiftList'){ ?> class="active"<?php } ?>>
			<a href="<?php echo getUrl('','mid','attendance','act','dispAttendanceBoardGiftList') ?>">받은선물리스트</a>
		</li><?php } ?>
	</ul>
	<?php if($__Context->module_info->header_text){ ?><div class="att_header">
		<div class="att_header_title">
			<span><?php echo $__Context->module_info->header_text ?></span>
		</div>
	</div><?php } ?>
	<div class="att">
