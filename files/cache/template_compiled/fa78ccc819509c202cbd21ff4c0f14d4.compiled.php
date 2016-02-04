<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/bupBoard','_header.html') ?>
<span class="check-cancel-dummy cbt"></span>
<div class="login-wrap">
<div class="origin-body">
	<div class="comment-el cWrite">
		<div class="profile-image pad">
			<?php if($__Context->oComment->getProfileImage()){ ?><img src="<?php echo $__Context->oComment->getProfileImage() ?>" alt="profile image" width="40px" height="40px" /><?php } ?>
		</div>
		<span class="name"<?php if($__Context->oComment->get('member_srl')){ ?> style="font-weight:bold"<?php } ?>><?php echo $__Context->oComment->getNickName() ?></span>
		<span class="date"><?php echo $__Context->oComment->getRegdate('y-m-d H:i') ?></span>
		<div class="comment-body">
			<?php echo $__Context->oComment->getContent(false) ?>
		</div>
	</div>
</div>
<div class="message-body">
	<h3><?php echo $__Context->lang->confirm_delete ?></h3>
    <form action="./" method="get" class="ff" onsubmit="return procFilter(this, delete_comment)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	    <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	    <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	    <input type="hidden" name="document_srl" value="<?php echo $__Context->oComment->get('document_srl') ?>" />
	    <input type="hidden" name="comment_srl" value="<?php echo $__Context->oComment->get('comment_srl') ?>" />
		<div class="bt-wrap clearfix">
			<a href="<?php echo getUrl('act','','comment_srl','') ?>" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_delete ?></button>
		</div>
    </form>
</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/bupBoard','_footer.html') ?>
