<?php if(!defined("__XE__"))exit;
if (!$__Context->mi->thumb_width) $__Context->mi->thumbnail_width = 96;
	if (!$__Context->mi->thumb_height) $__Context->mi->thumbnail_height = 96;
 ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/gwangBoard','_list_header.html') ?>
<div class="m-list m-element">
	<ul<?php if($__Context->mi->show_notice != Y){ ?> class="notice-list"<?php };
if($__Context->mi->show_notice == Y){ ?> class="notice-list on"<?php } ?>>
		<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
		<li<?php if($__Context->document->getCommentCount()){ ?> class="has-comment"<?php } ?>>
			<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>" class="list-link"></a>
			<span class="notice-text notice-el"><?php echo $__Context->lang->notice ?></span> 
			<span class="notice-el"><?php echo $__Context->document->getTitle() ?> <?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?></span>
			<?php if($__Context->document->getCommentCount()){;
if($__Context->layout_info->mCol == 'black'){ ?><img src="/modules/board/m.skins/gwangBoard/images/biComment2@2x.png" alt="comment" width="14px" height="12px" class="comment-image" /><?php }else{ ?><img src="/modules/board/m.skins/gwangBoard/images/biComment@2x.png" alt="comment" width="14px" height="12px" class="comment-image" /><?php } ?><a href="<?php echo $__Context->document->getPermanentUrl() ?>#comment" class="reply m-list-reply"><?php echo $__Context->document->getCommentCount() ?></a><?php } ?>
		</li>
		<?php } ?>
		<?php if(!$__Context->notice_list){ ?><li class="no-list"><span class="notice-text"><?php echo $__Context->lang->notice ?></span>  <?php echo $__Context->lang->no_documents ?></li><?php } ?>
	</ul>
	<ul class="list">
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
		<li class="clearfix<?php if($__Context->document->getCommentCount()){ ?> has-comment<?php };
if($__Context->document->thumbnailExists()){ ?> has-thumb<?php } ?>">
			<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>" class="list-link"></a>
			<?php if($__Context->document->thumbnailExists()){ ?>
				<div class="dummy"></div>
				<img src="<?php echo $__Context->document->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, crop) ?>" width="48px" height="48px" class="thumb-image" />
			<?php } ?>
			<ul class="list-element">
				<li class="title"><?php if($__Context->module_info->use_category=='Y' && $__Context->mi->show_category != 'N'){ ?><span class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?> </span><?php };
echo $__Context->document->getTitle();
if($__Context->mi->show_icon != 'N'){ ?> <?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new);
} ?></li>
				<?php if($__Context->list_config['nick_name']){ ?><li class="name el"><span class="member_<?php echo $__Context->document->get('member_srl') ?> nName"><?php echo $__Context->document->getNickName() ?></span></li><?php };
if($__Context->list_config['regdate']){ ?><li class="date el"><?php if($__Context->t_date == $__Context->document->getRegDate('Ymd')){;
echo $__Context->document->getRegDate("H:i");
}else{;
echo $__Context->document->getRegDate("m-d");
} ?></li><?php };
if($__Context->list_config['readed_count']){ ?><li class="hit el"><?php echo $__Context->lang->readed_count ?> <?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):'0' ?></li><?php } ?>
			</ul>
			<?php if($__Context->document->getCommentCount()){;
if($__Context->layout_info->mCol == 'black'){ ?><img src="/modules/board/m.skins/gwangBoard/images/biComment2@2x.png" alt="comment" width="14px" height="12px" class="comment-image" /><?php }else{ ?><img src="/modules/board/m.skins/gwangBoard/images/biComment@2x.png" alt="comment" width="14px" height="12px" class="comment-image" /><?php } ?><a href="<?php echo $__Context->document->getPermanentUrl() ?>#comment" class="reply m-list-reply"><?php echo $__Context->document->getCommentCount() ?></a><?php } ?>
		</li>
		<?php } ?>
		<?php if(!$__Context->document_list){ ?><li class="no-list"><?php echo $__Context->lang->no_documents ?></li><?php } ?>
	</ul>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/gwangBoard','_list_footer.html') ?>