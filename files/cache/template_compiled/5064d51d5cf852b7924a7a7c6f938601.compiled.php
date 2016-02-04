<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<div class="member_info_wrap">
    <h3 class="p_tit"><?php echo $__Context->lang->member_info ?></h3>
    	<table class="mb_tbl">
        <colgroup>
        	  <col style="width:140px">
        	  <col>
        	</colgroup>
    		<?php if($__Context->displayDatas&&count($__Context->displayDatas))foreach($__Context->displayDatas as $__Context->item){ ?><tr>
    			<th scope="row" ><?php echo $__Context->item->title ?> <?php if($__Context->item->required || $__Context->item->mustRequired){ ?><em>*</em><?php } ?></th>
    			<td class="text"><?php echo $__Context->item->value ?></td>
    		</tr><?php } ?>
    		<tr>
    			<th scope="row"><?php echo $__Context->lang->member_group ?></th>
    			<td class="text"><?php echo implode(', ', $__Context->memberInfo['group_list']) ?></td>
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
        
   <p class="info_msg msg2" style="margin-top: 30px">
		비밀번호를 변경하시려면? <a href="<?php echo getUrl('act','dispMobileexModifyPassword','member_srl','') ?>" title="<?php echo $__Context->lang->cmd_modify_member_password ?>"><?php echo $__Context->lang->cmd_modify_member_password ?></a>
	</p>
</div>
