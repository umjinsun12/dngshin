<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_header.html') ?>
<h2 class="member-top-title"><?php echo $__Context->member_title = $__Context->lang->cmd_view_saved_document ?></h2>
<div class="member-header-wrap">
<div class="member-header saved">
	<ul class="member-menu">
		<li><a href="<?php echo getUrl('act','dispMemberScrappedDocument','member_srl','') ?>"><?php echo $__Context->lang->cmd_view_scrapped_document ?></a></li>
		<li><a href="<?php echo getUrl('act','dispMemberSavedDocument','member_srl','') ?>" class="active"><?php echo $__Context->lang->cmd_view_saved_document ?></a></li>
		<li><a href="<?php echo getUrl('act','dispMemberOwnDocument','member_srl','') ?>"><?php echo $__Context->lang->cmd_view_own_document ?></a></li></ul>
</div>
</div>
<div class="saved-body m-element m-list">
	<ul class="list">
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->val){ ?><li>
			<ul class="list-element" style="position: relative;">
				<li class="title"><a href="#saved_document_<?php echo $__Context->val->document_srl ?>" class="list-link" onclick="jQuery('#saved_document_<?php echo $__Context->val->document_srl ?>').toggle(); return false;"></a><?php echo $__Context->val->getTitle() ?></li>
				<li class="date el"><?php echo $__Context->val->getRegdate("m-d") ?></li>
			</ul>
			<div id="saved_document_<?php echo $__Context->val->document_srl ?>" class="savedContent" style="display:none;"><?php echo $__Context->val->getContent(false) ?></div>
		</li><?php } ?>
	</ul>
</div>
<div class="paging">
	<a href="<?php echo getUrl('page','','module_srl','') ?>" class="prev direction"><?php echo $__Context->lang->first_page ?></a><?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){;
if($__Context->page == $__Context->page_no){ ?><span class="current"><?php echo $__Context->page_no ?></span><?php };
if($__Context->page != $__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a><?php };
} ?><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="next direction"><?php echo $__Context->lang->last_page ?></a>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_footer.html') ?>