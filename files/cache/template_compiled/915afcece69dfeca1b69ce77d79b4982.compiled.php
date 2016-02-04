<?php if(!defined("__XE__"))exit;?>
<div style="position:relative;">
<?php if($__Context->module_info->order_type=='desc'){ ?>
	<?php $__Context->position=($__Context->module_info->start_num)-($__Context->module_info->list_count*($__Context->oAttendance->page-1)) ?>
<?php }else{ ?>
	<?php $__Context->position=1+($__Context->oAttendance->page-1)*$__Context->module_info->list_count ?>
<?php } ?>
<div class="sat">
<table class="table table-condensed  table-striped">
	<thead>
		<tr >
			<th scope="col" style="width:40px;text-align:center"><?php echo $__Context->lang->position ?></th>
			<th scope="col" style="width:65px;text-align:center"><?php echo $__Context->lang->time ?></th>
			<th scope="col" style="text-align:center"><?php echo $__Context->lang->greetings ?></th>
			<th scope="col" style="width:130px;text-align:center"><?php echo $__Context->lang->nick_name ?></th>
			<th scope="col" style="width:45px;text-align:center"><?php echo $__Context->lang->point ?></th>
			<?php if($__Context->cd->about_random == 'yes'){ ?><th scope="col" style="width:100px;text-align:center"><span>랜덤 <?php echo $__Context->lang->point ?></span></th><?php } ?>
			<th scope="col" style="width:60px;text-align:right;"><?php echo $__Context->lang->attendance_perfect ?></th>
			<th scope="col" style="width:70px;text-align:right;"><span><?php echo $__Context->lang->view_total_day ?></span></th>
			<?php if($__Context->module_info->display_ip_address != 'N'){ ?>
			<th scope="col" style="text-align:right;"><?php echo $__Context->lang->ipaddress ?></th>
			<?php } ?>
		</tr>
	</thead>   
	<tbody>
	<?php if($__Context->oAttendanceAdminModel->getTodayTotalCount($__Context->selected_date)==0){ ?>
	<td colspan="8" class="no_checked"><?php echo $__Context->lang->attend_no_checked ?></td></tr>
	<?php }else{ ?>
	
	
	<?php if($__Context->oAttendance->data&&count($__Context->oAttendance->data))foreach($__Context->oAttendance->data as $__Context->data){ ?>
		<?php  $__Context->is_perfect = $__Context->oAttendanceModel->isPerfect($__Context->data->member_srl, $__Context->selected_date) ?>
		<?php  $__Context->weekly = $__Context->oAttendanceModel->getWeeklyData($__Context->data->member_srl, $__Context->week) ?>
		<?php  $__Context->member = $__Context->oMemberModel->getMemberInfoByMemberSrl($__Context->data->member_srl) ?>
			<?php if(preg_match("/^#[0-9]+$/",$__Context->data->greetings)){ ?>
				<?php $__Context->length_greetings = strlen($__Context->data->greetings) -1 ?>
				<?php $__Context->oDocument = $__Context->oDocumentModel->getDocument(substr($__Context->data->greetings,1,$__Context->length_greetings)) ?>
				<?php if($__Context->oDocument->document_srl){ ?>
					<?php $__Context->exist_document = 1 ?>
				<?php }else{ ?>
					<?php $__Context->exist_document = 0 ?>
				<?php } ?>
			<?php }else{ ?>
				<?php $__Context->exist_document = 0 ?>
			<?php } ?>
			
			<tr <?php if($__Context->data->member_srl == $__Context->logged_info->member_srl){ ?>class="success"<?php } ?>>
				<td style="text-align:center">
				<?php if($__Context->position == 1){ ?><img src="/modules/attendance/skins/default/css/rank1.png" />
				<?php }elseif($__Context->position == 2){ ?><img src="/modules/attendance/skins/default/css/rank2.png" />
				<?php }elseif($__Context->position == 3){ ?><img src="/modules/attendance/skins/default/css/rank3.png" />
				<?php }else{;
echo $__Context->position;
} ?></td>
				<td style="text-align:center">
				<?php echo substr($__Context->data->regdate,8,2).":".substr($__Context->data->regdate,10,2).":".substr($__Context->data->regdate,12,2) ?></td>
				<td class="span4">
				
					<?php if($__Context->data->greetings){ ?>
						<?php if($__Context->exist_document == 1){ ?>
							<?php echo cut_str($__Context->oDocument->getContentText(text),$__Context->module_info->greetings_cut_size,'...') ?>
						<?php }else{ ?>
							<?php $__Context->greetings_filtering = str_replace('<','&lt;',$__Context->data->greetings) ?>
							<?php if($__Context->data->greetings!='^admin_checked^' && $__Context->data->greetings!='^auto^'){;
echo cut_str($__Context->greetings_filtering, $__Context->module_info->greetings_cut_size, '...') ?>
							<?php }elseif($__Context->data->greetings=='^admin_checked^'){;
echo $__Context->lang->attendance_admin_checked ?>
							<?php }elseif($__Context->data->greetings=='^auto^'){;
echo $__Context->lang->attend_auto_check ?>
							<?php }else{;
echo $__Context->lang->default_greetings ?>
							<?php } ?>
						<?php } ?>
					<?php }else{ ?>
						<?php echo $__Context->lang->attend_no_greetings ?>
					<?php } ?></td>
				<td style="text-align:center">
					<span><a href="#popup_menu_area" class="member_<?php echo $__Context->member->member_srl ?>" onclick="return false"><b><?php echo $__Context->member->nick_name ?></b></a></span>
				</td>
				<td style="text-align:center">
				<?php if($__Context->logged_info->is_admin=="Y" && $__Context->grant->manager == 1){ ?>
					<a href="<?php echo getUrl('act','dispAttendanceAdminModifyAttendance','mid','attendance','attendance_srl',$__Context->data->attendance_srl,'selected_date',$__Context->selected_date) ?>"><?php echo $__Context->data->today_point ?></a>
				<?php }else{ ?>
					<?php echo $__Context->data->today_point ?>
				<?php } ?></td>
				<?php if($__Context->cd->about_random == 'yes'){ ?><td style="text-align:center" class="randomdata">
					<span<?php if($__Context->data->att_random_set=='1'){ ?> class="cri"<?php } ?>>
					<?php if($__Context->data->today_random=='0'){ ?>꽝<?php } ?>
					<?php if($__Context->data->today_random>='1'){;
if($__Context->data->att_random_set=='1'){ ?><i class="fa fa-certificate"></i><?php } ?> <?php echo $__Context->data->today_random;
} ?>
					</span>
				</td><?php } ?>
				<td <?php if($__Context->weekly->weekly != 7 && $__Context->selected_date != $__Context->week->sunday1 && !$__Context->is_perfect->monthly_perfect && !$__Context->is_perfect->yearly_perfect){ ?>style="text-align:right"<?php }else{ ?>style="text-align:center" <?php } ?>>
				<?php if($__Context->weekly->weekly == 7 && $__Context->selected_date == $__Context->week->sunday1){ ?>
				<span class="label label-info"><?php echo $__Context->lang->attendance_perfect ?></span>
				<?php }elseif($__Context->is_perfect->monthly_perfect){ ?>
				<span class="label label-success"><?php echo $__Context->lang->attendance_perfect ?></span>
				<?php }elseif($__Context->is_perfect->yearly_perfect){ ?>
				<span class="label label-warning"><?php echo $__Context->lang->attendance_perfect ?></span>
				<?php }else{ ?>
				<?php  
					$__Context->oAttendanceModel = &getModel('attendance');
					$__Context->total_info = $__Context->oAttendanceModel->getTotalData($__Context->member->member_srl);
					$__Context->perfect_de = $__Context->selected_date - date("Ymd");
					$__Context->perfect_dec = $__Context->total_info->continuity + $__Context->perfect_de;
				 ?>
				<?php if($__Context->perfect_dec > 0){ ?>
				&nbsp;<?php echo $__Context->perfect_dec ?> 일째
				<?php }else{ ?>
				0 일째
				<?php } ?>
				<?php } ?>
				</td>
				<td style="text-align:right">
				<?php echo number_format($__Context->oAttendanceModel->getTotalAttendance($__Context->member->member_srl)) ?>  일
				</td>
				<?php if($__Context->module_info->display_ip_address != 'N'){ ?>
				<td class="ip" style="text-align:left;">
					<?php if($__Context->data->ipaddress == 'none'){;
echo $__Context->data->ipaddress ?>
					<?php }elseif(!$__Context->data->ipaddress){;
echo $__Context->lang->attend_warn_ip ?>
					<?php }else{ ?>
						<?php if($__Context->data->member_srl == $__Context->logged_info->member_srl || $__Context->logged_info->is_admin =='Y'){;
echo $__Context->data->ipaddress ?>
						<?php }else{ ?>
							<?php $__Context->ip_tmp = explode('.',$__Context->data->ipaddress) ?>
							<?php $__Context->i=0;
if($__Context->ip_tmp&&count($__Context->ip_tmp))foreach($__Context->ip_tmp as $__Context->ip){;
if($__Context->i==0 || $__Context->i==1){;
$__Context->i++ ?>*.<?php }elseif($__Context->i==2){;
$__Context->i++;
echo $__Context->ip ?>.<?php }else{;
$__Context->i++;
echo $__Context->ip;
};
} ?>
						<?php } ?>
					<?php } ?></td>
				<?php } ?>
			</tr>
			
			<?php if($__Context->module_info->order_type=='desc'){;
$__Context->position--;
}else{;
$__Context->position++;
} ?>
	<?php } ?>      
	<?php } ?></tbody></table></div>   
	<?php if(!$__Context->oAttendanceAdminModel->getTodayTotalCount($__Context->selected_date)==0){ ?>
	
		<div style="position:relative; width:100%; padding:0; text-align:center" class="sat">       
			
			<div class="pagination">
			
			<ul>
			<li><a href="<?php echo getUrl('page',$__Context->oAttendance->page_navigation->first_page,'module_srl','') ?>">&laquo;</a></li>
			<?php while($__Context->page_no = $__Context->oAttendance->page_navigation->getNextPage()){ ?>
			<li<?php if($__Context->oAttendance->page == $__Context->page_no){ ?> class="active"<?php } ?>><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a></li>
			<?php } ?>
			<li><a href="<?php echo getUrl('page',$__Context->oAttendance->page_navigation->last_page,'module_srl','') ?>">&raquo;</a></li>
			</ul>
	
			
			</div>
		</div>
	<?php } ?>
</div>