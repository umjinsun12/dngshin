<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<?php if($__Context->message->message_type == 'S'){ ?>
<?php  
$__Context->msg_name = '보낸';
$__Context->msg_title = '보낸 견적';
 ?>
<?php }elseif($__Context->message->message_type == 'T'){ ?>
<?php  
$__Context->msg_name = '보관';
$__Context->msg_title = '보낸 견적';
 ?>
<?php }else{ ?>
<?php  
$__Context->msg_name = '받은';
$__Context->msg_title = '받은 견적';
 ?>
<?php } ?>
<div class="member_info_wrap">
	   <h3 class="p_tit"><?php echo $__Context->msg_title ?>함<span class="tn"><?php echo number_format($__Context->total_count) ?></span></h3>
     <?php if($__Context->message->sender_name){ ?><div class="mbmsg_in" style="border-top: 1px solid #CDCDCD">
     	 <dl class="msg_info">
     	 	 <dt>보낸이</dt>
     	    <dd><?php echo $__Context->message->sender_name ?></dd>
     	</dl>
     </div><?php } ?>
     <?php if($__Context->message->receiver_name){ ?><div class="mbmsg_in" style="border-top: 1px solid #CDCDCD">
     	 <dl class="msg_info">
     	 	 <dt>받은이</dt>
     	    <dd><?php echo $__Context->message->receiver_name ?></dd>
     	</dl>
     </div><?php } ?>
     <?php if(!$__Context->message->receiver_name && !$__Context->message->sender_name){ ?><div class="mbmsg_in" style="border-top: 1px solid #CDCDCD">
     	 <dl class="msg_info">
     	 	 <dt>보낸이</dt>
     	    <dd>내게 보낸 견적입니다.</dd>
     	</dl>
     </div><?php } ?>
     <div class="mbmsg_in">
     	 <dl class="msg_info">
     	 	 <dt><?php echo $__Context->msg_name ?> 시간</dt>
     	    <dd><?php echo zdate($__Context->message->regdate,"Y-m-d") ?></dd>
     	</dl>
     </div>
     <div class="mbmsg_cont">
         <?php echo $__Context->message->sender_name ?>님의 견적
         <br><br>
         
         <?php if($__Context->message->message_type != 'T'){ ?>
         <div class="pl">
         
         </div>
         <?php } ?>
     </div>
     
      <div class="btn_area2">
        <div class="pl">
        	   <a class="rbtn" href="javascript:;">이전으로</a>
        </div>
        
        <div class="pr">
              <a class="lbtn" href="<?php echo getUrl('','mid','board_zhaH13','document_srl',$__Context->message->content,'dgi_way',2) ?>">견적서로 이동하기</a>	  	
        	  <a class="rbtn" onclick="doDeleteMessage(<?php echo $__Context->message->message_srl ?>,'<?php echo $__Context->lang->confirm_delete ?>');" href="javascript:;" style="font-weight:bold">삭제</a>
        	  
        	  <?php if($__Context->message->message_type != 'S' && $__Context->message->member_srl != $__Context->logged_info->member_srl){ ?><a class="rbtn" href="<?php echo getUrl('','act','dispMobileexSendMessage','receiver_srl',$__Context->message->sender_srl,'message_srl',$__Context->message->message_srl) ?>">답장</a><?php } ?>
        </div>
     </div>
</div>
