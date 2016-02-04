<?php if(!defined("__XE__"))exit;?><div class="rd_nav img_tx fr m_btn_wrp">
	<?php if($__Context->mi->prev_next!='N' || $__Context->mi->default_style=='viewer'){ ?><div class="help bubble left m_no">
		<a class="text" href="#" onclick="jQuery(this).next().fadeToggle();return false">?</a>
		<div class="wrp">
			<div class="speech">
				<h4><?php echo $__Context->lang->shortcut ?></h4>
				<p><strong><b class="ui-icon ui-icon-arrow-1-w"><span class="blind">Prev</span></b></strong><?php echo $__Context->lang->cmd_prev ?> <?php echo $__Context->lang->document ?></p>
				<p><strong><b class="ui-icon ui-icon-arrow-1-e"><span class="blind">Next</span></b></strong><?php echo $__Context->lang->cmd_next ?> <?php echo $__Context->lang->document ?></p>
				<?php if($__Context->mi->default_style=='viewer'){ ?><p><strong>ESC</strong><?php echo $__Context->lang->cmd_close ?></p><?php } ?>
			</div>
			<i class="edge"></i>
			<i class="ie8_only bl"></i><i class="ie8_only br"></i>
		</div>
	</div><?php } ?>
	<?php if($__Context->mi->font_btn!='N' && $__Context->lang_type=='ko'){ ?><a class="tg_btn2 bubble m_no" href="#bd_font" title="글꼴 선택"><b>가</b><span class="arrow down"></span></a><?php } ?>
	<a class="font_plus bubble" href="#" title="<?php echo $__Context->lang->larger ?>"><b class="ui-icon ui-icon-zoomin">+</b></a>
	<a class="font_minus bubble" href="#" title="<?php echo $__Context->lang->smaller ?>"><b class="ui-icon ui-icon-zoomout">-</b></a>
	<?php if($__Context->mi->viewer=='2'){ ?><a class="if_viewer bubble" href="#" onclick="window.open('<?php echo getUrl('listStyle','viewer','page','') ?>','viewer','width=9999,height=9999,scrollbars=yes,resizable=yes,toolbars=no');return false" title="<?php echo $__Context->lang->viewer ?>"><b class="ui-icon ui-icon-image">Viewer</b></a><?php } ?>
	<a class="back_to bubble m_no" href="#bd" title="<?php echo $__Context->lang->cmd_move_up ?>"><b class="ui-icon ui-icon-arrow-1-n">Up</b></a>
	<a class="back_to bubble m_no" href="#rd_end_<?php echo $__Context->oDocument->document_srl ?>" title="(<?php echo $__Context->lang->cmd_list ?>) <?php echo $__Context->lang->cmd_move_down ?>"><b class="ui-icon ui-icon-arrow-1-s">Down</b></a>
	<a class="comment back_to bubble if_viewer m_no" href="#comment<?php if($__Context->mi->default_style=='blog'){ ?>_<?php echo $__Context->oDocument->document_srl;
} ?>" title="<?php echo $__Context->lang->go_cmt ?>"><b class="ui-icon ui-icon-comment">Comment</b></a>
	<?php if(!$__Context->mi->rd_nav_item){ ?><a class="print_doc bubble m_no<?php if($__Context->mi->default_style=='viewer'){ ?> this<?php } ?>" href="<?php echo getUrl('listStyle','viewer','act') ?>" title="<?php echo $__Context->lang->cmd_print ?>"><b class="ui-icon ui-icon-print">Print</b></a><?php } ?>
	<?php if((!$__Context->mi->show_files || $__Context->mi->show_files=='2') && $__Context->oDocument->hasUploadedFiles()){ ?><a class="file back_to bubble m_no" href="#files_<?php echo $__Context->oDocument->document_srl ?>" onclick="jQuery('#files_<?php echo $__Context->oDocument->document_srl ?>').show();return false" title="<?php echo $__Context->lang->uploaded_file ?>"><b class="ui-icon ui-icon-disk">Files</b></a><?php } ?>
	<?php if($__Context->is_logged){ ?><a class="document_<?php echo $__Context->oDocument->document_srl ?> action bubble m_no" href="#popup_menu_area" onclick="return false" title="<?php echo $__Context->lang->cmd_document_do ?>"><b class="ui-icon ui-icon-arrowthickstop-1-s">More</b></a><?php } ?>
	<?php if($__Context->oDocument->isEditable() && !$__Context->mi->rd_nav){ ?>
	<a class="edit" href="<?php echo getUrl('act','dispBoardWrite','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><i class="ico_16px write"></i><?php echo $__Context->lang->cmd_modify ?></a>
	<a class="edit" href="<?php echo getUrl('act','dispBoardDelete','document_srl',$__Context->oDocument->document_srl,'comment_srl','') ?>"><i class="ico_16px delete"></i><?php echo $__Context->lang->cmd_delete ?> </a>
	<?php } ?>
</div>