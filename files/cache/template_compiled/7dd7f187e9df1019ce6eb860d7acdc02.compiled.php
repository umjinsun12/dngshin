<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_header.html') ?>
<span class="check-cancel-dummy cbt"></span>
<div class="login-wrap">
<div class="origin-body">
	<div class="title-wrap clearfix">
		<div class="profile-image">
			<?php if($__Context->oDocument->getProfileImage()){ ?><img src="<?php echo $__Context->oDocument->getProfileImage() ?>" alt="profile image" width="40px" height="40px" /><?php } ?>
		</div>
		<h3><?php echo $__Context->oDocument->getTitle() ?></h3>
		<div class="under-title">
			<span class="name el"><?php echo $__Context->oDocument->getNickName() ?></span> <span class="l">|</span>
			<span class="date el"><?php echo $__Context->oDocument->getRegdate('m-d') ?></span> <span class="l">|</span>
			<span class="hit el"><?php echo $__Context->lang->readed_count ?> <?php echo $__Context->oDocument->get('readed_count') ?></span>
		</div>
	</div>
</div>
<div class="message-body">
	<h3><?php echo $__Context->lang->confirm_delete ?></h3>
    <form action="./" method="get" class="ff" onsubmit="return procFilter(this, delete_document)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	    <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	    <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	    <input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<div class="bt-wrap clearfix">
			<a href="<?php echo getUrl('act','') ?>" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit"><?php echo $__Context->lang->cmd_delete ?></button>
		</div>
    </form>
</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_footer.html') ?>
