<?php if(!defined("__XE__"))exit;?>     <div class="hx h2">
     	<h2><a href="<?php echo getUrl('document_srl','','category','','page','') ?>"><?php echo $__Context->mex_info->board_title ?></a> 
     		<?php if($__Context->module_info->use_category == "Y" && $__Context->oDocument->get('category_srl')){ ?>&rsaquo; <a href="<?php echo getUrl('document_srl','','category',$__Context->oDocument->get('category_srl')) ?>"><?php echo $__Context->category_list[$__Context->oDocument->get('category_srl')]->title ?></a><?php } ?> &rsaquo; <?php echo $__Context->oDocument->getTitle() ?></h2>
     	<span class="ex"><?php echo $__Context->oDocument->getNickName() ?> | <?php echo $__Context->oDocument->getRegdate() ?> | <?php if($__Context->mex_info->send_message_use=='Y' && $__Context->oDocument->getMemberSrl() && ($__Context->logged_info->member_srl != $__Context->oDocument->get('member_srl'))){ ?><a href="<?php echo getUrl('act','dispMobileexSendMessage','receiver_srl',$__Context->oDocument->get('member_srl')) ?>"><?php echo $__Context->lang->cmd_send_message ?></a> | <?php } ?><a href="#skip_co"><?php echo $__Context->lang->skip_to_content ?></a></span>
     	<a href="<?php echo getUrl('act','dispBoardWrite','document_srl','') ?>" class="write"><?php echo $__Context->lang->cmd_write ?></a>
     </div>
     <div class="co">
     		<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
     		<form action="./" method="get" class="ff" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
     		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
     		<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
     		<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
     			<label for="cpw"><?php echo $__Context->lang->msg_is_secret ?></label>
     			<input type="password" name="password" id="cpw" />
     			<input type="submit" value="<?php echo $__Context->lang->cmd_input ?>" class="bn dark" />
     		</form>
     		<?php }else{ ?>
     		<?php if($__Context->oDocument->isExtraVarsExists()){ ?>
     			<?php  $__Context->_extra_vars = $__Context->oDocument->getExtraVars();  ?>
     			<dl class="xv">
     			<?php if($__Context->_extra_vars&&count($__Context->_extra_vars))foreach($__Context->_extra_vars as $__Context->key => $__Context->val){ ?>
     				<?php if($__Context->val->getValueHTML()){ ?><dt><?php echo $__Context->val->name ?> : </dt><?php } ?>
     				<dd><?php echo $__Context->val->getValueHTML() ?></dd>
     				<div class="cb"></div>
     			<?php } ?>
     			</dl>
     		<?php } ?>
     		<?php echo $__Context->oDocument->getContent(false) ?>
     		<?php } ?>
     </div>
     <div id="skip_co"></div>
     <?php if($__Context->oDocument->hasUploadedFiles()){ ?>
     <?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
     <div class="hx h3">
     	<h3><?php echo $__Context->lang->uploaded_file ?> <em>[<?php echo count($__Context->uploaded_list) ?>]</em></h3> 
     	<button type="button" class="tg" title="open/close"></button>
     </div>
     <ul class="file tgo open">
     	<?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
     	<li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?> <span class="size"><?php echo FileHandler::filesize($__Context->file->file_size) ?></span></a></li>
     	<?php } ?>
     </ul>
     <?php } ?>
     <?php if($__Context->oDocument->allowTrackback() && $__Context->oDocument->getTrackbackCount()){ ?>
     <div class="hx h3">
     	<h3><?php echo $__Context->lang->trackback ?> <em>[<?php echo $__Context->oDocument->getTrackbackCount() ?>]</em></h3>
     	<button type="button" class="tg" title="open/close"></button>
     </div>
     <ul class="rp tgo open">
     	<?php  $__Context->_trackback_list = $__Context->oDocument->getTrackbacks()  ?>
     	<?php if($__Context->_trackback_list&&count($__Context->_trackback_list))foreach($__Context->_trackback_list as $__Context->key => $__Context->val){ ?>
     	<li>
     		<p><?php echo $__Context->val->excerpt ?></p>
     		<span class="auth">
     			<em><?php echo htmlspecialchars($__Context->val->title) ?> - <?php echo htmlspecialchars($__Context->val->blog_name) ?></em>
     			<span class="time"><?php echo zdate($__Context->val->regdate, "Y.m.d") ?></span>
     			<?php if($__Context->grant->manager){ ?>
     			<a href="07_password.html" class="btn de">삭제</a>
     			<?php } ?>
     		</span>
     	</li>
     	<?php } ?>
     </ul>
     <?php } ?>
     
     <?php if($__Context->mex_info->cmt_list_type == 'E'){ ?>
               
          <!-- // 모바일EX형 코멘트 리스트 -->
               <?php 
                 $__Context->oMobileexModel = &getModel('mobileex');
                 $__Context->sub_comment_count = $__Context->oMobileexModel->getMobileexSubCommentCount($__Context->oDocument->document_srl);
                 if(!$__Context->sub_comment_count) $__Context->sub_comment_count = 0;
                 $__Context->total_cmt_page_count = ceil($__Context->sub_comment_count / $__Context->mex_info->cmt_list_count);
                ?>
               <script type="text/javascript">
               //<![CDATA[
                  totalCmtPageCount = <?php echo $__Context->total_cmt_page_count ?>;
               //]]>
               </script>
               <?php if($__Context->oDocument->allowComment() && $__Context->sub_comment_count){ ?>
                    <div class="hx h3">
                    	<h3 id="clb"><?php echo $__Context->lang->comment ?> <em>[<?php echo $__Context->sub_comment_count ?>]</em></h3> 
                    	<button type="button" class="tg tgr" title="open/close"></button>
                    </div>
                    <div id="cmt_list" style="display:none">
                       <div class="loading_box" id="cmtLoadingBox" style="display:none">
                                <div class="loading_bar">
                                     <img src="/modules/board/m.skins/mex_default/modules/board/m.skins/mex_default/img/loading.gif" border="0"> 
                                </div>
                       </div>
                      <ul id="cl" class="rp tgor"></ul>
                    </div>
               <?php } ?>
     <?php }else{ ?>
          <!-- // 기본형 코멘트 리스트 -->
               <?php if($__Context->oDocument->allowComment() && $__Context->oDocument->getCommentCount()){ ?>
               <div class="hx h3">
               	<h3 id="clb"><?php echo $__Context->lang->comment ?> <em>[<?php echo $__Context->oDocument->getCommentCount() ?>]</em></h3> 
               	<button type="button" class="tg tgr" title="open/close"></button>
               </div>
               <div id="cmt_list" style="display:none">
                  <div class="loading_box" id="cmtLoadingBox" style="display:none">
                           <div class="loading_bar">
                                <img src="/modules/board/m.skins/mex_default/modules/board/m.skins/mex_default/img/loading.gif" border="0"> 
                           </div>
                  </div>
               </div>
               <?php } ?>
     <?php } ?>
     
     <?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment() ){ ?>
     <div class="hx h3">
     	<h3><?php echo $__Context->lang->write_comment ?></h3>
     	<button type="button" class="tg" title="open/close"></button>
     </div>
     <form action="./" method="post" class="ff tgo open" onsubmit="return procFilter(this, insert_comment);"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
     	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
     	<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
     	<input type="hidden" name="comment_srl" value="" />
     	<ul>
     		<li>
     			<label for="rText"><?php echo $__Context->lang->comment ?></label>
     			<textarea name="content" cols="20" rows="5" id="rText"></textarea>
     		</li>
     		<?php if(!$__Context->is_logged){ ?>
     		<li>
     			<label for="uName"><?php echo $__Context->lang->writer ?></label>
     			<input name="nick_name" type="text" id="uName" />
     		</li>
     		<li>
     			<label for="uMail"><?php echo $__Context->lang->email_address ?></label>
     			<input name="email_address" type="text" id="uMail" />
     		</li>
     		<li>
     			<label for="uPw"><?php echo $__Context->lang->password ?></label>
     			<input name="password" type="password" id="uPw" />
     		</li>
     		<li>
     			<label for="uSite"><?php echo $__Context->lang->homepage ?></label>
     			<input name="homepage" type="text" id="uSite" value="http://" />
     		</li>
     		<?php } ?>
     	</ul>
     	<div class="bna">
     		<input name="" type="submit" value="<?php echo $__Context->lang->cmd_comment_registration ?>" class="bn dark" />
     	</div>
     </form>
     <?php } ?>
     <div style="height:1px;overflow:hidden;background:#ddd"></div>
     <div class="bna">
     	<span class="fl"><a href="<?php echo getUrl('document_srl','') ?>" class="bn white"><?php echo $__Context->lang->cmd_list ?></a></span>
     	<span class="fr">
     		<?php if($__Context->oDocument->isEditable()){ ?>
     		<a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="bn white"><?php echo $__Context->lang->cmd_delete ?></a>
     		<a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="bn white"><?php echo $__Context->lang->cmd_modify ?></a>
     		<?php } ?>
     	</span>
     </div>
     <script type="text/javascript">
     //<![CDATA[
     jQuery(function($){
     	$('.co .mm').next().hide();
     	$('.mm').click(function(){ $(this).hide().next().show();});
     	$('.tgo').removeClass('open');
     	$('.tg').click(function(){
     		$(this).parent('.h3').next('.tgo').toggleClass('open');
     	});
     	$('.tgr').click(function(){
     		$('#cmt_list').toggle();
     	});
     	
     <?php if($__Context->mex_info->cmt_list_type == 'E'){ ?>
           var loadedCmtList = false;
          <?php if($__Context->cmtlist_view || $__Context->mex_info->auto_commentlist_view == 'Y'){ ?>
               		if(!loadedCmtList) {
               			loadedCmtList = true;
               			loadCmtList(<?php echo $__Context->oDocument->document_srl ?>, 0,<?php echo $__Context->mex_info->cmt_list_count ?>);
               		}
          <?php }else{ ?>
               	$('.tgr').click(function(){
               		if(!loadedCmtList) {
               			loadedCmtList = true;
               			loadCmtList(<?php echo $__Context->oDocument->document_srl ?>, 0,<?php echo $__Context->mex_info->cmt_list_count ?>);
               		}
               	});
          <?php } ?>
     <?php }else{ ?>
        var loaded = false;
          	<?php if($__Context->mex_info->auto_commentlist_view == 'Y' && $__Context->oDocument->getComments()){ ?>
          			loaded = true;
          			<?php  $__Context->lastpage = 1;  ?>
          			<?php  $__Context->temp = $__Context->oDocument->getComments()  ?>
          			<?php if($__Context->oDocument->comment_page_navigation){ ?>
          			<?php  $__Context->lastpage = $__Context->oDocument->comment_page_navigation->last_page  ?>
          			<?php } ?>
          			loadPage(<?php echo $__Context->oDocument->document_srl ?>, <?php echo $__Context->lastpage ?>);
          	<?php }else{ ?>
              	$('.tgr').click(function(){
              		if(!loaded) {
              			loaded = true;
              			<?php  $__Context->lastpage = 1;  ?>
              			<?php  $__Context->temp = $__Context->oDocument->getComments()  ?>
              			<?php if($__Context->oDocument->comment_page_navigation){ ?>
              			<?php  $__Context->lastpage = $__Context->oDocument->comment_page_navigation->last_page  ?>
              			<?php } ?>
              			loadPage(<?php echo $__Context->oDocument->document_srl ?>, <?php echo $__Context->lastpage ?>);
              		}
              	});
          	<?php } ?>
     <?php } ?>
     });
     //]]>
     </script>