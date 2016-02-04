<?php if(!defined("__XE__"))exit;?><!--#Meta:https://developers.kakao.com/sdk/js/kakao.min.js--><?php $__tmp=array('https://developers.kakao.com/sdk/js/kakao.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<span class="check-prev-dummy"></span>
<article>
	<div>
			<div class="hero-image">
          <div class="hero-image-title">
            <h2>등기비 결과보기</h2>
            <div class="sub-title-small">등기계산 결과입니다.</div>
          </div>
          <div class="hero-image-img"><img src="/modules/board/m.skins/dgiBoard/images/photo-1429032021766-c6a53949594f.jpg">
          </div>
    	</div>
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
			
            <div class="dgi-header">
              		<h2 class="dgi-heading-title">입력값</h2>
            </div>
            	
			<table style="background-color: rgba(236, 229, 229, 0.46);" cellpadding="0" cellspacing="0" class="xv">
				
			<?php if($__Context->_extra_vars[1]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[1]->name ?></th>
					<td><?php echo $__Context->_extra_vars[1]->getValueHTML() ?> 원</td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[2]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[2]->name ?></th>
					<td><?php echo $__Context->_extra_vars[2]->getValueHTML() ?> 원</td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[3]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[3]->name ?></th>
					<td><?php echo $__Context->_extra_vars[3]->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[4]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[4]->name ?></th>
					<td><?php echo $__Context->_extra_vars[4]->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[5]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[5]->name ?></th>
					<td><?php echo $__Context->_extra_vars[5]->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[6]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[6]->name ?></th>
					<td><?php echo $__Context->_extra_vars[6]->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			<?php if($__Context->_extra_vars[7]->value){ ?>
				<tr>
					<th><?php echo $__Context->_extra_vars[7]->name ?></th>
					<td><?php echo $__Context->_extra_vars[7]->getValueHTML() ?></td>
				</tr>
			<?php } ?>
			</table>
			
			
			      <div class="dgi-header">
              		<h2 class="dgi-heading-title">결과값</h2>
            </div>
            
			<table style="background-color: rgba(236, 229, 229, 0.46);"  cellpadding="0" cellspacing="0" class="xv">
			
			
				<?php 
					
					$__Context->maemaega=(int)preg_replace("/[^\d]/","",$__Context->_extra_vars[1]->value);
					$__Context->siga = preg_replace("/[^\d]/","",$__Context->_extra_vars[2]->value); 
					$__Context->sojae = $__Context->_extra_vars[3]->value;
					$__Context->pyung = $__Context->_extra_vars[4]->value;
					$__Context->chaehal = $__Context->_extra_vars[5]->value;
				 ?>
				
				<?php if($__Context->maemaega <= 600000000){ ?>
				<?php 
					if($__Context->pyung=='85m² 이하 주택') $__Context->nong=0;
					else $__Context->nong = round($__Context->maemaega*0.002);
					
					$__Context->chui = round($__Context->maemaega*0.01);
					$__Context->gyo = round($__Context->maemaega*0.001);
				 ?>
				
				<?php }elseif($__Context->maemaega <= 900000000){ ?>
				<?php 					
					if($__Context->pyung=='85m² 이하 주택') $__Context->nong=0;
					else $__Context->nong=round($__Context->maemaega*0.002);
					
					$__Context->chui=round($__Context->maemaega*0.02);
					$__Context->gyo = round($__Context->maemaega*0.002);
				 ?>
				<?php }else{ ?>
				<?php 
					if($__Context->pyung=='85m² 이하 주택') $__Context->nong=0;
					else $__Context->nong=round($__Context->maemaega*0.002);
					
					$__Context->chui = round($__Context->maemaega*0.03);
					$__Context->gyo = round($__Context->maemaega*0.003);
				 ?>
				<?php } ?>
				
				
				
				<?php 
					$__Context->jungji = 15000;
					
					if($__Context->maemaega > 1000000000) $__Context->inji = 150000;
					elseif($__Context->maemaega > 100000000) $__Context->inji = 150000;
					elseif($__Context->maemaega > 50000000) $__Context->inji = 70000;
					elseif($__Context->maemaega > 30000000) $__Context->inji = 40000;
					else $__Context->inji = 20000;
					
					if(!$__Context->siga) $__Context->siga=$__Context->maemaega*0.7;
				 ?>
				
				<?php if($__Context->siga < 50000000){ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.013;
					else $__Context->chae = $__Context->siga*0.013;	
				 ?>
				<?php }elseif($__Context->siga < 100000000){ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.019;
					else $__Context->chae = $__Context->siga*0.014;	
				 ?>
				<?php }elseif($__Context->siga < 160000000){ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.021;
					else $__Context->chae = $__Context->siga*0.016;	
				 ?>
				<?php }elseif($__Context->siga < 260000000){ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.023;
					else $__Context->chae = $__Context->siga*0.018;	
				 ?>
				<?php }elseif($__Context->siga < 600000000){ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.026;
					else $__Context->chae = $__Context->siga*0.021;	
				 ?>
				<?php }else{ ?>
				<?php 
					if($__Context->sojae = '특별시/광역시') $__Context->chae = $__Context->siga*0.031;
					else $__Context->chae = $__Context->siga*0.026;	
				 ?>
				<?php } ?>
				<?php 
					$__Context->chae=round($__Context->chae)*0.025;
					if($__Context->chae > 10000) $__Context->chae = round($__Context->chae,-4)*0.025;
					else $__Context->chae = round($__Context->chae)*0.025;
					
					$__Context->dggibu = 3000;
					
					$__Context->total = $__Context->chui + $__Context->nong + $__Context->gyo + $__Context->jungji + $__Context->inji + $__Context->chae + $__Context->dggibu;
				 ?>
				
				<?php 
					$__Context->chui = number_format($__Context->chui);
					$__Context->nong = number_format($__Context->nong);
					$__Context->gyo = number_format($__Context->gyo);
					$__Context->jungji = number_format($__Context->jungji);
					$__Context->inji = number_format($__Context->inji);
					$__Context->chae = number_format($__Context->chae);
					$__Context->dggibu = number_format($__Context->dggibu);
					$__Context->total = number_format($__Context->total);
				 ?>
				
				<tr>
					<th>취득세</th>
					<td><?php echo $__Context->chui ?> 원</td>
				</tr>
				<tr>
					<th>농어촌특별세</th>
					<td><?php echo $__Context->nong ?> 원</td>
				</tr>
				<tr>
					<th>교육세</th>
					<td><?php echo $__Context->gyo ?> 원</td>
				</tr>
				<tr>
					<th>증지</th>
					<td><?php echo $__Context->jungji ?> 원</td>
				</tr>
				<tr>
					<th>인지</th>
					<td><?php echo $__Context->inji ?> 원</td>
				</tr>
				<tr>
					<th>주택채권액</th>
					<td><?php echo $__Context->chae ?> 원</td>
				</tr>
				<tr>
					<th>부동산 등기부등본</th>
					<td><?php echo $__Context->dggibu ?> 원</td>
				</tr>
				<tr>
					<th>공과금 소계</th>
					<td><?php echo $__Context->total ?> 원</td>
				</tr>
			</table>
			
		
		
		<?php } ?>
		
		<div style="padding:10px;margin-bottom: 20px">
		<?php if($__Context->dgi_way==1){ ?>
		<div class="clearfix" style="float: left;background-color:#286090"><a href="<?php echo getUrl('','act','dispMobileexSendMessage','document_srl',$__Context->document_srl,'receiver_srl',$__Context->receiver_srl,doc_srl,$__Context->doc_srl) ?>" class="vbutton">견적 보내기</a></div>
		<?php }elseif($__Context->dgi_way==2){ ?>
		<div class="clearfix" style="float: left;background-color:#286090"><a href="javascript:history.back()" class="vbutton">돌아가기</a></div>
		
		<?php }else{ ?>
		<div class="clearfix" style="float: left;background-color:#286090"><a href="<?php echo getUrl('','mid','dgibi_niWQ69','act','dispDgibiContent') ?>" class="vbutton">셀프등기 하러가기</a></div>
		<?php } ?>
		<?php if($__Context->oDocument->isEditable()){ ?>
		<a href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>" class="vbutton" style="float: right;background-color: #272B30">수정하기</a>
		<?php } ?>
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
	<div class="share">
		<!--
		<a href="javascript:sendLink()" id="kakao-link-btn"><img src="/modules/board/m.skins/dgiBoard/images/siKakao@2x.png" alt="kakao talk" width="40px" height="40px" /></a>
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
  		<a onclick="javascript:executeKakaoStoryLink()"><img src="/modules/board/m.skins/dgiBoard/images/siKakaoStory@2x.png" alt="kakao story" width="40px" height="40px" /></a>
  		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $__Context->oDocument->getPermanentUrl() ?>"><img src="/modules/board/m.skins/dgiBoard/images/siFacebook@2x.png" alt="Facebook" width="40px" height="40px" /></a>
		<a href="http://twitter.com/share?url=<?php echo $__Context->oDocument->getPermanentUrl() ?>&text=<?php echo $__Context->oDocument->getTitle() ?>"><img src="/modules/board/m.skins/dgiBoard/images/siTwitter@2x.png" alt="Twitter" width="40px" height="40px" /></a>
	</div>
</div>
<!--<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','comment.html') ?> 잠깐지워보쟝-->
</div>
<?php } ?>
