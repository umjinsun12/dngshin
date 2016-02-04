<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/attendance/skins/default/filter','fix_attendance_data.xml');$__xmlFilter->compile(); ?>
<form action="./" method="post" onsubmit="return procFilter(this, fix_attendance_data);" id="fixAttendanceData"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<input type="hidden" name="selected_date" value="" />
<input type="hidden" name="member_srl" value ="" />
<input type="hidden" name="count" value ="" />
</form>
<table cellspacing="0" class="listTable" width="100%">
	<?php $__Context->_day=1 ?>
	<?php $__Context->j=0 ?>
	<?php while($__Context->_day <= $__Context->admin_date_info->day_max){ ?>
		<?php if($__Context->j%40 == 0){ ?><tr><?php } ?>
		<?php while($__Context->j <= $__Context->admin_date_info->week_start){;
$__Context->j++;
} ?>
			<td height="35px;" <?php if(sprintf('%04d%02d%02d',$__Context->admin_date_info->_year,$__Context->admin_date_info->_month,$__Context->_day) > date('Ymd')){ ?>class="stamp1"<?php }else{ ?>class="stamp"<?php } ?> >
				<?php $__Context->check_date = sprintf("%s%s%02d",$__Context->admin_date_info->_year,$__Context->admin_date_info->_month,$__Context->_day) ?>
				<?php $__Context->checked = $__Context->oAttendanceModel->getIsCheckedA($__Context->logged_info->member_srl, $__Context->check_date) ?>
				<?php if($__Context->checked == 1 && $__Context->is_logged){ ?>
					<?php if($__Context->logged_info->is_admin=='Y' || $__Context->checked == 1 && $__Context->is_logged){ ?>
						<a href="<?php echo getUrl('document_srl','','selected_date',zDate(date('YmdHis',mktime(0,0,0,$__Context->admin_date_info->_month, $__Context->_day, $__Context->admin_date_info->_year)),'Ymd')) ?>">
					<?php } ?>
					<span<?php if($__Context->j%7==1){ ?> class="sunday"<?php };
if($__Context->j%7==0){ ?> class="saturday"<?php } ?>>
						<?php if(sprintf("%04d%02d%02d",$__Context->admin_date_info->_year,$__Context->admin_date_info->_month,$__Context->_day) == date("Ymd")){ ?>
							<span style="background:#000; color:#fff;">
								<?php echo $__Context->_day++ ?>
							</span>
						<?php }else{ ?>
							<?php echo $__Context->_day++ ?>
						<?php } ?>
					</span>
					<?php if($__Context->logged_info->is_admin=='Y' || $__Context->checked == 1 && $__Context->is_logged){ ?>
						</a>
					<?php } ?>
					<span class="check" style="width:100%; text-align:center; position:relative; margin-bottom:-10px; padding:0; padding-top:5px; display:block;">
						<img src="/modules/attendance/skins/default/css/check.gif" alt="" />
					</span>
				<?php }elseif($__Context->checked >= 2){ ?>
					<span <?php if($__Context->j%7==1){ ?>class="sunday"<?php }elseif($__Context->j%7==0){ ?>class="saturday"<?php } ?> >
					<?php if(sprintf("%04d%02d%02d",$__Context->admin_date_info->_year,$__Context->admin_date_info->_month,$__Context->_day) == date("Ymd")){ ?><span style="background:#F66; color:#fff;"><?php echo $__Context->_day++ ?></span><?php }else{;
echo $__Context->_day++;
} ?></span>
				<?php }else{ ?>
					<?php if($__Context->logged_info->is_admin=='Y' || $__Context->checked == 1 && $__Context->is_logged){ ?>
						<a href="<?php echo getUrl('document_srl','','selected_date',zDate(date('YmdHis',mktime(0,0,0,$__Context->admin_date_info->_month, $__Context->_day, $__Context->admin_date_info->_year)),'Ymd')) ?>">
					<?php } ?>
					<span<?php if($__Context->j%7==1){ ?> class="sunday"<?php };
if($__Context->j%7==0){ ?> class="saturday"<?php } ?>>
						<?php if(sprintf("%04d%02d%02d",$__Context->admin_date_info->_year,$__Context->admin_date_info->_month,$__Context->_day) == date("Ymd")){ ?>
							<span style="background:#F66; color:#fff;"><?php echo $__Context->_day++ ?></span>
							<?php if($__Context->oAttendanceModel->getIsChecked($__Context->logged_info->member_srl) == 0 && $__Context->is_available == 0 ){ ?>
								<div style="width:100%;text-align:center; position:relative; margin:0; margin-bottom:-10px; padding:0; padding-top:5px;">
									<img src="/modules/attendance/skins/default/css/day.gif" alt="" />
								</div>
							<?php } ?>
						<?php }else{ ?>
							<?php echo $__Context->_day++ ?>
						<?php } ?>
					</span>
					<?php if($__Context->logged_info->is_admin=='Y' || $__Context->checked == 1 && $__Context->is_logged){ ?>
						</a>
					<?php } ?>
				<?php } ?>
			</td>
		<?php if($__Context->_day-1 == $__Context->admin_date_info->day_max){;
while($__Context->j %40 < 7){;
$__Context->j++;
};
} ?>
		<?php if($__Context->j % 40 == 0){ ?>
		</tr>
		<?php } ?>
		<?php $__Context->j++ ?>
	<?php } ?>
</table>
<div class="cal_info">
	<table border="0" cellpadding="0" cellspacing="0" >
		<tr>
			<td>
				<span class="c1">결석</span>
				<span class="c2">출석</span>
				<span class="c3"><?php echo $__Context->lang->attend_absence ?></span>
			</td>
			<td width="100%">
				<span style="color:#999; float:right">* 이전달은 가입일까지 열람이 가능합니다.</span>
			</td>
		</tr>
	</table>
</div>
