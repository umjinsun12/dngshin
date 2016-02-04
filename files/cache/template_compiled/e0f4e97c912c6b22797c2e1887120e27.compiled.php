<?php if(!defined("__XE__"))exit;?><footer class="clearfix list-footer">
	
	<?php if($__Context->mi->pageType == 'num'){ ?>
	<div class="paging2">
		<?php if($__Context->page != 1){ ?><a href="<?php echo getUrl('page',$__Context->page-1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="btBasic prev"><?php echo $__Context->lang->cmd_prev ?></a><?php } ?> 
		<span class="page-type-num"><span class="current"><?php echo $__Context->page ?></span> / <?php echo $__Context->page_navigation->last_page ?></span>
		<?php if($__Context->page != $__Context->page_navigation->last_page){ ?><a href="<?php echo getUrl('page',$__Context->page+1,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="btBasic next"><?php echo $__Context->lang->cmd_next ?></a><?php } ?>
	</div>
	<?php }else{ ?>
	<?php if($__Context->document_list || $__Context->notice_list){ ?><div class="paging">
		<a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="prev direction"><?php echo $__Context->lang->first_page ?></a><?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){;
if($__Context->page==$__Context->page_no){ ?><span class="current"><?php echo $__Context->page_no ?></span><?php };
if($__Context->page!=$__Context->page_no){ ?><a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>"><?php echo $__Context->page_no ?></a><?php };
} ?><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division) ?>" class="next direction"><?php echo $__Context->lang->last_page ?></a>
	</div><?php } ?>
	<?php } ?>
	
</footer>
