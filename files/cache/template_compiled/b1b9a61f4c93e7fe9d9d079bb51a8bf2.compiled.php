<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/tpl','header.html') ?>
<!--#Meta:modules/widget/tpl/js/widget_admin.js--><?php $__tmp=array('modules/widget/tpl/js/widget_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->xe_ver > 4){ ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<?php Context::addJsFile("modules/mobileex/ruleset/insertConfig.xml", FALSE, "", 0, "body", TRUE, "") ?><form  action="./" method="post" class="form" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insertConfig" />
<input type="hidden" name="act" value="procMobileexAdminInsertConfig" />
<input type="hidden" name="module" value="admin" />
<input type="hidden" name="target_module_srl" id="target_module_srl" value="<?php echo $__Context->config->target_module_srl ?>" />
<?php }else{ ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/mobileex/tpl/filter','insert_config.xml');$__xmlFilter->compile(); ?>
<form action="./" method="get" onsubmit="return procFilter(this, insert_config)">
<input type="hidden" name="target_module_srl" id="target_module_srl" value="<?php echo $__Context->config->target_module_srl ?>" />
<?php } ?>
	<div class="table">
		<table width="100%" border="1" cellspacing="0" class="rowTable">
			
		<tr>
			<th scope="row"><label for="file_config_use"><?php echo $__Context->lang->file_config_use ?></label></th>
			<td class="text">
				<input type="radio" name="file_config_use" value="Y" id="file_config_use_y"<?php if($__Context->config->file_config_use == 'Y'){ ?> checked="checked"<?php } ?> /> <label for="file_config_use_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="file_config_use" value="N" id="file_config_use_n"<?php if($__Context->config->file_config_use == 'N'){ ?> checked="checked"<?php } ?> /> <label for="file_config_use_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_mobile_each_config ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="allowed_filesize"><?php echo $__Context->lang->allowed_filesize ?></label></th>
			<td class="text">
				<input type="text" name="allowed_filesize" id="allowed_filesize" value="<?php echo $__Context->config->allowed_filesize ?>"  size="3" style="width:30px" /> MB
				<p class="desc"><?php echo $__Context->lang->about_allowed_filesize ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="allowed_attach_size"><?php echo $__Context->lang->allowed_attach_size ?></label></th>
			<td class="text">
				<input type="text" name="allowed_attach_size" id="allowed_attach_size" value="<?php echo $__Context->config->allowed_attach_size ?>" size="3" style="width:30px" /> MB
				/ <?php echo ini_get('upload_max_filesize') ?>
				<p class="desc"><?php echo $__Context->lang->about_allowed_attach_size ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="allowed_filetypes"><?php echo $__Context->lang->allowed_filetypes ?></label></th>
			<td class="text">
				<input type="text" name="allowed_filetypes" id="allowed_filetypes" value="<?php echo $__Context->config->allowed_filetypes ?>" />
				<p class="desc"><?php echo $__Context->lang->about_allowed_filetypes ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="img_resize_width"><?php echo $__Context->lang->img_resize_width ?></label></th>
			<td class="text">
				<input type="text" name="img_resize_width" id="img_resize_width" value="<?php if($__Context->config->img_resize_width){;
echo $__Context->config->img_resize_width;
}else{ ?>0<?php } ?>" />
				<p class="desc"><?php echo $__Context->lang->about_img_resize_width ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="img_resize_height"><?php echo $__Context->lang->img_resize_height ?></label></th>
			<td class="text">
				<input type="text" name="img_resize_height" id="img_resize_height" value="<?php if($__Context->config->img_resize_height){;
echo $__Context->config->img_resize_height;
}else{ ?>0<?php } ?>" />
				<p class="desc"><?php echo $__Context->lang->about_img_resize_height ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_use"><?php echo $__Context->lang->addfile_use ?></label></th>
			<td class="text">
				<input type="radio" name="addfile_use" value="Y" id="addfile_use_y"<?php if($__Context->config->addfile_use == 'Y' || !$__Context->config->addfile_use){ ?> checked="checked"<?php } ?> /> <label for="addfile_use_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="addfile_use" value="N" id="addfile_use_n"<?php if($__Context->config->addfile_use == 'N'){ ?> checked="checked"<?php } ?> /> <label for="addfile_use_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_addfile_use ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_auto"><?php echo $__Context->lang->addfile_auto ?></label></th>
			<td class="text">
				<input type="radio" name="addfile_auto" value="Y" id="addfile_auto_y"<?php if($__Context->config->addfile_auto == 'Y'){ ?> checked="checked"<?php } ?> /> <label for="addfile_auto_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="addfile_auto" value="N" id="addfile_auto_n"<?php if($__Context->config->addfile_auto == 'N' || !$__Context->config->addfile_auto){ ?> checked="checked"<?php } ?> /> <label for="addfile_auto_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_addfile_auto ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="pcimg_view"><?php echo $__Context->lang->pcimg_view ?></label></th>
			<td class="text">
				<input type="radio" name="pcimg_view" value="Y" id="pcimg_view_y"<?php if($__Context->config->pcimg_view == 'Y' || !$__Context->config->pcimg_view){ ?> checked="checked"<?php } ?> /> <label for="pcimg_view_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="pcimg_view" value="N" id="pcimg_view_n"<?php if($__Context->config->pcimg_view == 'N'){ ?> checked="checked"<?php } ?> /> <label for="pcimg_view_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_pcimg_view ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_thumb_use"><?php echo $__Context->lang->addfile_thumb_use ?></label></th>
			<td class="text">
				<input type="radio" name="addfile_thumb_use" value="Y" id="addfile_thumb_use_y"<?php if($__Context->config->addfile_thumb_use == 'Y' || !$__Context->config->addfile_thumb_use){ ?> checked="checked"<?php } ?> /> <label for="addfile_thumb_use_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="addfile_thumb_use" value="N" id="addfile_thumb_use_n"<?php if($__Context->config->addfile_thumb_use == 'N'){ ?> checked="checked"<?php } ?> /> <label for="addfile_thumb_use_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_addfile_thumb_use ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_thumb_size"><?php echo $__Context->lang->addfile_thumb_size ?></label></th>
			<td class="text">
				<input type="text" name="addfile_thumb_size" id="addfile_thumb_size" value="<?php if($__Context->config->addfile_thumb_size){;
