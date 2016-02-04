<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board_extend/tpl','header.html') ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<div class="table even">
	<form class="form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<table width="100%" border="1" cellspacing="0">
			<caption>
				Total: <?php echo number_format($__Context->total_count) ?>, Page: <?php echo number_format($__Context->page) ?>/<?php echo number_format($__Context->total_page) ?>
			</caption>
			<thead>
				<tr>
					<th scope="col" class="nowr"><?php echo $__Context->lang->no ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->module_category ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->mid ?></th>
					<th scope="col" class="title"><?php echo $__Context->lang->browser_title ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->regdate ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->cmd_setup ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th scope="col" class="nowr"><?php echo $__Context->lang->no ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->module_category ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->mid ?></th>
					<th scope="col" class="title"><?php echo $__Context->lang->browser_title ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->regdate ?></th>
					<th scope="col" class="nowr"><?php echo $__Context->lang->cmd_setup ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php if($__Context->board_list&&count($__Context->board_list))foreach($__Context->board_list as $__Context->no=>$__Context->val){ ?><tr>
					<td class="nowr"><?php echo $__Context->no ?></td>
					<td class="nowr">
						<?php if(!$__Context->val->module_category_srl){ ?>
							<?php if($__Context->val->site_srl){;
echo $__Context->lang->virtual_site;
} ?>
							<?php if(!$__Context->val->site_srl){;
echo $__Context->lang->not_exists;
} ?>
						<?php } ?>
						<?php if($__Context->val->module_category_srl){;
echo $__Context->module_category[$__Context->val->module_category_srl]->title;
} ?>
					</td>
					<td class="nowr"><?php echo $__Context->val->mid ?></td>
					<td class="title"><a href="<?php echo getSiteUrl($__Context->val->domain,'','mid',$__Context->val->mid) ?>" target="_blank"><?php echo $__Context->val->browser_title ?></a></td>
					<td class="nowr"><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
					<td class="nowr"><a href="<?php echo getUrl('act','dispBoard_extendAdminBoardModify','module_srl',$__Context->val->module_srl) ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><?php echo $__Context->lang->cmd_setup ?></a></td>
				</tr><?php } ?>
			</tbody>
		</table>
	</form>
</div>
<div class="search">
	<form action="" class="pagination"><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="error_return_url" value="" />
		<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
		<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<?php if($__Context->search_keyword){ ?><input type="hidden" name="search_keyword" value="<?php echo $__Context->search_keyword ?>" /><?php } ?>
		<?php if($__Context->search_target){ ?><input type="hidden" name="search_target" value="<?php echo $__Context->search_target ?>" /><?php } ?>
		<a href="<?php echo getUrl('page', '') ?>" class="direction">&laquo; FIRST</a>
		<?php if($__Context->page_navigation->first_page + $__Context->page_navigation->page_count > $__Context->page_navigation->last_page && $__Context->page_navigation->page_count != $__Context->page_navigation->total_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<a href="<?php echo getUrl('page', '') ?>">1</a>
			<a href="#goTo" class="tgAnchor" title="<?php echo $__Context->lang->cmd_go_to_page ?>">...</a>
		<?php } ?>
		<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
			<?php $__Context->last_page = $__Context->page_no ?>
			<?php if($__Context->page_no == $__Context->page){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
			<?php if($__Context->page_no != $__Context->page){ ?><a href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
		<?php } ?>
		<?php if($__Context->last_page != $__Context->page_navigation->last_page){ ?>
			<?php $__Context->isGoTo = true ?>
			<a href="#goTo" class="tgAnchor" title="<?php echo $__Context->lang->cmd_go_to_page ?>">...</a>
			<a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>"><?php echo $__Context->page_navigation->last_page ?></a>
		<?php } ?>
		<a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>" class="direction">LAST &raquo;</a>
		<?php if($__Context->isGoTo){ ?><span id="goTo" class="tgContent">
			<input name="page" title="<?php echo $__Context->lang->cmd_go_to_page ?>" />
			<button type="submit">Go</button>
		</span><?php } ?>
	</form>
	<form action="./" method="get" class="adminSearch" onsubmit="return checkSearch(this)" ><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<input type="hidden" name="error_return_url" value="" />
		<?php if(count($__Context->module_category)){ ?><select name="module_category_srl">
			<option value=""><?php echo $__Context->lang->module_category ?></option>
			<option value="0"<?php if($__Context->module_category_srl==='0'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->not_exists ?></option>
			<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>" <?php if($__Context->module_category==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
		</select><?php } ?>
		<select name="search_target">
			<option value=""><?php echo $__Context->lang->search_target ?></option>
			<option value="mid"<?php if($__Context->search_target=='mid'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->mid ?></option>
			<option value="browser_title"<?php if($__Context->search_target=='browser_title'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->browser_title ?></option>
		</select>
		<input type="text" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" />
		<input type="submit" value="<?php echo $__Context->lang->cmd_search ?>" />
		<a href="<?php echo getUrl('', 'module', $__Context->module, 'act', $__Context->act) ?>"><?php echo $__Context->lang->cmd_cancel ?></a>
	</form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/module/tpl','include.manage_selected.html') ?>
