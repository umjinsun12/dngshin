<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/androidpushapp/tpl/js/push_admin_list.js--><?php $__tmp=array('modules/androidpushapp/tpl/js/push_admin_list.js','body','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/androidpushapp/tpl','header.html') ?>
<section class="section">
<form action="" class="form" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<h1 class="h1">등록 기기 목록</h1>
	
		<div class="table even">		
			<div class="cnb">				
				<a href="<?php echo getUrl('filter_type', '', 'page', '', 'search_word', '', 'search_target', '') ?>"<?php if($__Context->filter_type==''){ ?> class="active"<?php } ?>>전체</a>
				|
				<a href="<?php echo getUrl('filter_type', 'sync_member', 'page', '', 'search_keyword', '', 'search_target', '') ?>"<?php if($__Context->filter_type==super_admin){ ?> class="active"<?php } ?>><?php echo $__Context->lang->sync_member ?></a>
				|
				<a href="<?php echo getUrl('filter_type', 'not_sync_member', 'page', '', 'search_keyword', '', 'search_target', '') ?>"<?php if($__Context->filter_type==enable){ ?> class="active"<?php } ?>><?php echo $__Context->lang->not_sync_member ?></a><?php if($__Context->group_list&&count($__Context->group_list))foreach($__Context->group_list as $__Context->key => $__Context->val){ ?>
				|
				<a href="<?php echo getUrl('filter_type', 'member_group', 'g_srl',$__Context->val->group_srl,'page', '', 'search_keyword', '', 'search_target', '') ?>"<?php if($__Context->filter_type==enable){ ?> class="active"<?php } ?>><?php echo $__Context->val->title ?></a><?php } ?>
		
			</div>
			<?php if(!$__Context->androidpushapp_regid){ ?><p class="x_well x_well-small">결과값이 없습니다.</p><?php } ?>
			
			<?php if($__Context->androidpushapp_regid){ ?>
			<table width="100%" border="1" cellspacing="0" id="memberList" class="_memberList">
				<caption>
				<?php echo $__Context->filter_type_title ?>(<?php echo $__Context->total_count_list ?>)
					<span class="side">					
						<span class="btn"><a href="#listManager" data-value="send" class="modalAnchor _member x_btn"><?php echo $__Context->lang->selected_manage ?>...</a></span>
					</span>
				</caption>
				<thead>
					<tr>
						<th scope="col" class="nowr">웹뷰/웹브라우저</th>
						<th scope="col" class="nowr">Reg_id</th>
						<th scope="col" class="nowr">이름</th>
						<th scope="col" class="nowr">닉네임</th>
						<th scope="col" class="nowr">알림설정</th>
						<th scope="col" class="nowr">email</th>										
						<th scope="col" class="nowr">등록날짜</th>
						<th scope="col" class="nowr">최근앱사용날짜</th>
						<th scope="col">
							<input type="checkbox" title="Check All" data-name="user" />
						</th>
										
					</tr>
				</thead>
				<tbody>
					<?php if($__Context->androidpushapp_regid&&count($__Context->androidpushapp_regid))foreach($__Context->androidpushapp_regid as $__Context->no => $__Context->val){ ?>
					<?php 
						$__Context->oMemberModel = getModel('member');
						$__Context->member_info = $__Context->oMemberModel->getMemberInfoByMemberSrl($__Context->val->member_srl);
						$__Context->reg_id_cut = cut_str($__Context->val->reg_id, 20)."...";
						if($__Context->val->sort == 'W') $__Context->string_sort = "웹뷰";
						if($__Context->val->sort == 'B') $__Context->string_sort = "웹브라우저";
					 ?>
					<tr>
						<td class="nowr"><?php echo $__Context->string_sort ?></td>
						<td class="nowr"><?php echo $__Context->reg_id_cut ?></td>
						<td class="nowr"><?php echo $__Context->member_info->user_name ?></td>
						<td class="nowr"><?php echo $__Context->member_info->nick_name ?></td>
						<td class="nowr"><?php echo $__Context->val->setting ?></td>
						<td class="nowr">						
							<span class="masked"><?php echo getEncodeEmailAddress($__Context->member_info->email_address) ?></span>
						</td>
						<td class="nowr"><?php echo zdate($__Context->val->regdate, 'Y-m-d') ?></td>
						<td class="nowr"><?php echo zdate($__Context->val->last_login, 'Y-m-d') ?></td>
						<td><input type="checkbox" name="user" value='<?php echo $__Context->val->reg_id."\t".$__Context->val->sort."\t".$__Context->member_info->user_name."\t".$__Context->member_info->nick_name ?>' /></td>
						
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="btnArea">
				<span class="side">								
					<span class="btn"><a href="#listManager" data-value="send" class="modalAnchor _member x_btn"><?php echo $__Context->lang->selected_manage ?>...</a></span>			
				</span>
			</div>
		
			<div class="x_pagination">
				<ul>
					<li><a href="<?php echo getUrl('page','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a></li>
					<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
						<?php if($__Context->page == $__Context->page_no){ ?>
							<li class="x_active"><a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
						<?php }else{ ?>
							<li><a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
						<?php } ?>
					<?php } ?>
					<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page) ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a></li>
				</ul>
			</div>
		<?php } ?>
	</div>
