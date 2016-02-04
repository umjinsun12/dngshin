<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_header.html') ?>
<h2 class="member-top-title"><?php echo $__Context->lang->member_info ?></h2>
<div class="member-header-wrap">
<div class="member-header">
	<?php 
		$__Context->oMemberModel = &getModel('member');
		if ($__Context->member_srl == $__Context->logged_info->member_srl || !$__Context->member_srl) $__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->logged_info->member_srl);
		else $__Context->memberProfileImage = $__Context->oMemberModel->getProfileImage($__Context->member_srl);
	 ?>
	<div class="profile-image"><a href="<?php echo getUrl('act','dispMemberInfo','member_srl','') ?>"><?php if($__Context->memberProfileImage->file){ ?><img src="<?php echo $__Context->memberProfileImage->file ?>" alt="profile-image" width="80" height="80" /><?php } ?></a></div>
	<ul class="member-menu">
		<?php if($__Context->member_srl == $__Context->logged_info->member_srl || !$__Context->member_srl){ ?>
		<?php if($__Context->member_config->identifier == 'email_address'){ ?><li>
			<a href="<?php echo getUrl('act', 'dispMemberModifyEmailAddress') ?>"><?php echo $__Context->lang->cmd_modify_member_email_address ?></a>
		</li><?php } ?>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyInfo','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_info ?></a>
		</li>
		<li>
			<a href="<?php echo getUrl('act','dispMemberModifyPassword','member_srl','') ?>"><?php echo $__Context->lang->cmd_modify_member_password ?></a>
		</li>
		<?php }else{ ?>
		<li><a href="javascript:history.back()" class="active"><?php echo $__Context->lang->cmd_back ?></a></li>
		<?php } ?>
	</ul>
</div>
</div>
<div class="info-body">
	<table class="info-table" cellpadding="0" cellspacing="0">
		<caption><?php echo $__Context->lang->member_info ?></caption>
		<?php if($__Context->displayDatas&&count($__Context->displayDatas))foreach($__Context->displayDatas as $__Context->item){ ?><tr>
			<th><?php echo $__Context->item->title ?> <?php if($__Context->item->required || $__Context->item->mustRequired){ ?><em>*</em><?php } ?></th>
			<td><?php echo $__Context->item->value ?></td>
		</tr><?php } ?>
		<tr>
			<th><?php echo $__Context->lang->member_group ?></th>
			<td><?php echo implode(', ', $__Context->memberInfo['group_list']) ?></td>
		</tr>
		<tr>
			<th><?php echo $__Context->lang->signup_date ?></th>
			<td><?php echo zdate($__Context->memberInfo[regdate],"Y-m-d") ?></td>
		</tr>
		<?php if($__Context->memberInfo[member_srl] == $__Context->logged_info->member_srl || $__Context->logged_info->is_admin == 'Y' ){ ?>
		<tr>
			<th><?php echo $__Context->lang->last_login ?></th>
			<td><?php echo zdate($__Context->memberInfo[last_login],"Y-m-d") ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php if($__Context->member_srl == $__Context->logged_info->member_srl || !$__Context->member_srl){ ?><div class="bt-wrap">
		<a href="<?php echo getUrl('act','dispMemberLeave','member_srl','') ?>" class="btWithdraw btLight"><?php echo $__Context->lang->cmd_leave ?></a>
	</div><?php } ?>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/member/m.skins/flatMember','member_footer.html') ?>
