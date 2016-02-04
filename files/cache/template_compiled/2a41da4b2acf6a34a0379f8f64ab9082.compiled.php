<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/epay/tpl/js/jquery.jtruncate.js--><?php $__tmp=array('modules/epay/tpl/js/jquery.jtruncate.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/epay/tpl/js/transactions.js--><?php $__tmp=array('modules/epay/tpl/js/transactions.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/epay/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
        <p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<div class="table even easyList">
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th><?php echo $__Context->lang->regdate ?></th>
				<th><?php echo $__Context->lang->page ?></th>
				<th><?php echo $__Context->lang->epay_module ?></th>
				<th><?php echo $__Context->lang->plugin ?></th>
				<th><?php echo $__Context->lang->order_number ?></th>
				<th><?php echo $__Context->lang->paymethod ?></th>
				<th><?php echo $__Context->lang->products_ordered ?></th>
				<th><?php echo $__Context->lang->payment_amount ?></th>
				<th><?php echo $__Context->lang->user_id ?></th>
				<th><?php echo $__Context->lang->user_name ?></th>
				<th><?php echo $__Context->lang->nick_name ?></th>
				<th><?php echo $__Context->lang->status ?></th>
				<th><?php echo $__Context->lang->pg_resultcode ?></th>
				<th><?php echo $__Context->lang->pg_resultmessage ?></th>
				<th><?php echo $__Context->lang->extension ?></th>
			</tr>
			<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->no=>$__Context->tran){ ?><tr>
				<td><?php echo $__Context->no ?></td>
				<td><?php echo zdate($__Context->tran->regdate) ?></td>
				<td><a href="<?php echo getUrl('','mid',$__Context->tran->mid) ?>" target="_blank"><?php echo $__Context->tran->browser_title ?></a></td>
				<td><a href="<?php echo getUrl('act','dispEpayAdminInsertEpay','module_srl',$__Context->tran->epay_module_srl) ?>" target="_blank"><?php echo $__Context->modinst_list[$__Context->tran->epay_module_srl]->browser_title ?></a></td>
				<td><a href="<?php echo getUrl('act','dispEpayAdminUpdatePlugin','plugin_srl',$__Context->tran->plugin_srl) ?>" target="_blank"><?php echo $__Context->tran->plugin_title ?></a></td>
				<td><?php echo $__Context->tran->order_srl ?></td>
				<td><?php echo $__Context->lang->payment_method[$__Context->tran->payment_method] ?></td>
				<td>
					<?php if($__Context->tran->target_act){ ?><a href="#viewOrderInfo" class="modalAnchor viewOrderInfo" data-target-module="<?php echo $__Context->tran->target_module ?>" data-target-act="<?php echo $__Context->tran->target_act ?>"  data-order-srl="<?php echo $__Context->tran->order_srl ?>"><?php echo $__Context->tran->order_title ?></a><?php } ?>
					<?php if(!$__Context->tran->target_act){;
echo $__Context->tran->order_title;
} ?>
				</td>
				<td><?php echo number_format($__Context->tran->payment_amount) ?></td>
				<?php if($__Context->tran->user_id){ ?>
					<td><a href="#popup_menu_area" class="cMenu member_<?php echo $__Context->tran->p_member_srl ?>"><?php echo $__Context->tran->user_id ?></a></td>
					<td><a href="#popup_menu_area" class="cMenu member_<?php echo $__Context->tran->p_member_srl ?>"><?php echo $__Context->tran->user_name ?></a></td>
					<td><a href="#popup_menu_area" class="cMenu member_<?php echo $__Context->tran->p_member_srl ?>"><?php echo $__Context->tran->nick_name ?></a></td>
				<?php } ?>
				<?php if(!$__Context->tran->user_id){ ?>
					<td colspan="3">탈퇴한 회원(<?php echo $__Context->tran->p_user_id ?>)</td>
				<?php } ?>
				<td>
					<select class="payment_state x_span1" data-transaction_srl="<?php echo $__Context->tran->transaction_srl ?>">
						<option<?php if($__Context->tran->state == '1'){ ?> selected="selected"<?php } ?> value="1" ><?php echo $__Context->lang->state_list['1'] ?></option>
						<option<?php if($__Context->tran->state == '2'){ ?> selected="selected"<?php } ?> value="2" ><?php echo $__Context->lang->state_list['2'] ?></option>
						<option<?php if($__Context->tran->state == '3'){ ?> selected="selected"<?php } ?> value="3" ><?php echo $__Context->lang->state_list['3'] ?></option>
					</select>
				</td>
				<td><?php echo $__Context->tran->result_code ?></td>
				<td><?php echo $__Context->tran->result_message ?></td>
				<td class="long_text"><?php if(unserialize($__Context->tran->extra_vars)&&count(unserialize($__Context->tran->extra_vars)))foreach(unserialize($__Context->tran->extra_vars) as $__Context->key=>$__Context->val){;
echo $__Context->key ?> : <?php if(is_array($__Context->val)){ ?><ul><?php if($__Context->val&&count($__Context->val))foreach($__Context->val as $__Context->key2=>$__Context->val2){ ?><li><?php echo $__Context->key2 ?> : <?php echo $__Context->val2 ?></li><?php } ?></ul><?php };
if(!is_array($__Context->val)){;
echo $__Context->val;
} ?><br /><?php } ?></td>
			</tr><?php } ?>
		</thead>
	</table>
</div>
<!-- 페이지 네비게이션 -->
<div class="pagination a1">
    <a href="<?php echo getUrl('page','','module_srl','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a>
    <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
        <?php if($__Context->page == $__Context->page_no){ ?>
            <strong><?php echo $__Context->page_no ?></strong>
        <?php }else{ ?>
            <a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a>
        <?php } ?>
    <?php } ?>
    <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
</div>
<form action="./" class="x_modal" method="post" id="viewOrderInfo"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<div class="x_modal-header">
		<h1>주문정보</h1>
	</div>
	<div id="orderInfo" class="x_modal-body" style="max-height:600px">
	</div>
</form>
<script>
xe.lang.msg_want_status_change = '<?php echo $__Context->lang->msg_want_status_change ?>';
xe.lang.success_changed = '<?php echo $__Context->lang->success_changed ?>';
jQuery(document).ready(function() {
    jQuery('.long_text').jTruncate({
        length: 200,
        minTrail: 0,
        moreText: "Read More",
        lessText: "Read Less"
	});
	jQuery(".payment_state").change(function (){
		if(confirm(xe.lang.msg_want_status_change))
		{
			var transaction_srl = jQuery(this).attr("data-transaction_srl");
			var state = jQuery(this).find("option:selected").val();
			var params = new Array();
			params['transaction_srl'] = transaction_srl;
			params['state'] = state;
			exec_xml('epay', 'procEpayUpdateState', params, function(){
				alert(xe.lang.success_changed);
			});
		}
		else location.reload();
	});
});
</script>