</form>
</section>
<form action="./" method="get" class="search center x_input-append" ><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<select name="search_target" style="margin-right:4px" title="검색">
		<option value="user_name"<?php if($__Context->search_target==user_name){ ?> selected="selected"<?php } ?>>이름</option>
		<option value="user_id"<?php if($__Context->search_target==user_id){ ?> selected="selected"<?php } ?>>아이디</option>
		<option value="email_address"<?php if($__Context->search_target==email_address){ ?> selected="selected"<?php } ?>>이메일</option>
		<option value="nick_name"<?php if($__Context->search_target==nick_name){ ?> selected="selected"<?php } ?>>닉네임</option>
	</select>
	<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword, ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" style="width:140px">
	<button class="x_btn x_btn-inverse" type="submit"><?php echo $__Context->lang->cmd_search ?></button>
	<a class="x_btn" href="<?php echo getUrl('', 'module', 'admin', 'act', 'dispAndroidpushappAdminRegId', 'page', $__Context->page) ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
</form>
<?php if($__Context->androidpushapp_regid){ ?><section class="x_modal" id="listManager">
	<?php Context::addJsFile("modules/androidpushapp/ruleset/sendMessage.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./"  class="fg form" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="sendMessage" />
	<input type="hidden" name="module" value="androidpushapp" />
	<input type="hidden" name="act" value="procAndroidpushappPush" />
	<input type="hidden" name="success_return_url" value="<?php echo getUrl('act', $__Context->act) ?>" />
	<div class="x_modal-header">
			<h1>선택한 기기에 푸시 알림 보내기</h1>
		</div>
		<div class="x_modal-body">
		
		
			<table class="x_table x_table-striped x_table-hover">
				<thead>
					<tr>
						<th scope="col">이름</th>
						<th scope="col">닉네임</th>
						<th scope="col">Regid</th>						
					</tr>
				</thead>
				<tbody id="popupBody">
				</tbody>
			</table>
			<br><br><br>
		
		
			<p class="q"><label for="message">푸시 알림 보낼 메시지(짧게 써주세요.)</label></p>
			<p>
				제목 : <input type=text id="title" name="title">
			</p>
			<p>
				내용 : <textarea rows="8" cols="42" id="message" style="width:98%" name="message" ></textarea>
			</p>
			<p>
				클릭시 이동할 링크 : <input type=text id="link" name="link"> 비워두시면 홈페이지 기본화면으로 이동됩니다. 
			</p>
		</div>
		<div class="x_modal-footer">
			<button type="button" class="x_btn x_pull-left" data-hide="#listManager"><?php echo $__Context->lang->cmd_close ?></button>
			<span class="x_btn-group x_pull-right">
				<button type="submit" name="type"  onClick="Success();" class="x_btn x_btn-inverse">보내기...</button>
			</span>
		</div>		
	</form>
</section><?php } ?>
<script>
jQuery(function($){
	// Modal anchor activation
	var $memberList = $('#memberList');
	$memberList.find(':checkbox').change(function(){
		var $modalAnchor = $('a[data-value]');
		if($memberList.find('tbody :checked').length == 0){
			$modalAnchor.removeAttr('href').addClass('x_disabled');
		} else {
			$modalAnchor.attr('href','#listManager').removeClass('x_disabled');
		}
	}).change();
	// Modal anchor button action
	$('a[data-value]').click(function(){
		if($memberList.find(':checked').length != 0){
			var $this = $(this);
			var $moveTarget = $('._moveTarget');
			var thisValue = $this.attr('data-value');
			var thisText = $this.text();
			$('#listManager').find('.x_modal-header ._sub').text(thisText).end().find('[type="submit"]').val(thisValue).text(thisText);
			if(thisValue == 'delete'){
				$moveTarget.hide().next().css('borderTopWidth','0');
			} else {
				$moveTarget.show().next().css('borderTopWidth','1px');
			}
		}
	});
});
</script>
<script type="text/javascript">
function Success()
{
	alert( '푸시 알림 보내기 성공' );
}
</script>