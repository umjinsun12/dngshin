<?php if(!defined("__XE__"))exit;
if (!$__Context->mi->best_comment) $__Context->mi->best_comment = 1000;
	if (!$__Context->mi->blind_comment) $__Context->mi->blind_comment = 1000;
 ?>
<div class="comment">
	<?php if($__Context->oDocument->getCommentcount()){ ?><ul class="comment-list">
		<?php if($__Context->oDocument->getComments()&&count($__Context->oDocument->getComments()))foreach($__Context->oDocument->getComments() as $__Context->key=>$__Context->comment){ ?><li class="clearfix<?php if($__Context->comment->get('depth')){ ?> indent<?php if($__Context->mi->use_comment_indent == 'Y'){ ?> indent<?php echo ($__Context->comment->get('depth'));
};
};
if($__Context->comment->get('voted_count') >= $__Context->mi->best_comment){ ?> best-comment<?php } ?>" id="comment_<?php echo $__Context->comment->comment_srl ?>">
			<div class="comment-el">
				<div class="profile-image pad">
					<?php if($__Context->comment->getProfileImage()){ ?><img src="<?php echo $__Context->comment->getProfileImage() ?>" alt="profile image" width="40px" height="40px" /><?php } ?>
				</div>
				<span class="name member_<?php echo $__Context->comment->get('member_srl') ?> nName"<?php if($__Context->comment->get('member_srl')){ ?> style="font-weight:bold"<?php } ?>>
					<?php if($__Context->comment->get('voted_count') >= $__Context->mi->best_comment){ ?><span class="best-text">best</span><?php };
