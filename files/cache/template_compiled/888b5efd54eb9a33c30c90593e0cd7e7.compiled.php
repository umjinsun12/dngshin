<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','_setting.html') ?>
<div class="bd">
	<div class="hx h2">
		<h2><a href="<?php echo getUrl('','vid',$__Context->vid,'mid',$__Context->mid) ?>"><?php echo $__Context->mex_info->board_title ?></a></h2>
	</div>
	<div class="hx h3">
		<h3><?php echo $__Context->lang->cmd_write ?></h3>
	</div>
	<form action="./" method="post" id="mform" class="ff" onsubmit="return procFilter(this, insert)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<ul>
			<?php if($__Context->module_info->use_category == "Y"){ ?>
			<li>
				<label for="nCategory"><?php echo $__Context->lang->category ?></label>
				<select name="category_srl" id="nCategory">
					<option value=""<?php if(!$__Context->category_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->category ?></option>
					<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>	
					<option <?php if(!$__Context->val->grant){ ?>disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?>selected="selected"<?php } ?>>
					<?php echo str_repeat("&nbsp;&nbsp;",$__Context->val->depth) ?> <?php echo $__Context->val->title ?> (<?php echo $__Context->val->document_count ?>)
					</option>
					<?php } ?>
				</select>
			</li>
			<?php } ?>
			<li>
				<label for="nTitle"><?php echo $__Context->lang->title ?></label>
				<?php if($__Context->oDocument->getTitleText()){ ?>
				<input name="title" type="text" id="nTitle" value="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>"/>
				<?php }else{ ?>
				<input name="title" type="text" id="nTitle" />
				<?php } ?>
			</li>
			<?php if(!$__Context->is_logged){ ?>
			<li>
				<label for="uName"><?php echo $__Context->lang->writer ?></label>
				<input name="nick_name" type="text" id="uName" value="<?php echo htmlspecialchars($__Context->oDocument->get('nick_name')) ?>" />
			</li>
			<li>
				<label for="uMail"><?php echo $__Context->lang->email_address ?></label>
				<input name="email_address" type="text" id="uMail" value="<?php echo htmlspecialchars($__Context->oDocument->get('email_address')) ?>" />
			</li>
			<li>
				<label for="uPw"><?php echo $__Context->lang->password ?></label>
				<input name="password" type="password" id="uPw" />
			</li>
			<li>
				<label for="uSite"><?php echo $__Context->lang->homepage ?></label>
				<input name="homepage" type="text" id="uSite" value="<?php echo htmlspecialchars($__Context->oDocument->get('homepage')) ?>" />
			</li>
			<?php } ?>
			 <?php if($__Context->xe_version =='5'){ ?>
			<li>
				<input type="checkbox" name="comment_status" value="ALLOW" <?php if($__Context->oDocument->allowComment()){ ?>checked="checked"<?php } ?> id="reAllow" />
				<label for="reAllow"><?php echo $__Context->lang->allow_comment ?></label>
				<input type="checkbox" name="allow_trackback" value="Y" <?php if($__Context->oDocument->allowTrackback()){ ?>checked="checked"<?php } ?> id="trAllow" />
				<label for="trAllow"><?php echo $__Context->lang->allow_trackback ?></label>
				<?php if(is_array($__Context->status_list)){ ?>
				<div>
					<?php echo $__Context->lang->status ?>
					<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
					<input type="radio" name="status" value="<?php echo $__Context->key ?>" <?php if($__Context->oDocument->get('status') == $__Context->key){ ?>checked<?php } ?> /> <?php echo $__Context->value ?>
					<?php } ?>
				</div>
				<?php } ?>
			</li>
			 <?php }else{ ?>
			<li>
				<input type="checkbox" name="allow_comment" value="Y" <?php if($__Context->oDocument->allowComment()){ ?>checked="checked"<?php } ?> id="reAllow" />
				<label for="reAllow"><?php echo $__Context->lang->allow_comment ?></label>
				<input type="checkbox" name="allow_trackback" value="Y" <?php if($__Context->oDocument->allowTrackback()){ ?>checked="checked"<?php } ?> id="trAllow" />
				<label for="trAllow"><?php echo $__Context->lang->allow_trackback ?></label>
				<?php if($__Context->module_info->secret=="Y"){ ?>
				<input type="checkbox" name="is_secret" value="Y" <?php if($__Context->oDocument->isSecret()){ ?>checked="checked"<?php } ?> id="secret" />
				<label for="secret"><?php echo $__Context->lang->secret ?></label>
				<?php } ?>
			</li>
			 <?php } ?>
			<?php if(count($__Context->extra_keys)){ ?>
			<?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key=> $__Context->val){ ?>
			<li class="exvar">
				<label for="ex_<?php echo $__Context->val->name ?>"><?php echo $__Context->val->name ?> <?php if($__Context->val->is_required=="Y"){ ?>*<?php } ?></label>
				<?php echo $__Context->val->getFormHTML() ?>
			</li>
			<?php } ?>
			<?php } ?>
			<li>
				<?php if($__Context->document_srl && !$__Context->is_mobile_docment){ ?>
            <input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
            <div class="content_box" id="contentBox">
            	<div class="add_img_list" id="addImgListBox"></div>
            	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','add_file_config.html') ?>
            	<?php echo $__Context->oDocument->getContent(false) ?>
            	<div class="content_box_block">
            		<span class="block_msg"><?php echo $__Context->lang->msg_not_modify ?></span>
              </div>
            </div>
				<?php }else{ ?>
				<div class="content_box" id="contentBox">
					<div class="add_img_list" id="addImgListBox">
						<?php if($__Context->add_file_list){ ?>
    						<?php if($__Context->add_file_list&&count($__Context->add_file_list))foreach($__Context->add_file_list as $__Context->key => $__Context->add_file){ ?> 
    						<span class="add_img" id="addImg_<?php echo $__Context->add_file->file_srl ?>"><a title="<?php echo $__Context->add_file->rotate ?>" onclick="configAddFile(<?php echo $__Context->add_file->file_srl ?>);"><img src="<?php echo $__Context->add_file->preview_thumb ?>"></a></span>
    						<?php } ?>
						<?php } ?>
					</div>
					<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','add_file_config.html') ?>
					<textarea name="content" rows="8" cols="42" id="nText"><?php echo $__Context->oDocument->getContentText() ?></textarea>
				</div>
				<?php } ?>
			</li>