echo $__Context->config->addfile_thumb_size;
}else{ ?>700<?php } ?>" />
				<p class="desc"><?php echo $__Context->lang->about_addfile_thumb_size ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_btn"><?php echo $__Context->lang->addfile_btn ?></label></th>
			<td class="text">
				<input type="radio" name="addfile_btn" value="Y" id="addfile_btn_y"<?php if($__Context->config->addfile_btn == 'Y' || !$__Context->config->addfile_btn){ ?> checked="checked"<?php } ?> /> <label for="addfile_btn_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="addfile_btn" value="N" id="addfile_btn_n"<?php if($__Context->config->addfile_btn == 'N'){ ?> checked="checked"<?php } ?> /> <label for="addfile_btn_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_addfile_btn ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_view_type"><?php echo $__Context->lang->addfile_view_type ?></label></th>
			<td class="text">
				<input type="radio" name="addfile_view_type" value="F" id="addfile_view_type_f"<?php if($__Context->config->addfile_view_type == 'F'){ ?> checked="checked"<?php } ?> /> <label for="addfile_view_type_f"><?php echo $__Context->lang->cmd_full ?></label>
				<input type="radio" name="addfile_view_type" value="S" id="addfile_view_type_s"<?php if($__Context->config->addfile_view_type == 'S' || !$__Context->config->addfile_view_type){ ?> checked="checked"<?php } ?> /> <label for="addfile_view_type_s"><?php echo $__Context->lang->cmd_small ?></label>
				<p class="desc"><?php echo $__Context->lang->about_addfile_view_type ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="addfile_min_size"><?php echo $__Context->lang->addfile_min_size ?></label></th>
			<td class="text">
				<input type="text" name="addfile_min_size" id="addfile_min_size" value="<?php if($__Context->config->addfile_min_size){;
echo $__Context->config->addfile_min_size;
}else{ ?>120<?php } ?>" />
				<p class="desc"><?php echo $__Context->lang->about_addfile_min_size ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="pcmode_addfile_view"><?php echo $__Context->lang->pcmode_addfile_view ?></label></th>
			<td class="text">
				<input type="radio" name="pcmode_addfile_view" value="Y" id="pcmode_addfile_view_y"<?php if($__Context->config->pcmode_addfile_view == 'Y' || !$__Context->config->pcmode_addfile_view){ ?> checked="checked"<?php } ?> /> <label for="pcmode_addfile_view_y"><?php echo $__Context->lang->cmd_yes ?></label>
				<input type="radio" name="pcmode_addfile_view" value="N" id="pcmode_addfile_view_n"<?php if($__Context->config->pcmode_addfile_view == 'N'){ ?> checked="checked"<?php } ?> /> <label for="pcmode_addfile_view_n"><?php echo $__Context->lang->cmd_no ?></label>
				<p class="desc"><?php echo $__Context->lang->about_pcmode_addfile_view ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="mskin"><?php echo $__Context->lang->mobile_skin ?></label></th>
			<td class="text">
				 <select name="mskin" id="mskin">
                <?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?>
                <option value="<?php echo $__Context->key ?>" <?php if($__Context->module_info->mskin==$__Context->key ||(!$__Context->config->mskin && $__Context->key=='default')){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                <?php } ?>
            </select>
            <p class="desc"><?php echo $__Context->lang->about_mobileex_mskin ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="target"><?php echo $__Context->lang->mobile_integration_search ?> <?php echo $__Context->lang->target ?></label></th>
			<td class="text">
            <select name="target" id="target">
                <option value="include"><?php echo $__Context->lang->include_search_target ?></option>
                <option value="exclude" <?php if($__Context->config->target=='exclude'){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->exclude_search_target ?></option>
            </select>
            <select name="_target_module_srl" id="_target_module_srl" size="8" class="w200" style="display:block;margin:10px 0; min-width:300px;"></select>
            <a href="<?php echo getUrl('','module','module','act','dispModuleSelectList','id','target_module_srl') ?>" onclick="popopen(this.href, 'ModuleSelect');return false;" class="button blue"><span><?php echo $__Context->lang->cmd_insert ?></span></a>
            <a href="#" onclick="midRemove('target_module_srl');return false;" class="button red"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
            <script type="text/javascript">
                jQuery( function() { getModuleSrlList('target_module_srl'); } );
            </script>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php echo $__Context->lang->mobile_integration_search ?> <?php echo $__Context->lang->sample_code ?></th>
			<td class="text">
				<textarea class="inputTypeTextArea fullWidth" readonly="readonly" style="width:100%"><?php echo $__Context->sample_code ?></textarea>
				<p class="desc"><?php echo $__Context->lang->about_sample_code ?></p>
			</td>
		</tr>
		</table>
	</div>
	<div class="btnArea" style="padding-bottom:20px;text-align:center">
		<?php if($__Context->xe_ver > 4){ ?>
		<span class="btn"><input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" /></span>
		<?php }else{ ?>
		<span class="button black strong"><input type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" accesskey="s" /></span>
		<?php } ?>
	</div>
</form>
