<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/attendance/tpl/css/attendance.css--><?php $__tmp=array('modules/attendance/tpl/css/attendance.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<h3 class="xeAdmin"><?php echo $__Context->lang->attendance_module ?><span class="gray"><?php echo $__Context->lang->cmd_management ?></span></h3>
<?php if($__Context->module_info){ ?>
<div class="header4">
    <?php if($__Context->module_info->mid){ ?>
    <h4 class="xeAdmin"><?php echo $__Context->module_info->mid ?> <?php if($__Context->module_info->is_default=='Y'){ ?><span class="bracket">(<?php echo $__Context->lang->is_default ?>)</span><?php } ?> <span class="vr">|</span> <a href="<?php echo getSiteUrl($__Context->module_info->domain,'','mid',$__Context->module_info->mid) ?>" onclick="window.open(this.href); return false;" class="view">View</a></h4>
    <?php } ?>
    <ul class="x_nav x_nav-tabs">
        <li<?php if($__Context->act=='dispAttendanceAdminBoardConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAttendanceAdminBoardConfig') ?>"><?php echo $__Context->lang->attend_board_config ?></a></li>
        <li<?php if($__Context->act=='dispAttendanceAdminGrantList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAttendanceAdminGrantList') ?>"><?php echo $__Context->lang->cmd_manage_grant ?></a></li>
		<li<?php if($__Context->act=='dispAttendanceAdminBoardAdditionSetup'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAttendanceAdminBoardAdditionSetup') ?>">point set</a></li>
        <li<?php if($__Context->act=='dispAttendanceAdminBoardSkinConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAttendanceAdminBoardSkinConfig') ?>"><?php echo $__Context->lang->cmd_manage_skin ?></a></li>
		<li<?php if($__Context->act=='dispAttendanceAdminMobileBoardSkinConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAttendanceAdminMobileBoardSkinConfig') ?>"><?php echo $__Context->lang->s_mobile ?> <?php echo $__Context->lang->cmd_manage_skin ?></a></li>
    </ul>
</div>
<?php } ?>
