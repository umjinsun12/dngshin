<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5_youtube','_header.html') ?>
<?php if($__Context->oComment->isExists()){ ?><div class="context_data">
	<h3 class="author">
		<?php if($__Context->oComment->homepage){ ?><a href="<?php echo $__Context->oComment->homepage ?>"><?php echo $__Context->oComment->getNickName() ?></a><?php } ?>
		<?php if(!$__Context->oComment->homepage){ ?><strong><?php echo $__Context->oComment->getNickName() ?></strong><?php } ?>
	</h3>
	<?php echo $__Context->oComment->getContent(false) ?>
</div><?php } ?>
<form action="./" method="get" onsubmit="return procFilter(this, delete_comment)" class="context_message"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->oComment->get('document_srl') ?>" />
	<input type="hidden" name="comment_srl" value="<?php echo $__Context->oComment->get('comment_srl') ?>" />
	<h1><?php echo $__Context->lang->cmd_comment_do ?> <?php echo $__Context->lang->confirm_delete ?></h1>
	<div class="btnArea">
		<input class="btn blue" type="submit" value="<?php echo $__Context->lang->cmd_delete ?>" />
		<button class="btn" type="button" onclick="history.back()"><?php echo $__Context->lang->cmd_cancel ?></button>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/skins/sketchbook5_youtube','_footer.html') ?>