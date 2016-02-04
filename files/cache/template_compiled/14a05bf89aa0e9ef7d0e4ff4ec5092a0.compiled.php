<?php if(!defined("__XE__"))exit;
if (!$__Context->wi->subject_cut_size) $__Context->wi->subject_cut_size = 36;
	$__Context->t_date = date(Ymd);
 ?>
<div class="m-news m-element gridEl<?php if($__Context->wi->show_info == 'Y'){ ?> webzine-style<?php } ?>">
	<section<?php if($__Context->wi->tab_type == 'tab' || $__Context->wi->page_count>1){ ?> class="swiper"<?php } ?>>
		<?php if($__Context->wi->tab_type == 'tab'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','_tab.html');
} ?>
		<?php if($__Context->wi->tab_type == 'tab'){ ?>
		<ul class="swiper-wrapper">
			<?php $__Context->i=0 ?>
			<?php if($__Context->widget_info->tab&&count($__Context->widget_info->tab))foreach($__Context->widget_info->tab as $__Context->module_srl => $__Context->tab){ ?>
			<li class="swiper-slide slide slide<?php echo $__Context->i ?>"><ul class="list">
			<?php $__Context->widget_info->content_items = $__Context->tab->content_items ?>
			<?php $__Context->_idx=0 ?>
		    <?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
			<?php if($__Context->wi->page_count !=1 && is_int($__Context->_idx/$__Context->wi->list_count) && !is_int($__Context->_idx/($__Context->wi->list_count*$__Context->wi->page_count-$__Context->wi->page_count))){ ?>
				</ul></li>
				<li class="swiper-slide"><ul class="list">
			<?php } ?>
				<li>
					<a href="<?php echo $__Context->item->getLink() ?>" class="list-link"></a>
					<?php if($__Context->item->get('category_srl') && $__Context->wi->show_category == 'Y'){ ?><span class="category"><?php echo $__Context->item->getCategory() ?></span><?php } ?>
					<span class="title"><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></span>
					<?php if($__Context->wi->show_icon=='Y'){ ?><span class="icon"><?php echo $__Context->item->printExtraImages() ?></span><?php } ?>
					<div class="info">
						<span class="author"><?php echo $__Context->item->getNickName() ?></span>
						<span class="date"><?php if($__Context->t_date == $__Context->item->getRegDate('Ymd')){;
echo $__Context->item->getRegdate("H:i");
}else{;
echo $__Context->item->getRegdate("m-d");
} ?></span>
						<?php if($__Context->item->getCommentCount()){ ?><a href="#" class="reply"><?php echo $__Context->item->getCommentCount() ?></a><?php } ?>
					</div>
				</li>
			<?php $__Context->_idx++ ?>
			<?php } ?>
			<?php $__Context->i++ ?>
			</ul></li>
			<?php } ?>
		</ul>
		<div class="swiper-pagination"></div>
		<?php }elseif($__Context->wi->tab_type == 'none' && $__Context->wi->page_count>1){ ?>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','_title.html') ?>
		<ul class="swiper-wrapper">
			<li class="swiper-slide"><ul class="list">
			<?php $__Context->_idx=0 ?>
		    <?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
			<?php if($__Context->wi->page_count !=1 && is_int($__Context->_idx/$__Context->wi->list_count) && $__Context->_idx/$__Context->wi->list_count !=0){ ?>
				</ul></li>
				<li class="swiper-slide"><ul class="list">
			<?php } ?>
				<li>
					<a href="<?php echo $__Context->item->getLink() ?>" class="list-link"></a>
					<?php if($__Context->item->get('category_srl') && $__Context->wi->show_category == 'Y'){ ?><span class="category"><?php echo $__Context->item->getCategory() ?></span><?php } ?>
					<span class="title"><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></span>
					<?php if($__Context->wi->show_icon=='Y'){ ?><span class="icon"><?php echo $__Context->item->printExtraImages() ?></span><?php } ?>
					<div class="info">
						<span class="author"><?php echo $__Context->item->getNickName() ?></span>
						<span class="date"><?php if($__Context->t_date == $__Context->item->getRegDate('Ymd')){;
echo $__Context->item->getRegdate("H:i");
}else{;
echo $__Context->item->getRegdate("m-d");
} ?></span>
						<?php if($__Context->item->getCommentCount()){ ?><a href="#" class="reply"><?php echo $__Context->item->getCommentCount() ?></a><?php } ?>
					</div>
				</li>
			<?php $__Context->_idx++ ?>
			<?php } ?>
			</ul></li>
		</ul>
		<div class="swiper-pagination"></div>
		<?php }else{ ?>
		<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('widgets/flatContent/skins/default','_title.html') ?>
		<ul class="list">
			<?php $__Context->_idx=0 ?>
		    <?php if($__Context->widget_info->content_items&&count($__Context->widget_info->content_items))foreach($__Context->widget_info->content_items as $__Context->key => $__Context->item){ ?>
				<li>
					<a href="<?php echo $__Context->item->getLink() ?>" class="list-link"></a>
					<?php if($__Context->item->get('category_srl') && $__Context->wi->show_category == 'Y'){ ?><span class="category"><?php echo $__Context->item->getCategory() ?></span><?php } ?>
					<span class="title"><?php echo $__Context->item->getTitle($__Context->widget_info->subject_cut_size) ?></span>
					<?php if($__Context->wi->show_icon=='Y'){ ?><span class="icon"><?php echo $__Context->item->printExtraImages() ?></span><?php } ?>
					<div class="info">
						<span class="author"><?php echo $__Context->item->getNickName() ?></span>
						<span class="date"><?php if($__Context->t_date == $__Context->item->getRegDate('Ymd')){;
echo $__Context->item->getRegdate("H:i");
}else{;
echo $__Context->item->getRegdate("m-d");
} ?></span>
						<?php if($__Context->item->getCommentCount()){ ?><a href="#" class="reply"><?php echo $__Context->item->getCommentCount() ?></a><?php } ?>
					</div>
				</li>
			<?php $__Context->_idx++ ?>
			<?php } ?>
		</ul>
		<?php } ?>
	</section>
</div>
