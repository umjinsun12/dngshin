<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/textmessage/tpl','header.html') ?>
<?php Context::addJsFile("modules/textmessage/ruleset/insert_config.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" class="form" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insert_config" />
	<input type="hidden" name="module" value="textmessage" />
	<input type="hidden" name="act" value="procTextmessageAdminInsertConfig" />
	<fieldset class="section">
		<h2 class="h2"><?php echo $__Context->lang->configuration ?></h2>
		<ul>
			<li>
				<p class="q"><?php echo $__Context->lang->service_api_key ?></p>
				<p class="a">
					<input id="api_key" type="text" name="api_key" value="<?php echo $__Context->config->api_key ?>" />
					<p><?php echo $__Context->lang->about_api_key ?></p>
				</p>
			</li>
			<li>
				<p class="q"><?php echo $__Context->lang->service_api_secret ?></p>
				<p class="a">
					<input id="api_secret" type="text" name="api_secret" value="<?php echo $__Context->config->api_secret ?>" />
					<p><?php echo $__Context->lang->about_api_secret ?></p>
				</p>
			</li>
			<?php if(0){ ?><li>
				<p class="q"><?php echo $__Context->lang->callback_url ?></th>
				<p class="a">
					<input id="callback_url" type="text" <?php echo $__Context->callback_url_style ?> name="callback_url" value="<?php echo $__Context->callback_url ?>" />
					<p><?php echo $__Context->lang->about_callback_url ?></p>
				</p>
			</li><?php } ?>
		</tr>
		</ul>
	</fieldset>
	<div class="btnArea">
		<span class="btn"><input type="submit" value="<?php echo $__Context->lang->cmd_save ?>" /></span>
	</div>
</form>