echo $__Context->comment->getNickName() ?>
				</span>
				<span class="date"><?php if($__Context->t_date == $__Context->comment->getRegDate('Ymd')){;
echo $__Context->comment->getRegDate("H:i");
}else{;
echo $__Context->comment->getRegDate("y-m-d");
} ?></span>
				<div class="comment-body">
					<?php if(!$__Context->comment->isAccessible()){ ?>
					<form action="./" method="get" class="secret-comment" onsubmit="return procFilter(this, input_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
						<div><input type="password" name="password" id="cpw_<?php echo $__Context->comment->comment_srl ?>" class="input100" required placeholder="<?php echo $__Context->lang->msg_is_secret ?>" /> <button type="submit" class="btCancel"><?php echo $__Context->lang->cmd_input ?></button> </div>
						<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
						<input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
						<input type="hidden" name="document_srl" value="<?php echo $__Context->comment->get('document_srl') ?>" />
						<input type="hidden" name="comment_srl" value="<?php echo $__Context->comment->get('comment_srl') ?>" />
					</form>
					<?php }else{ ?>
					<?php if(-$__Context->comment->get('blamed_count') >= $__Context->mi->blind_comment){ ?><span class="blind-text">블라인드 처리되었습니다. [코멘트보기]</span><?php } ?>
					<div<?php if(-$__Context->comment->get('blamed_count') >= $__Context->mi->blind_comment){ ?> class="blind-comment"<?php } ?>><?php echo $__Context->comment->getContent(false) ?></div>
					<?php } ?>
				</div>
				<?php if($__Context->mi->use_comment_vote == 'Y' && $__Context->comment->isAccessible()){ ?>
					<div class="comment-view-vote phone">
						<span class="thumbText"><?php echo $__Context->lang->cmd_vote ?> <span class="thumbUpNum"><?php echo $__Context->comment->get('voted_count') ?></span></span><span class="thumbText"><?php echo $__Context->lang->cmd_vote_down ?> <span class="thumbDownNum"><?php echo -$__Context->comment->get('blamed_count') ?></span></span>
					</div>
					<div class="comment-view-vote pad">
						<button class="thumbText"<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('comment','procCommentVoteUp','<?php echo $__Context->comment->comment_srl ?>');return false;"<?php } ?>><?php echo $__Context->lang->cmd_vote ?> <span class="thumbUpNum"><?php echo $__Context->comment->get('voted_count') ?></span></button><button class="thumbText"<?php if($__Context->is_logged){ ?> onclick="doCallModuleAction('comment','procCommentVoteDown','<?php echo $__Context->comment->comment_srl ?>')"<?php } ?>><?php echo $__Context->lang->cmd_vote_down ?> <span class="thumbDownNum"><?php echo -$__Context->comment->get('blamed_count') ?></span></button>
					</div>
				<?php } ?>
			</div>
			<table class="comment-control" cellpadding="0" cellspacing="0"><tr><td>
				<ul class="clearfix">
					<?php  $__Context->not_me = $__Context->comment->member_srl && $__Context->is_logged && ($__Context->comment->member_srl != $__Context->logged_info->member_srl) ?>
					<li><a href="<?php echo getUrl('act','dispBoardReplyComment','comment_srl',$__Context->comment->comment_srl) ?>"><span class="bt-cc-reply im"></span><?php echo $__Context->lang->cmd_reply ?></a></li>
					<?php if(($__Context->comment->isGranted()||!$__Context->comment->get('member_srl'))){ ?><li><a href="<?php echo getUrl('act','dispBoardModifyComment','comment_srl',$__Context->comment->comment_srl) ?>"><span class="bt-cc-edit im"></span><?php echo $__Context->lang->cmd_modify ?></a></li><?php } ?>
					<?php if($__Context->comment->isGranted()||!$__Context->comment->get('member_srl')){ ?><li><a href="<?php echo getUrl('act','dispBoardDeleteComment','comment_srl',$__Context->comment->comment_srl) ?>"><span class="bt-cc-del im"></span><?php echo $__Context->lang->cmd_delete ?></a></li><?php } ?>
					<?php if($__Context->is_logged && ($__Context->comment->member_srl != $__Context->logged_info->member_srl) && $__Context->mi->use_comment_declare == 'Y'){ ?><li><a href="javascript:;" onclick="doCallModuleAction('comment','procCommentDeclare','<?php echo $__Context->comment->comment_srl ?>');return false;"><span class="bt-cc-declare im"></span><?php echo $__Context->lang->cmd_declare ?></a></li><?php } ?>
					<?php if($__Context->not_me && $__Context->mi->use_anonymous != 'Y'){ ?><li class="phone"><a href="<?php echo getUrl('','mid',$__Context->mid,'act','dispMemberInfo','member_srl',$__Context->comment->member_srl) ?>"><span class="bt-cc-memberInfo"></span><?php echo $__Context->lang->cmd_view_member_info ?></a></li><?php } ?>
					<?php if($__Context->not_me && $__Context->mi->use_anonymous != 'Y'){ ?><li class="phone"><a href="<?php echo getUrl('','mid',$__Context->mid,'search_target','nick_name','search_keyword',$__Context->comment->getNickName()) ?>"><span class="bt-cc-document"></span><?php echo $__Context->lang->cmd_view_own_document ?></a></li><?php } ?>
					<?php if($__Context->not_me && $__Context->comment->get('email_address') && $__Context->mi->use_anonymous != 'Y'){ ?><li class="phone"><a href="mailto:<?php echo $__Context->comment->get('email_address') ?>"><span class="bt-cc-email"></span><?php echo $__Context->lang->cmd_send_email ?></a></li><?php } ?>
					<?php if($__Context->not_me){ ?><li class="pad"><button class="btBasic btMore">more..</button><button class="btAdmin btClose">close</button></li><?php } ?>
					<li><a href="javascript:;" class="bt-cc-cancel"><?php echo $__Context->lang->cmd_cancel ?></a></li>
				</ul>
				<?php if($__Context->mi->use_comment_vote == 'Y' && $__Context->is_logged && $__Context->comment->member_srl != $__Context->logged_info->member_srl){ ?><div class="comment-vote phone">
					<button class="thumbUp" onclick="doCallModuleAction('comment','procCommentVoteUp','<?php echo $__Context->comment->comment_srl ?>');return false;"><?php echo $__Context->lang->cmd_vote ?></button>
					<button class="thumbDown" onclick="doCallModuleAction('comment','procCommentVoteDown','<?php echo $__Context->comment->comment_srl ?>')"><?php echo $__Context->lang->cmd_vote_down ?></button>
				</div><?php } ?>
			</td></tr></table>
		</li><?php } ?>
	</ul><?php } ?>
	<?php if($__Context->oDocument->comment_page_navigation){ ?><div class="paging">
		<a href="<?php echo getUrl('cpage',1) ?>#comment" class="prev direction"><?php echo $__Context->lang->first_page ?></a><?php while($__Context->page_no=$__Context->oDocument->comment_page_navigation->getNextPage()){;
if($__Context->cpage==$__Context->page_no){ ?><span class="current"><?php echo $__Context->page_no ?></span><?php };
if($__Context->cpage!=$__Context->page_no){ ?><a href="<?php echo getUrl('cpage',$__Context->page_no) ?>#comment"><?php echo $__Context->page_no ?></a><?php };
} ?><a href="<?php echo getUrl('cpage',$__Context->oDocument->comment_page_navigation->last_page) ?>#comment" class="next direction"><?php echo $__Context->lang->last_page ?></a>
	</div><?php } ?>
