<?php if(!defined("__XE__"))exit;
if (!$__Context->mi->thumb_width) $__Context->mi->thumbnail_width = 600;
	if (!$__Context->mi->thumb_height) $__Context->mi->thumbnail_height = 300;
	if (!$__Context->mi->content_cut_size) $__Context->mi->content_cut_size = 70;
 ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/gwangBoard','_list_header.html') ?>
<div class="m-talkbox m-element webzine-style">
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
		<li class="clearfix">
			<div class="name">
				<div class="profile-image"><?php if($__Context->document->getProfileImage()){ ?><img src="<?php echo $__Context->document->getProfileImage() ?>" width="40px" height="40px" alt="profile-image" /><?php } ?></div>
				<div class="name-text"><?php echo $__Context->document->getNickName() ?></div>
			</div>
			<div<?php if(!$__Context->document->thumbnailExists()){ ?> class="bubble"<?php };
if($__Context->document->thumbnailExists()){ ?> class="bubble has-thumbnail"<?php } ?>>
				<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>" class="list-link"></a>
				<div class="title el left-side"><?php if($__Context->module_info->use_category=='Y' && $__Context->mi->show_category != 'N'){ ?><span class="category"><?php echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?></span><?php } ?> <?php echo $__Context->document->getTitle();
if($__Context->mi->show_icon != 'N'){ ?> <?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new);
} ?></div>
				<?php if($__Context->document->thumbnailExists()){ ?><div class="thumb-container tbtc">
					<div class="dummy tbd"></div>
					<div class="thumb-image tbi" style="background-image: url('<?php echo $__Context->document->getThumbnail($__Context->mi->thumbnail_width, $__Context->mi->thumbnail_height, crop) ?>')"></div>
				</div><?php } ?>
				<div class="left-side">
				<?php if($__Context->list_config['summary']){ ?><p class="summary el">
					<?php echo $__Context->document->getSummary($__Context->mi->content_cut_size) ?>
				</p><?php } ?>
				<div class="info el">
					<?php if($__Context->list_config['regdate']){ ?><span class="date"><?php if($__Context->t_date == $__Context->document->getRegDate('Ymd')){;
echo $__Context->document->getRegDate("H:i");
}else{;
echo $__Context->document->getRegDate("m-d");
} ?></span><?php } ?>
					<?php if($__Context->mi->show_comment != 'N'){ ?><a href="#" class="reply"><?php echo $__Context->document->getCommentCount() ?></a><?php } ?>
				</div>
				</div>
			</div>
		</li>
		<?php } ?>
		<?php if(!$__Context->document_list){ ?><li class="no-list"><?php echo $__Context->lang->no_documents ?></li><?php } ?>
	</ul>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/gwangBoard','_list_footer.html') ?>