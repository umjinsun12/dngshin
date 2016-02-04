<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/krzip/tpl/css/krzip.css--><?php $__tmp=array('modules/krzip/tpl/css/krzip.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
			
			<div class="krZip">
				<input type="hidden" class="addr_first" name="<?php echo $__Context->krzip->column_name ?>[]" value="<?php echo $__Context->krzip->values[0] ?>" />
				<input type="hidden" class="addr_second" name="<?php echo $__Context->krzip->column_name ?>[]" value="<?php echo $__Context->krzip->values[1] ?>" />
				
				<div class="addr_indicator box">
					<input type="text" class="current_address" readonly="readonly" value="<?php echo $__Context->krzip->values[0] ?> <?php echo $__Context->krzip->values[1] ?>">
					<button type="button" class="btn delete"><?php echo $__Context->lang->cmd_delete ?></button>
					<button type="button" class="btn cancel"><?php echo $__Context->lang->cmd_cancel ?></button>
				</div>
				
				<div class="addr1_selector box" style="display:none;">
					<p><?php echo $__Context->lang->cmd_kr_address_addr1 ?></p>
					<ul>
					</ul>
				</div>
				<div class="addr2_selector box" style="display:none;">
					<p><?php echo $__Context->lang->cmd_kr_address_addr2 ?></p>
					<ul>
					</ul>
				</div>
				
				<div class="addr3_input box" style="display:none;">
					<p><?php echo $__Context->lang->cmd_kr_address_detail ?></p>
					<input type="text" value="" class="addr3_input" />
					<button type="button" class="btn submit_addr3">검색</button>
					<p class="info_search">
						<?php echo $__Context->lang->about_kr_address_detail ?>
					</p>
				</div>
				<div class="addr3_selector box" style="display:none;">
					<p>'<strong></strong>'<?php echo $__Context->lang->cmd_select_detail_address ?></p>
					<div class="wrap">
						<div class="scroll_head"></div>
						<div class="scroll_body">
							<table>
								<thead>
									<tr>
										<th><div class="th_inner"><?php echo $__Context->lang->street_house_address ?></div></th>
										<th><div class="th_inner"><?php echo $__Context->lang->zipcode ?></div></th>
										<th><div class="th_inner"><?php echo $__Context->lang->cmd_select ?></div></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="scroll_foot">
							<p class="nomore" style="display:none;"><?php echo $__Context->lang->msg_nomore_address ?></p>
							<p class="islast" style="display:none;"> </p>
							<button type="button" class="btn more_search"><?php echo $__Context->lang->more ?></button>
						</div>
					</div>
				</div>
				
				<div class="addr4_input box" style="display:none;">
					<p><?php echo $__Context->lang->cmd_kr_address_etc ?></p>
					<input type="text" value="" class="addr4_input">
					<button type="button" class="btn submit_addr4"><?php echo $__Context->lang->cmd_complete ?></button>
				</div>
			</div>
			<script>
				jQuery('.krZip').krZip({api_url: '<?php echo $__Context->krzip->api_url ?>'});
			</script>
			
			
			