<?php if(!defined("__XE__"))exit;?><table>
	<thead>
		<tr>
			<th><?php echo $__Context->lang->item_code ?></th>
			<th><?php echo $__Context->lang->product_name ?></th>
			<th><?php echo $__Context->lang->tax_or_not ?></th>
			<th><?php echo $__Context->lang->display_or_not ?></th>
			<th><?php echo $__Context->lang->price ?></th>
		</tr>
	</thead>
	<?php $__Context->total_price=0 ?>
	<tbody>
		<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->no=>$__Context->val){ ?><tr>
			<?php if($__Context->val->taxfree=='Y'){;
$__Context->taxfree=$__Context->lang->no_taxation;
} ?>
			<?php if($__Context->val->taxfree=='N'){;
$__Context->taxfree=$__Context->lang->taxation;
} ?>
			<?php if($__Context->val->display=='Y'){;
$__Context->display=$__Context->lang->display;
} ?>
			<?php if($__Context->val->display=='N'){;
$__Context->display=$__Context->lang->not_display;
} ?>
			<td><?php echo $__Context->val->item_code ?></td>
			<td><?php echo $__Context->val->item_name ?></td>
			<td><?php echo $__Context->taxfree ?></td>
			<td><?php echo $__Context->display ?></td>
			<td><?php echo $__Context->val->price ?></td>
		</tr><?php } ?>
	</tbody>
</table>
