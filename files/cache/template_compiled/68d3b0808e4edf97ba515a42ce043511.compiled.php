<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/x.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php if($__Context->document_srl){ ?><!--#Meta:modules/board/m.skins/bupregBoard/js/edit.js--><?php $__tmp=array('modules/board/m.skins/bupregBoard/js/edit.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/bupregBoard','_header.html') ?>
<span class="check-cancel-dummy"></span>
<div class="write-form">
	<h3><?php if($__Context->document_srl){;
echo $__Context->lang->cmd_modify;
}else{;
echo $__Context->lang->cmd_write;
} ?></h3>
	<form action="./" method="post" name="ff" class="ff" id="ff" onsubmit="return procFilter(this, insert)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<ul>
			<?php if($__Context->module_info->use_category == 'Y'){ ?><li class="clearfix">
				<label for="nCategory"><?php echo $__Context->lang->category ?> <em>*</em></label>
				<select name="category_srl" id="nCategory">
					<option></option>
					<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>	
					<option <?php if(!$__Context->val->grant){ ?>disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?>selected="selected"<?php } ?>>
						<?php echo $__Context->val->title ?>
					</option>
					<?php } ?>
				</select>
			</li><?php } ?>
			<li>
				<label for="nTitle"><?php echo $__Context->lang->title ?> <em>*</em></label>
				<?php if($__Context->oDocument->getTitleText()){ ?>
				<input name="title" type="text" id="nTitle" value="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>"/>
				<?php }else{ ?>
				<input name="title" type="text" id="nTitle" />
				<?php } ?>
			</li>
			<?php if($__Context->document_srl){ ?><li class="disc">글 수정시 PC에서 작성하신 HTML태그가 삭제됩니다. PC에서 작성한 글은 <a href="<?php echo getUrl('m',0) ?>">PC화면</a>에서 수정하는 것을 권장합니다.</li><?php } ?>
			<li>
				<label for="nText"><?php echo $__Context->lang->content ?> <em>*</em></label>
				<textarea name="content" rows="8" cols="42" id="nText"><?php if($__Context->document_srl){;
echo $__Context->oDocument->getContentText();
}elseif(!$__Context->document_srl && $__Context->mi->pre_inserted){;
echo $__Context->mi->pre_inserted;
} ?></textarea>
			</li>
			<?php if(!$__Context->is_logged){ ?>
			<li>
				<label for="uName"><?php echo $__Context->lang->writer ?> <em>*</em></label>
				<input name="nick_name" type="text" id="uName" />
			</li>
			<li>
				<label for="uPw"><?php echo $__Context->lang->password ?> <em>*</em></label>
				<input name="password" type="password" id="uPw" />
			</li>
			<li>
				<label for="uMail"><?php echo $__Context->lang->email_address ?></label>
				<input name="email_address" type="email" id="uMail" />
			</li>
			<li>
				<label for="uSite"><?php echo $__Context->lang->homepage ?></label>
				<input name="homepage" type="url" id="uSite" value="" />
			</li>
			<?php } ?>
			<?php if(count($__Context->extra_keys)){ ?>
			<?php if($__Context->extra_keys&&count($__Context->extra_keys))foreach($__Context->extra_keys as $__Context->key=> $__Context->val){ ?>
			<li class="exvar">
				<label for="ex_<?php echo $__Context->val->name ?>"><?php echo $__Context->val->name ?> <?php if($__Context->val->is_required=="Y"){ ?><em>*</em><?php } ?></label>
				<?php echo $__Context->val->getFormHTML() ?>
			</li>
			<?php } ?>
			<?php } ?>
			<li class="exvar option">
				<?php if($__Context->grant->manager){ ?><input type="checkbox" name="is_notice" value="Y" class="iCheck"<?php if($__Context->oDocument->isNotice()){ ?> checked="checked"<?php } ?> id="is_notice" /><?php } ?>
				<?php if($__Context->grant->manager){ ?><label for="is_notice"><?php echo $__Context->lang->notice ?></label><?php } ?>
				<input type="checkbox" name="comment_status" value="ALLOW"<?php if($__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> id="reAllow" />
				<label for="reAllow"><?php echo $__Context->lang->allow_comment ?></label>
				<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
				<input type="radio" name="status" value="<?php echo $__Context->key ?>"<?php if($__Context->oDocument->get('status') == $__Context->key){ ?> checked="checked"<?php } ?> /> <label for="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>
				<?php } ?>
			</li>
		</ul>
		<div class="bt-wrap clearfix bt-wrap-full">
			<a href="javascript:history.back()" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/bupregBoard','_footer.html') ?>
