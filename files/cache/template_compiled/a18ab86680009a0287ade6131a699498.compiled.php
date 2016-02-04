<?php if(!defined("__XE__"))exit;
if($__Context->receiver_info->member_srl && $__Context->document_srl){ ?>
 <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/mobileex/m.skins/default/filter','mobile_send_message.xml');$__xmlFilter->compile(); ?>
 
 <?php  
	$__Context->oDocumentModel=getModel('document');
	$__Context->oDocument = $__Context->oDocumentModel->getDocument($__Context->doc_srl);
	$__Context->_extra_vars=$__Context->oDocument->getExtraVars();
  ?>
 <form action="./" method="get" onsubmit="return procFilter(this,mobile_send_message)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="receiver_srl" value="<?php echo $__Context->receiver_info->member_srl ?>" />
        <input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
        <input type="hidden" name="receiver_nick_name" id="mrud" class="input_box" value="<?php echo $__Context->receiver_info->nick_name ?>" readonly="readonly" />
        <input type="hidden" name="title" id="message_title" class="input_box" value="<?php echo $__Context->_extra_vars[1]->getValueHTML() ?> 법무사 견적 요청" readonly="readonly" />
        <input type="hidden" class="textarea_box" id="mcnt" name="content" value="<?php echo $__Context->document_srl ?>" readonly="readonly"/>
        
        
        
        <div class="bmsg">
        		<div style="margin-top:10%;margin-bottom: 10px">
        		계산된 견적을 <br><?php echo $__Context->_extra_vars[1]->getValueHTML() ?> 법무사에게 보냅니다.
        		</div>
				<div class="btn_area" >
				<a style="margin-right:10px;float:left;background-color: #245580"class="gbutton" href="javascript:history.back()">취소</a>
		        <button style="float:right;"class="gbutton" type="submit" title="<?php echo $__Context->lang->cmd_send_message ?>">견적 보내기</button>
	    		</div>
	    </div>
</form>
<?php }else{ ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/mobileex/m.skins/default/filter','mobile_send_message.xml');$__xmlFilter->compile(); ?>
<div class="member_info_wrap">
    <h3 class="p_tit"><?php echo $__Context->lang->cmd_send_message ?></h3>
    <form action="./" method="get" onsubmit="return procFilter(this,mobile_send_message)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="receiver_srl" value="<?php echo $__Context->receiver_info->member_srl ?>" />
        <input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
        <!-- 받는이 -->
        <div class="mb_box">
          <table class="mb_tbl2">
          		<colgroup><col style="width:70px"><col></colgroup>
          		<tbody>
          		<?php if($__Context->receiver_info->member_srl){ ?>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->receiver ?></th>
             		<td><span class="input_area"><input type="text" name="receiver_nick_name" id="mrud" class="input_box" value="<?php echo $__Context->receiver_info->nick_name ?>" readonly="readonly" /><span class="txt"></span></span></td>
          		</tr>
          		<?php }else{ ?>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->receiver ?></th>
             		<td><span class="input_area"><input type="text" name="receiver_user_id" id="mrud" class="input_box" /><span class="txt">아이디를 입력해주세요. (이메일X)</span></span></td>
          		</tr>
          		<?php } ?>
          		</tbody>
          	</table>
        </div>
        <!-- 타이틀 -->
        <div class="mb_box2">
          <table class="mb_tbl2">
          		<colgroup><col style="width:70px"><col></colgroup>
          		<tbody>
          		<?php if($__Context->document_srl){ ?>
          		<tr>
             		<th scope="row">견적서</th>
             		<td><span class="input_area"><input type="text" name="title" id="message_title" class="input_box" value="<?php echo $__Context->document_srl ?>" readonly="readonly" /><span class="txt"></span></span></td>
          		</tr>
          		<?php }else{ ?>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->title ?></th>
             		<td><span class="input_area"><input type="text" name="title" id="message_title" class="input_box" value="<?php echo $__Context->source_message->title ?>" /><span class="txt"></span></span></td>
          		</tr>
          		<?php } ?>
          		</tbody>
          	</table>
        </div>
        <!-- 옵션 -->
        <!--<div class="mb_box2"><table class="mb_tbl2"><colgroup><col style="width:70px"><col></colgroup><tbody><tr><th scope="row"><?php echo $__Context->lang->cmd_option ?></th><td><input type="checkbox" value="Y" name="send_mail"  /><label for="">메일발송</label></td></tr></tbody></table></div>-->
        
        <!-- 받는이 -->
        <div class="mb_box2">
          <table class="mb_tbl2">
          		<?php if($__Context->document_srl){ ?>
          		<tr>
             		<td><span class="text_area"><input type="text" class="textarea_box" id="mcnt" name="content" value="위와 같이 견적 부탁드립니다." readonly="readonly"></textarea></span></td>
          		</tr>
          		<?php }else{ ?>
          		<tr>
             		<td><span class="text_area"><textarea class="textarea_box" id="mcnt" name="content"></textarea></span></td>
          		</tr>
          		<?php } ?>
          	</table>
        </div>
          <div class="btn_area">
          	   <a href="<?php echo getUrl('act','dispMobileexMessages','page','','message_type','','receiver_srl','','message_srl','') ?>" class="btn" title="<?php echo $__Context->lang->cmd_back ?>" style="height:27px; line-height:27px; margin-top:-2px "><?php echo $__Context->lang->cmd_list ?></a>
		        <button class="btn bt_btn" type="submit" title="<?php echo $__Context->lang->cmd_send_message ?>"><?php echo $__Context->lang->cmd_send_message ?></button>
	       </div>
	       
	   <?php } ?>
     </form>
</div>