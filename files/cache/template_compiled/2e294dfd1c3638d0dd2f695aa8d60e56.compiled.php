<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','_header.html') ?>
<!--#Meta:modules/attendance/skins/default/js/at.js--><?php $__tmp=array('modules/attendance/skins/default/js/at.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/attendance/skins/default/filter','insert_attendance.xml');$__xmlFilter->compile(); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/attendance/skins/default/filter','fix_attendance_data.xml');$__xmlFilter->compile(); ?>
<?php $__Context->year=substr($__Context->selected_date,0,4) ?>
<?php $__Context->month=substr($__Context->selected_date,4,2) ?>
<?php $__Context->day=substr($__Context->selected_date,6,2) ?>
<?php $__Context->week=$__Context->oAttendanceModel->getWeek($__Context->selected_date) ?>
<script type="text/javascript">
    var warn_msg = '<?php echo $__Context->lang->attend_warn ?>';
	function toggle(post_id)
	{   
		var obj = xGetElementById(post_id);   
    	if(!obj) return;   
    	if(obj.style.display=="block")
		{
			obj.style.display='none';
		}
		else
		{
			obj.style.display="block";
		}
	}
</script>
<div class="navi">
	<strong class="att-btn att-btn-primary"><i class="fa fa-calendar"></i> <?php echo $__Context->year ?>년 <?php echo $__Context->month ?>월 <?php echo $__Context->day ?>일</strong>
	<?php if($__Context->logged_info->is_admin=='Y'){ ?>
		<span style="margin-left:20px;">
			<?php if($__Context->module_info->display_setup_button!="N" && ($__Context->logged_info->is_admin=="Y" || $__Context->grant->manager == 1) ){ ?>
			<a class="att-btn att-btn-primary" href="<?php echo getUrl('module','','mid','attendance','document','','act','dispAttendanceAdminBoardConfig') ?>">
				<i class="fa fa-cog"></i> <?php echo $__Context->lang->cmd_setup ?>
			</a>
			<a class="att-btn att-btn-primary" href="<?php echo getUrl('act','dispAttendanceAdminBoardSkinConfig','mid','attendance') ?>" onclick="window.open(this.href);return false;" alt="<?php echo $__Context->lang->attendance_module;
echo $__Context->lang->cmd_management ?>" >
				<i class="fa fa-cog"></i> 스킨 <?php echo $__Context->lang->cmd_management ?>
			</a>
			<?php } ?>
            <?php if($__Context->logged_info->is_admin=='Y'){ ?>
			<a class="att-btn att-btn-primary" href="<?php echo getUrl('module','admin','act','dispAttendanceAdminList','mid','') ?>" onclick="window.open(this.href);return false;" alt="<?php echo $__Context->lang->attendance_module;
echo $__Context->lang->cmd_management ?>" >
				<i class="fa fa-cogs"></i> <?php echo $__Context->lang->cmd_management ?>
			</a>
            <?php } ?>
		</span>
    <?php } ?>
	<span style="float:right; margin-right:10px; font-weight:none;">
		<?php if(substr($__Context->selected_date,0,6) == zdate($__Context->logged_info->regdate,"Ym") || !$__Context->is_logged){ ?>
			<span class="att-btn att-btn-primary disabled"><font color="#CCCCCC"><i class="fa fa-angle-double-left"></i> 이전달</font></span>
		<?php }else{ ?>
			<a class="att-btn att-btn-primary" href="<?php echo getUrl('document_srl','','selected_date',zDate(date('YmdHis',mktime(0,0,0,$__Context->month-1, $__Context->day, $__Context->year)),'Ymd')) ?>" >
				<i class="fa fa-angle-double-left"></i> 이전달
			</a>
		<?php } ?>
		<a class="att-btn att-btn-primary" href="<?php echo getUrl('document_srl','','selected_date',zDate(date('YmdHis'),'Ymd')) ?>"><i class="fa fa-calendar"></i> 이번달</a>
		<?php if($__Context->selected_date == date("Ymd")  || !$__Context->is_logged){ ?>
			<span class="att-btn att-btn-primary disabled"><font color="#CCCCCC">다음달 <i class="fa fa-angle-double-right"></i></font></span>
		<?php }else{ ?>
			<a class="att-btn att-btn-primary" href="<?php echo getUrl('document_srl','','selected_date',zDate(date('YmdHis',mktime(0,0,0,$__Context->month+1, $__Context->day, $__Context->year)),'Ymd')) ?>" >
				다음달 <i class="fa fa-angle-double-right"></i>
			</a>
		<?php } ?>
	</span>
