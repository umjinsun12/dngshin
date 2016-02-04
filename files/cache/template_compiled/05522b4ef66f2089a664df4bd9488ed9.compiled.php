<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/authentication/tpl','header.html') ?>
<!--#Meta:modules/authentication/tpl/css/config.css--><?php $__tmp=array('modules/authentication/tpl/css/config.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<form action="./" class="x_form-horizontal" method="get"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<input type="hidden" name="act" value="dispAuthenticationAdminAuthcodeList" />
		<input type="hidden" name="search_key" value="Y" />
		<input type="hidden" name="error_return_url" value="" />
	<section class="section">
		<div class="x_control-group">
			<label class="x_control-label">인증완료</label>
			<div class="x_controls">
				<select name="n_authcode_pass">
					<option value=""> 선택 </option>
					<option value="Y"<?php if($__Context->n_authcode_pass == 'Y'){ ?> selected="selected"<?php } ?>>인증완료</option>
					<option value="N"<?php if($__Context->n_authcode_pass == 'N'){ ?> selected="selected"<?php } ?>>인증미완료</option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">휴대폰 번호</label>		
			<div class="x_controls">
				<input type="text" name="n_phone_number" value="<?php echo $__Context->n_phone_number ?>" />
			</div>
		</div>
		<button class="x_btn" type="submit" >조회</button>
	</section>
	
	<section class="section">
 	<caption style="text-align:right; margin-bottom:10px;">Total <?php echo number_format($__Context->total_count) ?>, Page <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?></caption>	
		<table class="x_table">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">휴대폰번호.</th>
					<th scope="col">인증번호.</th>
					<th scope="col">인증완료.</th>
					<th scope="col">날짜</th>
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->authcode_list&&count($__Context->authcode_list))foreach($__Context->authcode_list as $__Context->no=>$__Context->val){ ?><tr>
					<td><?php echo $__Context->no ?></td>
					<td><?php echo $__Context->val->clue ?></td>
					<td><?php echo $__Context->val->authcode ?></td>
					<td><?php echo $__Context->val->passed ?></td>
					<td><?php echo zdate($__Context->val->regdate) ?></td>	
				</tr><?php } ?>
			</tbody>
		</table>
	</section>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/authentication/tpl','_page_navigation.html') ?>
<!-- 페이지 네비게이션 -->
<?php if(0){ ?><div class="x_clearfix">
    <a href="<?php echo getUrl('page','','module_srl','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
    <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
        <?php if($__Context->page == $__Context->page_no){ ?>
            <strong><?php echo $__Context->page_no ?></strong> 
        <?php }else{ ?>
            <a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a> 
        <?php } ?>
    <?php } ?>
    <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
</div><?php } ?>
