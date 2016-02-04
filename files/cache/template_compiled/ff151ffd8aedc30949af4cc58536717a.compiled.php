<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/cympusadmin/tpl/css/index.css--><?php $__tmp=array('modules/cympusadmin/tpl/css/index.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div id="admin_index">
	<h5 class="a_tit"><?php echo $__Context->lang->site_status ?></h5>
	<ul>
		<li class="join"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispMemberAdminList') ?>" target="_blank" class="link_area"><span class="todayc"><?php echo $__Context->lang->new_members ?></span><span class="todaycount"><?php echo $__Context->status->member->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->member->totalCount ?></span></a></p></li>
		<li class="new_doc"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispDocumentAdminList') ?>" target="_blank"  class="link_area"><span class="todayc"><?php echo $__Context->lang->latest_documents ?></span><span class="todaycount"><?php echo $__Context->status->document->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->document->totalCount ?></span></a></p></li>
		<li class="new_commen"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispCommentAdminList') ?>" target="_blank" class="link_area"><span class="todayc"><?php echo $__Context->lang->latest_comments ?></span><span class="todaycount"><?php echo $__Context->status->comment->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->comment->totalCount ?></span></a></p></li>
	</ul>
	<?php if($__Context->status->elearning){ ?>
	<h5 class="a_tit"><?php echo $__Context->lang->elearning_status ?></h5>
		<ul>
			<li style="width:85%;">
				<table cellspacing=0>
					<tr style="background:#eee;">
						<?php if($__Context->status->elearning->lessonStatus&&count($__Context->status->elearning->lessonStatus))foreach($__Context->status->elearning->lessonStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><th><?php echo $__Context->val->title ?></th><?php }} ?>
					</tr>
					<tr>
						<?php if($__Context->status->elearning->lessonStatus&&count($__Context->status->elearning->lessonStatus))foreach($__Context->status->elearning->lessonStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><td style="text-align:center;"><a href="<?php echo getUrl('act','dispElearningAdminOrderManagement','status',$__Context->key) ?>"><?php echo $__Context->val->count ?></a></td><?php }} ?>
					</tr>
				</table>
			</li>
			<li class="order"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispElearningAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->registrations ?></span><span class="todaycount"><?php echo $__Context->status->elearning->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->elearning->totalCount ?></span></a></p></li>
			<li class="class_in"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispElearningAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->elearning_sales ?></span><span class="todaycount"><?php echo $__Context->status->elearning->todayAmount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->elearning->totalAmount ?></span></a></p></li>
			<?php if($__Context->status->player){ ?><li class="class_play"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispScmsAdminConnecting') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->current_play ?></span><span class="todaycount"><?php echo $__Context->status->player->currentPlayCount ?></span></a></p></li><?php } ?>
			
		</ul>
	<?php } ?>
	<?php if($__Context->status->nstore){ ?>
		<h5 class="a_tit"><?php echo $__Context->lang->nstore_status ?></h5>
		<ul>
			<li style="width:96%;">
				<table cellspacing=0>
					<tr style="background:#eee;">
						<?php if($__Context->status->nstore->orderStatus&&count($__Context->status->nstore->orderStatus))foreach($__Context->status->nstore->orderStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><th><?php echo $__Context->val->title ?></th><?php }} ?>
					</tr>
					<tr>
						<?php if($__Context->status->nstore->orderStatus&&count($__Context->status->nstore->orderStatus))foreach($__Context->status->nstore->orderStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><td style="text-align:center;"><a href="<?php echo getUrl('act','dispNstoreAdminOrderManagement','status',$__Context->key) ?>"><?php echo $__Context->val->count ?></a></td><?php }} ?>
					</tr>
				</table>
			</li>
			<li class="pro_out"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispNstoreAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->product_sell ?></span><span class="todaycount"><?php echo $__Context->status->nstore->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->nstore->totalCount ?></span></a></p></li>
			<li class="pro_in"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispNstoreAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->product_sales ?></span><span class="todaycount"><?php echo $__Context->status->nstore->todayAmount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->nstore->totalAmount ?></span></a></p></li>
		</ul>
	<?php } ?>
	<?php if($__Context->status->nstore_digital){ ?>
	<h5 class="a_tit"><?php echo $__Context->lang->nstore_digital_status ?></h5>
		<ul>
			<li style="width:96%;">
				<table cellspacing=0>
					<tr style="background:#eee;">
						<?php if($__Context->status->nstore_digital->orderStatus&&count($__Context->status->nstore_digital->orderStatus))foreach($__Context->status->nstore_digital->orderStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><th><?php echo $__Context->val->title ?></th><?php }} ?>
					</tr>
					<tr>
						<?php if($__Context->status->nstore_digital->orderStatus&&count($__Context->status->nstore_digital->orderStatus))foreach($__Context->status->nstore_digital->orderStatus as $__Context->key=>$__Context->val){;
if($__Context->key!='0'){ ?><td style="text-align:center;"><a href="<?php echo getUrl('act','dispNstore_digitalAdminOrderManagement','status',$__Context->key) ?>"><?php echo $__Context->val->count ?></a></td><?php }} ?>
					</tr>
				</table>
			</li>
			<li class="pro_out"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispNstore_digitalAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->product_sell ?></span><span class="todaycount"><?php echo $__Context->status->nstore_digital->todayCount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->nstore_digital->totalCount ?></span></a></p></li>
			<li class="pro_in"><p class="area_group"><a href="<?php echo getUrl('','module','cympusadmin','act','dispNstore_digitalAdminOrderManagement') ?>" class="link_area"><span class="todayc"><?php echo $__Context->lang->product_sales ?></span><span class="todaycount"><?php echo $__Context->status->nstore_digital->todayAmount ?></span><br />total<span class="totalcount"><?php echo $__Context->status->nstore_digital->totalAmount ?></span></a></p></li>
		</ul>
	<?php } ?>
</div><!-- admin_index -->