</div>
	<div class="sat" style="position:relative">
	<table width="100%" class="table table-bordered ">
		<tr>
			<th>출석점수</th>
			<td style="font-weight:bold; color:#F33; text-align:left">
				<?php if($__Context->config->add_point > 0){ ?>
					<?php echo $__Context->config->add_point ?>
				<?php }elseif($__Context->config->add_point == 0){ ?>
					<?php echo $__Context->lang->attend_none ?>
				<?php } ?>
			</td>
			<th>개근점수</th>
			<td style="position:relative">
				<span id="rank_on" style="display:block" >
					<a href="#" onclick="toggle('rank_on'); toggle('rank_off');return false;">
						자세히보기 <i class="fa fa-caret-down"></i>
					</a>
				</span>
				<span id="rank_off" style="display:none;">
					<a href="#" onclick="toggle('rank_on'); toggle('rank_off');return false;" >
						자세히보기 <i class="fa fa-caret-up"></i>
					</a>
					<div class="popover bottom arrow">
						<div class="popover-title">개근점수</div>
						<div class="popover-content" style="width:100px">
							<span class="label label-info">
								<?php if($__Context->config->weekly_point > 0){ ?>
									<?php echo $__Context->config->weekly_point ?>
								<?php }elseif($__Context->config->weekly_point == 0){ ?>
									<?php echo $__Context->lang->attend_none ?>
								<?php } ?>
							</span>
							<span class="label label-success">
								<?php if($__Context->config->monthly_point > 0){ ?>
									<?php echo $__Context->config->monthly_point ?>
								<?php }elseif($__Context->config->monthly_point == 0){ ?>
									<?php echo $__Context->lang->attend_none ?>
								<?php } ?>
							</span>
							<span class="label label-warning">
								<?php if($__Context->config->yearly_point > 0){ ?>
									<?php echo $__Context->config->yearly_point ?>
								<?php }elseif($__Context->config->yearly_point == 0){ ?>
									<?php echo $__Context->lang->attend_none ?>
								<?php } ?>
							</span>
						</div><!-- .popover-content -->
					</div><!-- .popover -->
				</span><!-- #rank_off -->
			</td>
			<th>랭킹점수</th>
			<td style="position:relative">
			<span id="point_on" style="display:block" ><a href="#" onclick="toggle('point_on'); toggle('point_off');return false;" >자세히보기 <i class="fa fa-caret-down"></i></a></span>
			<span id="point_off" style="display:none;" ><a href="#" onclick="toggle('point_on'); toggle('point_off');return false;">자세히보기 <i class="fa fa-caret-up"></i></a>
				<div class="popover bottom arrow">
				<div class="popover-title">랭킹점수</div>
				<div class="popover-content">
			   
				<span class="label label-important"> <?php echo $__Context->lang->attendance_first_point ?> <?php if($__Context->config->first_point > 0){;
echo $__Context->config->first_point;
}elseif($__Context->config->first_point == 0){ ?> <?php echo $__Context->lang->attend_none;
} ?></span>
				
				<span class="label label-inverse"><?php echo $__Context->lang->attendance_second_point ?> <?php if($__Context->config->second_point > 0){;
echo $__Context->config->second_point;
}elseif($__Context->config->second_point == 0){ ?> <?php echo $__Context->lang->attend_none;
} ?></span>
				
				<span class="label"><?php echo $__Context->lang->attendance_third_point ?> <?php if($__Context->config->third_point > 0){;
echo $__Context->config->third_point;
}elseif($__Context->config->third_point == 0){ ?> <?php echo $__Context->lang->attend_none;
} ?></span>
					</div>
				</div></span>
			</td>
			<th>출석권한</th>
			<td>
				<?php if($__Context->mi->pomis){ ?><span class="label label-success">
					<?php echo $__Context->mi->pomis ?>
				</span><?php } ?>
				<?php if(!$__Context->mi->pomis){ ?><span class="label label-success">
					로그인 사용자
				</span><?php } ?>
			</td>
		</tr>
		<tr>
			<th>출석시간</th>
			<td style="text-align:left; font-size:10px">
				<span class="<?php if($__Context->is_available == 0){ ?>label label-success <?php }else{ ?>label label-danger<?php } ?>">
					<?php if($__Context->mi->timestart){ ?>
						<?php echo $__Context->mi->timestart ?>
					<?php }else{ ?>
						00:00:00
					<?php } ?>
					~
					<?php if($__Context->mi->timeend){ ?>
						<?php echo $__Context->mi->timeend ?>
					<?php }else{ ?>
						24:00:00
					<?php } ?>
				</span>
			</td>
			<th>진행상태</th>
			<td>
				<?php if($__Context->is_available == 0){ ?>
					<span class="label label-success">
						출석가능
					</span>
				<?php }else{ ?>
					<span class="label label-warning">
						불가능
					</span>
				<?php } ?>
			</td>
			<th>출석여부</th>
			<td>
				<?php if(!$__Context->is_logged){ ?>
					<span class="label label-danger">
						비로그인
					</span>
				<?php }elseif($__Context->oAttendanceModel->getIsChecked($__Context->logged_info->member_srl)==0){ ?>
					<span class="label label-warning">
						출첵안함
					</span>
				<?php }elseif($__Context->oAttendanceModel->getIsChecked($__Context->logged_info->member_srl)==1){ ?>
					<span class="label label-success">
						출첵완료
					</span>
				<?php } ?>
			</td>
			<th>개근분류</th>
			<td style="position:relative">
				<span id="point_7" style="display:block">
					<a href="#" onclick="toggle('point_7'); toggle('point_8');return false;" >
						자세히보기<i class="fa fa-caret-down"></i>
					</a>
				</span>
				<span id="point_8" style="display:none;">
					<a href="#" onclick="toggle('point_7'); toggle('point_8');return false;" >
						자세히보기 <i class="fa fa-caret-up"></i>
					</a>
					<div class="popover bottom arrow">
						<div class="popover-title">개근분류</div>
						<div class="popover-content">
							<span class="label label-info">
								<?php echo $__Context->lang->week ?>
							</span>
							<span class="label label-success">
								<?php echo $__Context->lang->monthly_perfect ?>
							</span>
							<span class="label label-warning">
								<?php echo $__Context->lang->yearly_perfect ?>
							</span>
							<br/>
							<font color="#FF0000">
								최근만 표시
							</font>
						</div><!-- .popover-content -->
					</div><!-- .popover -->
				</span>
			</td>
		</tr>
	</table>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','list.html') ?>