</div>
<div class="bg-dummy" id="comment-control-dummy"></div>
<?php if($__Context->grant->write_comment && $__Context->oDocument->isEnableComment()){ ?><div class="comment-write">
<?php if($__Context->mi->show_comment_write !='Y'){ ?><div class="clearfix"><button class="btOpenWrite"><?php echo $__Context->lang->write_comment ?></button> <a href="<?php echo getUrl('document_srl','') ?>" class="btDark">asdas</a></div><?php } ?>
<form action="./" method="post" class="cWrite-body"<?php if($__Context->mi->show_comment_write =='Y'){ ?> style="display:block"<?php } ?> onsubmit="return procFilter(this, insert_comment);"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->oDocument->document_srl ?>" />
	<input type="hidden" name="comment_srl" value="" />
	<ul>
		<li class="textarea-wrap">
			<textarea name="content" id="rText" required placeholder="<?php echo $__Context->lang->comment ?>"></textarea>
		</li>
		<?php if(!$__Context->is_logged){ ?>
		<li>
			<input name="nick_name" type="text" id="uName" class="input100" required placeholder="<?php echo $__Context->lang->writer ?>" />
		</li>
		<li>
			<input name="password" type="password" id="uPw" class="input100" required placeholder="<?php echo $__Context->lang->password ?>" />
		</li>
		<li>
			<input name="email_address" type="email" id="uMail" class="input100" placeholder="<?php echo $__Context->lang->email_address ?>" />
		</li>
		<li>
			<input name="homepage" type="url" id="uSite" class="input100" placeholder="<?php echo $__Context->lang->homepage ?>" />
		</li>
		<?php } ?>
		<?php if($__Context->module_info->secret=='Y'){ ?><li >
			<input type="checkbox" name="is_secret" value="Y" id="is_secret" class="iCheck" />
			<label for="is_secret"><span class="check-dummy"></span> <span><?php echo $__Context->lang->secret ?></span></label>
		</li><?php } ?>
	</ul>
	<div class="bt-wrap clearfix bt-wrap-full">
		<a href="javascript:;" class="btCancel"<?php if($__Context->mi->show_comment_write =='Y'){ ?> style="display:none"<?php } ?>><?php echo $__Context->lang->cmd_cancel ?></a>
		<button type="submit" class="btSubmit"<?php if($__Context->mi->show_comment_write =='Y'){ ?> style="width:80%; float:left;"<?php } ?> ><?php echo $__Context->lang->cmd_comment_registration ?></button>
		<?php if($__Context->mi->show_comment_write =='Y'){ ?><a href="<?php echo getUrl('document_srl','') ?>" class="btLight"><?php echo $__Context->lang->cmd_list ?></a><?php } ?>
	</div>
</form>
</div><?php } ?>
