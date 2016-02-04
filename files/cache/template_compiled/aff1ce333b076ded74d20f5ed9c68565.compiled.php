<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
    <div class="mbtab_box">
        <ul class="mbtab_menu">
            <li<?php if(!$__Context->message_type || $__Context->message_type == 'R'){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('message_srl','','message_type','R') ?>" class="link_tab">받은 견적 요청</a></li>
            <li<?php if($__Context->message_type == 'S'){ ?> class="on"<?php } ?>><a href="<?php echo getUrl('message_srl','','message_type','S') ?>" class="link_tab">보낸 견적 요청</a></li><!-- 선택된 탭인경우 em으로 변경 -->
        </ul>
    </div>
<?php if($__Context->message_type == 'S'){ ?>
<?php  $__Context->msg_name = '보낸 견적';  ?>
<?php }elseif($__Context->message_type == 'T'){ ?>
<?php  $__Context->msg_name = '보관된 견적';  ?>
<?php }else{ ?>
<?php  $__Context->msg_name = '받은 견적';  ?>
<?php } ?>
<div class="member_info_wrap">
	  <h3 class="p_tit"><?php echo $__Context->msg_name ?>함&nbsp;<span class="tn"><?php echo number_format($__Context->total_count) ?></span></h3>
     <form action="./" method="get" onsubmit="return procFilter(this, delete_checked_message)" id="fo_message_list"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
     <input type="hidden" name="message_type" value="<?php echo $__Context->message_type ?>" />
      <ul class="mblst_list">
      	<?php if(number_format($__Context->total_count) == 0){ ?>
        <li class="empty"><?php echo $__Context->msg_name ?>이 없습니다.</li>
        <?php }else{ ?>
        <?php $__Context->lst_num = 1;  ?>
        <?php if($__Context->message_list&&count($__Context->message_list))foreach($__Context->message_list as $__Context->no => $__Context->val){ ?>
        <li<?php if($__Context->val->readed !='Y'){ ?> class="new"<?php } ?>>
        	   <span class="mblst_num"><?php echo $__Context->lst_num ?></span> 
        		<span class="mblst_date"><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></span>
        		<a class="mblst_link" href="<?php echo getUrl('act','dispMobileexMessageView','message_srl',$__Context->val->message_srl,'message_type','') ?>">
        			<span class="mblst_username"><?php echo $__Context->val->nick_name ?></span><?php if($__Context->val->readed=="Y"){ ?><span class="mblst_read_date"><?php echo zdate($__Context->val->readed_date,"Y-m-d H:i:s") ?> [읽음]</span><?php } ?>
        			<span class="mblst_subject"><?php echo $__Context->val->title ?></span>
        		</a>
        		<button type="button" class="mblst_delete" onclick="doDeleteMessages(<?php echo $__Context->val->message_srl ?>,'<?php echo $__Context->lang->confirm_delete ?>');"><?php echo $__Context->lang->cmd_delete ?></button>
        	</li>
        	<?php $__Context->lst_num++ ?>
        <?php } ?>
        	<?php } ?>
      </ul>
    </form>
     <div class="mb_paging">
       <a href="<?php if($__Context->page==1 || !$__Context->page){ ?>#none<?php }else{;
echo getUrl('page',$__Context->page-1,'module_srl','');
} ?>" class="btn_page btn_prev"><span class="img_arrow ico_prev"><?php echo $__Context->lang->cmd_prev ?></span></a>
             <span class="blind">현재페이지</span><span class="num_page"><?php echo $__Context->page ?></span> <span class="txt_bar">/</span> <?php echo $__Context->total_page ?>
        <a href="<?php if($__Context->page==$__Context->page_navigation->last_page || $__Context->total_page == 1){ ?>#none<?php }else{;
echo getUrl('page',$__Context->page+1,'module_srl','');
} ?>" class="btn_page btn_next"><span class="img_arrow ico_next"><?php echo $__Context->lang->cmd_next ?></span></a>
     </div>
</div>
