<?php if(!defined("__XE__"))exit;?><!--#Meta:https://developers.kakao.com/sdk/js/kakao.min.js--><?php $__tmp=array('https://developers.kakao.com/sdk/js/kakao.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<span class="check-prev-dummy"></span>
<article>
	<div class="title-wrap clearfix">
		<div class="profile-image">
			<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="profile image" width="40px" height="40px" /><?php } ?>
		</div>
		<h3><?php echo $__Context->oDocument->getTitle() ?></h3>
		<div class="under-title">
			<span class="name el member_<?php echo $__Context->oDocument->get('member_srl') ?> nName"><?php echo $__Context->oDocument->getNickName() ?></span> <span class="l">|</span>
			<span class="date el"><?php if($__Context->t_date == $__Context->oDocument->getRegdate('Ymd')){;
echo $__Context->oDocument->getRegdate('H:i');
}else{;
echo $__Context->oDocument->getRegdate('m-d');
} ?></span> <span class="l">|</span>
			<span class="hit el"><?php echo $__Context->lang->readed_count ?> <?php echo $__Context->oDocument->get('readed_count') ?></span>
		</div>
	</div>
	
	<?php if($__Context->oDocument->isEditable()){ ?><div class="read-edit">
		<a href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="btDel btBasic"><?php echo $__Context->lang->cmd_delete ?></a>
		<a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="btEdit btBasic"><?php echo $__Context->lang->cmd_modify ?></a>
	</div><?php } ?>
	
	<div class="read-body">
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
		<?php if($__Context->oDocument->isExtraVarsExists()){ ?>
			<?php  $__Context->_extra_vars = $__Context->oDocument->getExtraVars();  ?>
			<table cellpadding="0" cellspacing="0" class="xv">
			<?php if($__Context->_extra_vars&&count($__Context->_extra_vars))foreach($__Context->_extra_vars as $__Context->key => $__Context->val){ ?>	
			<?php if($__Context->val->value){ ?>
				<tr>
					<th><?php echo $__Context->val->name ?></th>
					<td><?php echo $__Context->val->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			 <?php } ?>
			</table>
		<?php } ?>
		<?php echo $__Context->oDocument->getContent(false) ?>
		<?php } ?>
	
		<?php if($__Context->oDocument->hasUploadedFiles()){ ?><div class="read-file"<?php if($__Context->mi->show_file == 'Y'){ ?> style="display:block"<?php } ?>>
			<?php  $__Context->uploaded_list = $__Context->oDocument->getUploadedFiles()  ?>
			<h3>File List</h3>
			<ul>
				<?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
				<li><a href="<?php echo getUrl('');
echo $__Context->file->download_url ?>"><?php echo $__Context->file->source_filename ?></a></li>
				<?php } ?>
			</ul>
		</div><?php } ?>
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
<?php if($__Context->mi->use_more == 'Y'){ ?><ul class="read-more">
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){;
if($__Context->document_srl==$__Context->document->document_srl){ ?>
	<?php if($__Context->document_list[$__Context->no+1]->document_srl){ ?><li><a href="<?php echo getUrl('document_srl',$__Context->document_list[$__Context->no+1]->document_srl) ?>"><span class="prev">이전글</span> <?php echo $__Context->document_list[$__Context->no+1]->getTitle(34) ?> <?php if($__Context->document_list[$__Context->no+1]->getCommentCount()){ ?><span class="thumbUpNum">[<?php echo $__Context->document_list[$__Context->no+1]->getCommentCount() ?>]</span><?php } ?></a></li><?php } ?>
	
	<?php if($__Context->is_prevnext){ ?>
	<?php if($__Context->is_prevnext=='P'){ ?>
	<li><a href="<?php echo getUrl('document_srl',$__Context->prevnext_doc,'page','','cpage','') ?>"><span class="prev">이전글</span> <?php echo $__Context->prevnext_title ?> <?php if($__Context->prevnext_comment){ ?><span class="thumbUpNum">[<?php echo $__Context->prevnext_comment ?>]</span><?php } ?> </a></li>
	<?php }else{ ?>
	<li><a href="<?php echo getUrl('document_srl',$__Context->prevnext_doc,'page','','cpage','') ?>"><span class="next">다음글</span> <?php echo $__Context->prevnext_title ?> <?php if($__Context->prevnext_comment){ ?><span class="thumbUpNum">[<?php echo $__Context->prevnext_comment ?>]</span><?php } ?> </a></li>
	<?php } ?>
	<?php } ?>
	
	<?php if($__Context->document_list[$__Context->no-1]->document_srl){ ?><li><a href="<?php echo getUrl('document_srl',$__Context->document_list[$__Context->no-1]->document_srl) ?>"><span class="next">다음글</span> <?php echo $__Context->document_list[$__Context->no-1]->getTitle(34) ?> <?php if($__Context->document_list[$__Context->no-1]->getCommentCount()){ ?><span class="thumbUpNum">[<?php echo $__Context->document_list[$__Context->no-1]->getCommentCount() ?>]</span><?php } ?></a></li><?php } ?>
	<?php }} ?>
