<?php if(!defined("__XE__"))exit;?><!--#Meta:https://developers.kakao.com/sdk/js/kakao.min.js--><?php $__tmp=array('https://developers.kakao.com/sdk/js/kakao.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php  $__Context->_extra_vars = $__Context->oDocument->getExtraVars();  ?>
		<?php  
			$__Context->receiver_user_id = $__Context->_extra_vars[3]->value;
			$__Context->oMemberModel = &getModel('member');
			$__Context->columnList = array('member_srl');
			$__Context->receiver_info = $__Context->oMemberModel->getMemberInfoByEmailAddress($__Context->receiver_user_id); 
            if(!$__Context->receiver_srl)
            	$__Context->receiver_srl = $__Context->receiver_info->member_srl;
            else
            	$__Context->receiver_srl = 4; 
		 ?>
		
<article>
		
	<div>
	
		<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
		<form action="./" method="get" class="read-secret" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
			<input type="password" name="password" id="cpw" required placeholder="<?php echo $__Context->lang->msg_is_secret ?>" class="input100" />
			<div class="bt-wrap clearfix bt-wrap-full">
				<a href="<?php echo getUrl('document_srl','') ?>" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
				<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_input ?></button>
			</div>
		</form>
		<?php }else{ ?>
		
		<div class="bup_image">
		<div class="image-content">
		<img src="<?php echo $__Context->oDocument->getThumbnail() ?>" style="width:120px;height:120px">
		</div>
		
		<div class="bup-title">
			<?php echo $__Context->_extra_vars[1]->getValueHTML() ?> 법무사	
		</div>
		</div>
		
		<div class="bup_contact">
			
			<a href="<?php echo getUrl('','mid','board_zhaH13','act','dispBoardWrite','dgi_way','1','receiver_srl',$__Context->receiver_srl,'doc_srl',$__Context->document_srl) ?>">
			<div style="float: left;width: 50%;height:100%;padding: 10px;background-color: #F15A22">
				<div>
				<img src="/modules/board/m.skins/bupBoard/images/bup_con.png" style="width:35px;height:35px;float: left;margin-right: 15px">
				</div>
				<div style="color: white;font-size:14px;font-weight: bolder;margin:10px">
				견적 문의하기
				</div>
			</div>
			</a>
			
			<a href="tel:01055026392">
			<div style="float: right;width: 50%;height:100%;padding: 10px;background-color:#245580">
				<div>
				<img src="/modules/board/m.skins/bupBoard/images/bup_phone.png" style="width:35px;height:35px;float: left;margin-right: 15px">
				</div>
				<div style="color: white;font-size:14px;font-weight: bolder;margin:10px">
					전화걸기
				</div>
			</div>
			</a>
		</div>
		
		
		<div style="padding-left: 20px;padding-top: 10px">
		<div>
                <div class="separator-fields"></div>
                <h2 class="title-new"><?php echo $__Context->_extra_vars[2]->name ?></h2>
                <div class="separator-fields"></div>
                <p class="description-new"><?php echo $__Context->_extra_vars[2]->getValueHTML() ?></p>
                <div class="separator-button"></div>
        </div>
        
        <div>
                <div class="separator-fields"></div>
                <h2 class="title-new"><?php echo $__Context->_extra_vars[3]->name ?></h2>
                <div class="separator-fields"></div>
                <p class="description-new"><?php echo $__Context->_extra_vars[3]->getValueHTML() ?></p>
                <div class="separator-button"></div>
        </div>
        
            
		
		<div>
                <div class="separator-fields"></div>
                <h2 class="title-new">법무사 소개</h2>
                <div class="separator-fields"></div>
                <p class="description-new"><?php echo $__Context->oDocument->getContent(false) ?></p>
                <div class="separator-button"></div>
        </div>
        
		
		
		
		<?php } ?>
	
		
		
	
</div>
</article>
<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){;
if($__Context->document_srl==$__Context->document->document_srl){ ?>
<?php if(!$__Context->search_keyword){ ?>
<?php if((!$__Context->document_list[$__Context->no+1]->document_srl && $__Context->page!=1) || (!$__Context->document_list[$__Context->no-1]->document_srl && $__Context->page!=$__Context->total_page)){ ?>
<?php 
	$__Context->oModuleModel = &getModel('module');
	$__Context->module_srl_temp = $__Context->oModuleModel->getModuleSrlByMid($__Context->mid);
	if(is_array($__Context->module_srl_temp)) $__Context->module_srl = $__Context->module_srl_temp[0];
	else $__Context->module_srl = $__Context->module_srl_temp;
	$__Context->args = new stdClass();
	$__Context->args->module_srl = $__Context->module_srl;
	$__Context->args->category_srl = $__Context->category;
	$__Context->args->list_count = $__Context->module_info->list_count;
	$__Context->args->sort_index = $__Context->module_info->order_target;
	if($__Context->sort_index) $__Context->args->sort_index = $__Context->sort_index;
	$__Context->args->order_type = $__Context->module_info->order_type;
	if($__Context->sort_index) $__Context->args->order_type = $__Context->order_type;
	if($__Context->module_info->except_notice=='Y') $__Context->prevnext_except_notice=1;
 ?>
<?php if(!$__Context->document_list[$__Context->no+1]->document_srl && $__Context->page!=1){ ?>
<?php 
	$__Context->is_prevnext='P';
	$__Context->args->page = $__Context->page-1;
	$__Context->prevnext_list = executeQueryArray('document.getDocumentList',$__Context->args);
	$__Context->prevnext_data = array_reverse($__Context->prevnext_list->data);
 ?>
<?php }else if(!$__Context->document_list[$__Context->no-1]->document_srl && $__Context->page!=$__Context->total_page){ ?>
<?php 
	$__Context->is_prevnext='N';
	$__Context->args->page = $__Context->page+1;
	$__Context->prevnext_list = executeQueryArray('document.getDocumentList',$__Context->args);
	$__Context->prevnext_data = $__Context->prevnext_list->data;
 ?>
<?php } ?>
<?php if($__Context->prevnext_data&&count($__Context->prevnext_data))foreach($__Context->prevnext_data as $__Context->no2 => $__Context->document2){ ?>
<?php if(!$__Context->prevnext_except_notice || ($__Context->prevnext_except_notice && $__Context->document2->is_notice!='Y')){ ?>
<?php 
	$__Context->prevnext_doc = $__Context->document2->document_srl;
	$__Context->prevnext_title = $__Context->document2->title;
	$__Context->prevnext_date = $__Context->document2->regdate;
	$__Context->prevnext_nick = $__Context->document2->nick_name;
	$__Context->prevnext_comment = $__Context->document2->comment_count;
	break;
 ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php }} ?>
<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
<?php }else{ ?>
<div id="comment">
<div class="read-control">
	<ul class="clearfix">
		<li class="comment-num title-new" style="font-weight: bold">&nbsp리뷰 <span class="num"><?php echo $__Context->oDocument->getCommentCount() ?></span> 건</li>
	</ul>
	
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/bupBoard','bup_comment.html') ?>
</div>
</div>
<?php } ?>
