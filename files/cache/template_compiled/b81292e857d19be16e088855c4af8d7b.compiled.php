<?php if(!defined("__XE__"))exit;?><ul class="lt">
	<?php if($__Context->notice_list&&count($__Context->notice_list))foreach($__Context->notice_list as $__Context->no => $__Context->document){ ?>
	<li>
		<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>">
		<span class="title"><span class="notice"><?php echo $__Context->lang->notice ?></span> <?php if($__Context->module_info->use_category == "Y" && $__Context->mex_info->list_category == 'Y' && $__Context->document->get('category_srl')){;
echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?> &rsaquo;<?php } ?> <strong><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></strong> <?php if($__Context->document->getCommentCount()){ ?><em>[<?php echo $__Context->document->getCommentCount() ?>]</em><?php } ?></span>
			<span class="auth"><strong><?php echo $__Context->document->getNickName() ?></strong> <span class="time"><?php echo $__Context->document->getRegDate("Y.m.d") ?></span></span>
		</a>
	</li>
	<?php } ?>
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no => $__Context->document){ ?>
	<li>
		<a href="<?php echo getUrl('document_srl', $__Context->document->document_srl) ?>">
    			     <?php if($__Context->list_config['title']){ ?>
    			        <span class="title"><?php if($__Context->module_info->use_category == "Y" && $__Context->mex_info->list_category == 'Y' && $__Context->document->get('category_srl')){;
echo $__Context->category_list[$__Context->document->get('category_srl')]->title ?> &rsaquo;<?php } ?> 
    			        <strong><?php echo $__Context->document->getTitle($__Context->mex_info->subject_cut_size);
echo $__Context->document->is_mobile;
echo $__Context->document->printExtraImages(60*60*$__Context->mex_info->duration_new) ?></strong> 
    			        <?php if($__Context->document->getCommentCount()){ ?><em>[<?php echo $__Context->document->getCommentCount() ?>]</em><?php } ?></span>
    			     <?php } ?>
                <?php if($__Context->list_config['nick_name']){ ?><span class="auth"><strong><?php echo $__Context->document->getNickName() ?></strong> </span><em class="bar">|</em><?php } ?>
    			     <?php if($__Context->list_config['regdate']){ ?><span class="time"><?php echo $__Context->document->getRegDate("Y.m.d") ?></span><em class="bar">|</em><?php } ?>
    			     <?php if($__Context->list_config['readed_count']){ ?><span class="cnt"><?php echo $__Context->lang->readed_count ?> : <?php echo $__Context->document->get('readed_count')>0?$__Context->document->get('readed_count'):0 ?> </span><em class="bar">|</em><?php } ?>
    			     <?php if($__Context->list_config['voted_count']){ ?><span class="cnt"><?php echo $__Context->lang->voted_count ?> : <?php echo $__Context->document->get('voted_count')!=0?$__Context->document->get('voted_count'):0 ?> </span><em class="bar">|</em><?php } ?>
    			     <?php if($__Context->list_config_e&&count($__Context->list_config_e))foreach($__Context->list_config_e as $__Context->key => $__Context->extra){ ?>
                   <?php if($__Context->document->getExtraValueHTML($__Context->key)){ ?><span class="extra"><strong><?php echo $__Context->extra ?></strong>: <?php echo $__Context->document->getExtraValueHTML($__Context->key) ?>&nbsp;</span><?php } ?>
                   <em class="bar">|</em>
                <?php } ?>
		</a>
	</li>
	<?php } ?>
</ul>