</form>
      <?php if($__Context->mobileex_config && $__Context->muploader_active == 'Y'){ ?>
			<li>
       <!-- file upload -->
					<form action="./" enctype="multipart/form-data" id="fform" name="fform" method="post" target="hiddenIframe" class="uf"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
					<input type="hidden" name="act" id="mFileAct" value="mobileFileUpload" />
					<input type="hidden" name="file_srl" id="mFileSrl" value="" />
					<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
					<input type="hidden" name="upload_type" value="document" />
				   <input type="hidden" name="upload_target_srl" value="<?php echo $__Context->document_srl ?>" />
			    <div class="upload_file_box">
               <div class="upload_btn_wrap">
                  <input type="button" value="<?php echo $__Context->lang->file_upload ?>" class="upload_btn choice" />
                  <input type="file" name="Filedata" id="mFileData" class="file_input" onchange="javascript: document.getElementById('fileName').value = this.value" />
               </div>
            </div>
            <ul class="upload_file_list" id="uploadFileList"<?php if(!$__Context->oDocument->hasUploadedFiles()){ ?> style="border:0"<?php } ?>>
            	  <?php if($__Context->oDocument->hasUploadedFiles() && $__Context->uploaded_list){ ?>
            	      <?php if($__Context->uploaded_list&&count($__Context->uploaded_list))foreach($__Context->uploaded_list as $__Context->key => $__Context->file){ ?>
                 	 <li id="file_<?php echo $__Context->file->file_srl ?>"><span class="img"><img src="<?php echo $__Context->file->preview_thumb ?>" border="0" width="100%" height="100%"></span>
                 	 	  <span class="name"><?php echo $__Context->file->source_filename ?><em><?php echo $__Context->file->size ?></em></span>
                 	 	  <?php if($__Context->mobileex_config->addfile_use == 'Y'){ ?>
                 	 	  <span class="addbtn"><?php if($__Context->file->img_ext == 'Y'){ ?><input type="button" value="<?php if($__Context->file->is_added == 'Y'){ ?>D<?php }else{ ?>I<?php } ?>" id="fileAddBtn_<?php echo $__Context->file->file_srl ?>" onclick="javascript:addFileSubmit(<?php echo $__Context->file->file_srl ?>);" class="<?php if($__Context->file->is_added == 'Y'){ ?>delfile<?php }else{ ?>addfile<?php } ?>"><?php } ?></span>
                 	 	  <?php } ?>
                 	 	  <span class="delbtn"><input type="button" value="D" onclick="javascript:fFormSubmit('D','<?php echo $__Context->file->file_srl ?>');" class="delete"></span>
                 	 </li>
                 	 <?php } ?>
                 <?php } ?>
            </ul>
             <div class="file_loading_box" id="fileLoadingBox" style="display:none">
                     <div class="file_loading">
                          <img src="/modules/board/m.skins/mex_default/modules/mobileex/tpl/images/icon_loading.gif" border="0"> 
                     </div>
             </div>
				</form>
				<!-- file uploader -->
			</li>
         <?php } ?>
		</ul>
		<div class="bna">
			<a href="javascript:mFormSubmit();" class="bn dark"><?php echo $__Context->lang->cmd_registration ?></a>
		</div>
</div>
<?php if($__Context->mobileex_config && $__Context->muploader_active == 'Y'){ ?>
<!-- 파일을 보낼 아이프레임 -->
<form action="./" enctype="multipart/form-data" id="afform" name="afform" method="post" target="hiddenIframe"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<input type="hidden" name="act" id="addFileAct" value="mobileInsertAddFile" />
<input type="hidden" name="upload_target_srl" value="<?php echo $__Context->document_srl ?>" />
<input type="hidden" name="add_file_srl" id="addFileSrl" value="" />
</form>
<iframe name="hiddenIframe" src="about:blank" width="0" height="0" frameborder="0"></iframe>
<?php } ?>
