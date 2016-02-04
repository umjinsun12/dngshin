<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<div class="member_info_wrap">
	  <h3 class="p_tit"><?php echo $__Context->member_title = $__Context->lang->cmd_view_own_document  ?> <span class="tn"><?php echo number_format($__Context->total_count) ?></span></h3>
      <ul class="mblst_list">
      	<?php if(number_format($__Context->total_count) == 0){ ?>
        <li class="empty">저장된 글이 없습니다.</li>
        <?php }else{ ?>
        <?php $__Context->lst_num = $__Context->total_count;  ?>
        <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->oDocument){ ?><li id="saved_document_<?php echo $__Context->val->document_srl ?>">
        	   <span class="mblst_num"><?php echo $__Context->lst_num ?></span> 
        		<span class="mblst_date"><?php echo $__Context->oDocument->getRegdate("Y-m-d") ?></span>
        		<a class="mblst_link" href="<?php echo getUrl('','document_srl',$__Context->oDocument->document_srl) ?>" target="_blank">
        			<span class="mblst_subject"><?php echo $__Context->oDocument->getTitleText() ?> <?php if($__Context->oDocument->getCommentCount()){ ?>[<?php echo $__Context->oDocument->getCommentCount() ?>]<?php } ?>	<?php if($__Context->oDocument->getTrackbackCount()){ ?>[<?php echo $__Context->oDocument->getTrackbackCount() ?>]	<?php } ?></span>
        		</a>
        		 <?php $__Context->lst_num-- ?>
        	</li><?php } ?>
        	<?php } ?>
      </ul>
     <div class="mb_paging">
       <a href="<?php if($__Context->page==1 || !$__Context->page){ ?>#none<?php }else{;
echo getUrl('page',$__Context->page-1,'module_srl','');
} ?>" class="btn_page btn_prev"><span class="img_arrow ico_prev">이전</span></a>
             <span class="blind">현재페이지</span><span class="num_page"><?php echo $__Context->page ?></span> <span class="txt_bar">/</span> <?php echo $__Context->total_page ?>
        <a href="<?php if($__Context->page==$__Context->page_navigation->last_page || $__Context->total_page == 1){ ?>#none<?php }else{;
echo getUrl('page',$__Context->page+1,'module_srl','');
} ?>" class="btn_page btn_next"><span class="img_arrow ico_next">다음</span></a>
     </div>
</div>
