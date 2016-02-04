<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/androidpushapp/tpl/css/ncenter_admin.css--><?php $__tmp=array('modules/androidpushapp/tpl/css/ncenter_admin.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/androidpushapp/tpl','header.html') ?>
<section class="section">
	<h1>푸시 결과 목록</h1>
	<?php if(!$__Context->androidpushapp_list){ ?><p class="x_well x_well-small">결과값이 없습니다.</p><?php } ?>
	<?php if($__Context->androidpushapp_list){ ?>
		<div class="x_clearfix">gcm 서버에서 발송된 푸시결과값일 뿐입니다. client측의 설정에 따라 알림이 안될 수도 있습니다.
			<?php Context::addJsFile("modules/androidpushapp/ruleset/cleanLogs.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="cleanLogs" />
				<fieldset>
					<input type="hidden" name="module" value="androidpushapp" />
					<input type="hidden" name="act" value="procAndroidpushappAdminDelete" />
					<button type="submit" class="x_btn">전체 삭제</button>					
				</fieldset>
			</form>
		</div>
		<table class="x_table x_table-striped x_table-hover" style="margin-top:20px;">
			<thead>
				<tr>
					<th scope="col" class="nowr" style="width:100px;">푸시날짜</th>
					<th scope="col" style="width:100px;">글/댓글 여부</th>
					<th scope="col" style="width:400px;">글/댓글 link</th>					
					<th scope="col" style="width:300px;">결과값</th>					
				</tr>
			</thead>
			<tbody>
				<?php if($__Context->androidpushapp_list&&count($__Context->androidpushapp_list))foreach($__Context->androidpushapp_list as $__Context->no => $__Context->val){ ?>				
				<tr>
					<td><?php echo zdate($__Context->val->push_date,"Y-m-d") ?>
						</br>
						<?php echo zdate($__Context->val->push_date,"H:i:s") ?></td>
					<td><?php echo $__Context->val->type ?></td>
					<td><?php if($__Context->val->type=="Message"||$__Context->val->type=="Test"){ ?>[<?php echo $__Context->val->target_browser ?>] <?php echo $__Context->val->target_title;
}else{ ?>
					<a href="<?php echo $__Context->val->target_url ?>" target=blank>[<?php echo $__Context->val->target_browser ?>] <?php echo $__Context->val->target_title ?></a><?php } ?></td>					
					<td><?php echo $__Context->val->text ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="x_pagination">
			<ul>
				<li><a href="<?php echo getUrl('page','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a></li>
				<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
					<?php if($__Context->page == $__Context->page_no){ ?>
						<li class="x_active"><a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
					<?php }else{ ?>
						<li><a href="<?php echo getUrl('page',$__Context->page_no) ?>"><?php echo $__Context->page_no ?></a></li>
					<?php } ?>
				<?php } ?>
				<li><a href="<?php echo getUrl('page',$__Context->page_navigation->last_page) ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a></li>
			</ul>
		</div>
	<?php } ?>
</section>