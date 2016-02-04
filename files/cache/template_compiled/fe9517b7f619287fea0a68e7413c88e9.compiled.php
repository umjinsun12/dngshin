<?php if(!defined("__XE__"))exit;?><h2><?php echo $__Context->lang->title_member_info ?></h2>
<table class="x_table x_table-striped x_table-hover">
	<tr>
		<th style="width:120px"><?php echo $__Context->lang->signup_date ?></th>
		<td><?php echo zdate($__Context->memberInfo[regdate],"Y-m-d") ?></td>
	</tr>
	<tr>
		<th><?php echo $__Context->lang->last_login ?></th>
		<td><?php echo zdate($__Context->memberInfo[last_login],"Y-m-d H:i:s") ?></td>
	</tr>
	<?php if($__Context->displayDatas&&count($__Context->displayDatas))foreach($__Context->displayDatas as $__Context->item){ ?><tr>
		<th scope="row" ><?php if($__Context->item->required || $__Context->item->mustRequired){ ?><em style="color:red">*</em><?php } ?> <?php echo $__Context->item->title ?></th>
		<td class="text"><?php echo $__Context->item->value ?></td>
	</tr><?php } ?>
	<tr>
		<th scope="row"><?php echo $__Context->lang->member_group ?></th>
		<td class="text"><?php echo implode(', ', $__Context->memberInfo['group_list']) ?></td>
	</tr>
	<tr>
		<th scope="row"><?php echo $__Context->lang->allow_mailing ?></th>
		<td class="text"><?php if($__Context->memberInfo['allow_mailing'] == 'Y'){;
echo $__Context->lang->cmd_yes;
}else{;
echo $__Context->lang->cmd_no;
} ?></td>
	</tr>
	<tr>
		<th scope="row"><?php echo $__Context->lang->allow_message ?></th>
		<td class="text"><?php echo $__Context->lang->allow_message_type[$__Context->memberInfo['allow_message']] ?></td>
	</tr>
	<?php if($__Context->memberInfo['is_admin'] == 'Y'){ ?><tr>
		<th scope="row"><?php echo $__Context->lang->is_admin ?></th>
		<td class="text"><?php echo $__Context->lang->cmd_yes ?></td>
	</tr><?php } ?>
	<tr>
		<th scope="row"><?php echo $__Context->lang->member_group ?></th>
		<td class="text"><?php echo implode(', ', $__Context->memberInfo['group_list']) ?></td>
	</tr>
	<?php if($__Context->memberInfo['description']){ ?><tr>
		<th scope="row"><div><?php echo $__Context->lang->description ?></div></th>
		<td><?php echo $__Context->memberInfo['description'] ?>&nbsp;</td>
	</tr><?php } ?>
	<style scoped>
	.x_table th{text-align:right}
	</style>
</table>
<h2><?php echo $__Context->lang->title_purchase_details ?></h2>
<table class="x_table">
	<thead>
		<tr>
			<th>주문번호</th>
			<th>주문일시</th>
			<th>상품</th>
			<th><?php echo $__Context->lang->quantity ?></th>
			<th><?php echo $__Context->lang->amount ?></th>
			<th><?php echo $__Context->lang->order_status ?></th>
			<th>확장</th>
		</tr>
	</thead>
	<?php $__Context->total_price=0 ?>
	<tbody>
		<?php if($__Context->order_list&&count($__Context->order_list))foreach($__Context->order_list as $__Context->key=>$__Context->order_info){ ?><tr>
			<td><?php echo $__Context->order_info->order_srl ?></td>
			<td><?php echo zdate($__Context->order_info->regdate,'Y-m-d') ?></td>
			<td><?php echo $__Context->order_info->title ?></td>
			<td><?php echo $__Context->order_info->item_count ?></td>
			<td><?php echo number_format($__Context->order_info->total_discounted_price) ?></td>
			<td><?php echo $__Context->order_status[$__Context->order_info->order_status] ?></td>
			<td>
				<?php $__Context->extra_vars = unserialize($__Context->order_info->extra_vars) ?>
				<?php if($__Context->extra_vars&&count($__Context->extra_vars))foreach($__Context->extra_vars as $__Context->extra_key=>$__Context->extra_val){ ?>
					<?php if(is_array($__Context->extra_val)){ ?><span><?php echo implode(' ', $__Context->extra_val) ?></span><?php } ?>
					<?php if(!is_array($__Context->extra_val)){ ?><span><?php echo $__Context->extra_val ?></span><?php } ?>
				<?php } ?>
			</td>
			<?php $__Context->total_price+=$__Context->order_info->total_discounted_price ?>
		</tr><?php } ?>
		<?php if(!count($__Context->order_list)){ ?><tr>
			<td colspan="7"><?php echo $__Context->lang->msg_no_orders ?></td>
		</tr><?php } ?>
	</tbody>
</table>
<div>Total : <?php echo number_format($__Context->total_price) ?></div>
