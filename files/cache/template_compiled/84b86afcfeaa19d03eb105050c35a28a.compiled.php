<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/dgibi/skins/default','_head.html') ?>
 
<table>
	<caption>total: <?php echo number_format($__Context->total_count) ?></caption>
	<tr>
		<th><?php echo $__Context->lang->no ?></th>
		<th><?php echo $__Context->lang->title ?></th>
		<th><?php echo $__Context->lang->user_name ?></th>
		<th><?php echo $__Context->lang->date ?></th>
		<th><?php echo $__Context->lang->readed_count ?></th>
	</tr>
	<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><tr>
		<td><?php echo $__Context->no ?></td>
		<td>
			<a href="<?php echo getUrl('document_srl', $__Context->document->get('document_srl')) ?>">
				<?php echo $__Context->document->getTitle() ?>
			</a>
		</td>
		<td><?php echo $__Context->document->getNickName() ?></td>
		<td><?php echo $__Context->document->getRegdate('Y.m.d') ?></td>
		<td><?php echo number_format($__Context->document->get('readed_count')) ?></td>
	</tr><?php } ?>
</table>
 
<?php if($__Context->total_count > 0){ ?><div>
	<a href="<?php echo getUrl('page', '') ?>"><?php echo $__Context->lang->first_page ?></a>
	<?php while($__Context->page_no=$__Context->page_navigation->getNextPage()){ ?>
		<?php if($__Context->page == $__Context->page_no){ ?><strong><?php echo $__Context->page_no ?></strong><?php } ?>
		<?php if($__Context->page != $__Context->page_no){ ?><a href="<?php echo getUrl('page', $__Context->page_no) ?>"><?php echo $__Context->page_no ?></a><?php } ?>
	<?php } ?>
	<a href="<?php echo getUrl('page', $__Context->page_navigation->last_page) ?>"><?php echo $__Context->lang->last_page ?></a>
</div><?php } ?>
 
<a href="<?php echo getUrl('', 'mid', $__Context->mid, 'act', 'dispDgibiWrite') ?>"><?php echo $__Context->lang->cmd_write ?></a>