</ul><?php } ?>
<?php  break; ?>
<?php }} ?>
<?php if($__Context->oDocument->isSecret() && !$__Context->oDocument->isGranted()){ ?>
<?php }else{ ?>
<div id="comment">
<div class="declare clearfix">
	<p class="thumbUpNum">[주의] 이 글을 신고합니다.</p>
	<div class="bt-wrap">
		<button class="btLight"><?php echo $__Context->lang->cmd_cancel ?></button>
		<button onclick="doCallModuleAction('document','procDocumentDeclare','<?php echo $__Context->document_srl ?>');return false;" class="btDark"><?php echo $__Context->lang->cmd_declare ?></button>
	</div>		
</div>
<div class="read-control">
	<ul class="clearfix">
		<li class="comment-num"><?php echo $__Context->lang->comment ?> <span class="num"><?php echo $__Context->oDocument->getCommentCount() ?></span></li>
		<li><a href="<?php echo getUrl('document_srl','') ?>" class="btList"><?php echo $__Context->lang->cmd_list ?></a></li>
		<li><button class="btShare">share</button>
		<?php if($__Context->is_logged){ ?><li><button onclick="doCallModuleAction('member','procMemberScrapDocument','<?php echo $__Context->document_srl ?>')" class="btScrap"><?php echo $__Context->lang->cmd_scrap ?></button></li><?php } ?>
		<?php if($__Context->oDocument->hasUploadedFiles() && $__Context->mi->show_file != 'Y'){ ?><li><button class="btFile"><?php echo $__Context->lang->uploaded_file ?></button></li><?php } ?>
		<?php if($__Context->mi->use_declare == 'Y' && $__Context->is_logged){ ?><li><button class="btDeclare"><?php echo $__Context->lang->cmd_declare ?></button></li><?php } ?>
		<?php if($__Context->mi->use_blame =='Y'){ ?><li><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('document','procDocumentVoteDown','<?php echo $__Context->oDocument->document_srl ?>');return false"<?php } ?> class="btBlame"><?php echo $__Context->lang->cmd_vote_down ?> <span class="num2"><span><?php echo $__Context->oDocument->get('blamed_count') ?></span></span></button></li><?php } ?>
		<?php if($__Context->mi->use_vote !='N'){ ?><li><button<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('document','procDocumentVoteUp','<?php echo $__Context->oDocument->document_srl ?>');return false"<?php } ?> class="btVote"><?php echo $__Context->lang->cmd_vote ?> <span class="num2"><span><?php echo $__Context->oDocument->get('voted_count') ?></span></span></button></li><?php } ?>
	</ul>
	<div class="share">
		<!--
		<a href="javascript:sendLink()" id="kakao-link-btn"><img src="/modules/board/m.skins/gwangBoard/images/siKakao@2x.png" alt="kakao talk" width="40px" height="40px" /></a>
		<script>
			Kakao.init('e3e9be789541293e7e335eb60cd4b931');
			
			function sendLink() {
				Kakao.Link.sendTalkLink({
					label: '[<?php echo $__Context->layout_info->site_name ?>] <?php echo $__Context->oDocument->getTitleText() ?>',
					webLink: {
						text: '<?php echo $__Context->oDocument->getPermanentUrl() ?>',
						url: '<?php echo $__Context->oDocument->getPermanentUrl() ?>'
					}
				});
			}
		</script>
		-->
		<script type="text/javascript">
		  function executeKakaoStoryLink()
		  {
		    kakao.link("story").send({   
		        post : "<?php echo $__Context->oDocument->getPermanentUrl() ?>",
		        appid : "m.kakao.com",
		        appver : "1.0",
		        appname : "<?php echo $__Context->layout_info->site_name ?>",
		        urlinfo : JSON.stringify({title:"<?php echo $__Context->oDocument->getTitleText() ?>", imageurl:["<?php echo $__Context->oDocument->getThumbnail(320, auto, ratio) ?>"], type:"article"})
		    });
		  }
		</script>
  		<a onclick="javascript:executeKakaoStoryLink()"><img src="/modules/board/m.skins/gwangBoard/images/siKakaoStory@2x.png" alt="kakao story" width="40px" height="40px" /></a>
  		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $__Context->oDocument->getPermanentUrl() ?>"><img src="/modules/board/m.skins/gwangBoard/images/siFacebook@2x.png" alt="Facebook" width="40px" height="40px" /></a>
		<a href="http://twitter.com/share?url=<?php echo $__Context->oDocument->getPermanentUrl() ?>&text=<?php echo $__Context->oDocument->getTitle() ?>"><img src="/modules/board/m.skins/gwangBoard/images/siTwitter@2x.png" alt="Twitter" width="40px" height="40px" /></a>
	</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/gwangBoard','comment.html') ?>
</div>
<?php } ?>