<div class="sat" style="margin:10px 1px">
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID  == 'modules/attendance/skins/default/attendanceinsert'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	<?php if($__Context->is_logged){ ?>
		<?php if(!$__Context->oAttendanceModel->getIsChecked($__Context->logged_info->member_srl) == 0 && $__Context->is_available == 0 ){ ?>
			<div class="alert alert-success">
				<h4>출석이 완료되었습니다.</h4>출석은 하루 1회만 참여하실 수 있습니다. 내일 다시 출석해 주세요.^^
			</div>
			<?php if($__Context->is_logged && $__Context->todaymygift->member_srl == $__Context->logged_info->member_srl){ ?>
				<div class="alert alert-success">
					<h4>이벤트 당첨되었습니다. </h4> "<?php echo $__Context->config->giftname ?>"을 받아가세요.
					<a href="<?php echo getUrl('','mid','attendance','act','dispAttendanceBoardGiftList') ?>">받은선물확인</a>
				</div>
			<?php } ?>
		<?php } ?>
		
		<?php if($__Context->oAttendanceModel->getIsChecked($__Context->logged_info->member_srl) == 0 && $__Context->is_available == 0 ){ ?>
			<?php if($__Context->config->about_admin_check!='no'){ ?>
			<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','att.html') ?>
			<?php }else{ ?>
				<?php if($__Context->logged_info->is_admin != 'Y'){ ?>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','att.html') ?>
				<?php } ?> 
			<?php echo $__Context->lang->attend_banned_admin ?>
			<?php } ?>
		<?php } ?>
	<?php }elseif(!$__Context->is_logged){ ?>
		<div class="alert alert-error"><?php echo $__Context->lang->msg_not_logged ?></div>
	<?php } ?>
</div>
<?php  if(!$__Context->module_info->board_type) $__Context->module_info->board_type = 'board';  ?>
<?php if($__Context->module_info->board_type == 'board'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','board.html');
} ?>
<?php if($__Context->module_info->board_type == 'twitter'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','twitter_board.html');
} ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/skins/default','_footer.html') ?>
