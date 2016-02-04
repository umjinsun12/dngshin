<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/epay/tpl','header.html') ?>
<!--#Meta:modules/epay/tpl/js/pluginlist.js--><?php $__tmp=array('modules/epay/tpl/js/pluginlist.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
        <p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<table cellspacing="0" class="x_table x_table-striped x_table-hover">
	<thead>
	    <tr>
		<th scope="col"><div><?php echo $__Context->lang->no ?></div></th>
		<th scope="col"><div><?php echo $__Context->lang->plugin_id ?></div></th>
		<th scope="col"><div><?php echo $__Context->lang->title ?></div></th>
		<th scope="col"><div><?php echo $__Context->lang->regdate ?></div></th>
		<th scope="col"><div><?php echo $__Context->lang->cmd_modify ?></div></th>
		<th scope="col"><div><?php echo $__Context->lang->cmd_delete ?></div></th>
	    </tr>
	</thead>
	<tbody>
	    <?php if($__Context->plugins&&count($__Context->plugins))foreach($__Context->plugins as $__Context->no => $__Context->val){ ?>
	    <tr class="row<?php echo $__Context->cycle_idx ?>">
		<td class="number center"><?php echo $__Context->no ?></td>
		<td>
		    <?php echo $__Context->val->plugin ?>
		</td>
		<td class="wide"><?php echo htmlspecialchars($__Context->val->title) ?></td>
		<td class="nowrap"><?php echo zdate($__Context->val->regdate,"Y-m-d") ?></td>
		<td>
				<a href="<?php echo getUrl('act','dispEpayAdminUpdatePlugin','plugin_srl',$__Context->val->plugin_srl) ?>"><span><?php echo $__Context->lang->cmd_modify ?></span></a>
		</td>
		<td>
			<a href="#deleteInstance" class="modalAnchor deleteInstance" data-plugin-srl="<?php echo $__Context->val->plugin_srl ?>"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
		</td>
	    </tr>
	    <?php } ?>
	</tbody>
</table>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/epay/tpl','_page_navigation.html') ?>
<div class="x_btn-gruop x_pull-right">
	<a href="<?php echo getUrl('act','dispEpayAdminInsertPlugin','plugin_srl','') ?>" class="x_btn"><span><?php echo $__Context->lang->cmd_make ?></span></a>
</div>
<div class="x_modal" id="deleteInstance">
        <form action="./" class="fg form" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
                <input type="hidden" name="module" value="epay" />
                <input type="hidden" name="act" value="procEpayAdminDeletePlugin" />
                <div id="deleteForm">
                </div>
        </form>
</div>
