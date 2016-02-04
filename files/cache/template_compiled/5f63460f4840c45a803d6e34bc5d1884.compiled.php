<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1><?php echo $__Context->lang->krzip ?></h1>
</div>
<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/krzip/tpl/index/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<section class="section">
	<?php Context::addJsFile("modules/krzip/ruleset/configKrzip.xml", FALSE, "", 0, "body", TRUE, "") ?><form  class="x_form-horizontal" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="configKrzip" />
		<input type="hidden" name="module" value="krzip" />
		<input type="hidden" name="act" value="procKrzipAdminInsertConfig" />
		<input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
		<input type="hidden" name="xe_validator_id" value="modules/krzip/tpl/index/1" />
		
		<div class="x_control-group">
			<label class="x_control-label" for="hostname"><?php echo $__Context->lang->krzip_server_hostname ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input id="hostname" type="text" name="krzip_server_hostname" value="<?php echo htmlspecialchars($__Context->config->krzip_server_hostname?$__Context->config->krzip_server_hostname:'krzip.xpressengine.com') ?>" class="inputTypeText w400" />
					<p class="x_help-block"><?php echo $__Context->lang->about_krzip_server_hostname ?></p>
				</label>
			</div>
		</div>
	
		<div class="x_control-group">
			<label class="x_control-label" for="query"><?php echo $__Context->lang->krzip_server_query ?></label>
			<div class="x_controls">
				<label class="x_inline">
					<input id="query" type="text" name="krzip_server_query" value="<?php echo htmlspecialchars($__Context->config->krzip_server_query?$__Context->config->krzip_server_query:'/server.php') ?>" class="inputTypeText w400"/> 
					<p class="x_help-block"><?php echo $__Context->lang->about_krzip_server_query ?></p>
				</label>
			</div>
		</div>
		<div class="btnArea x_clearfix">
			<button type="submit" class="x_btn x_btn-primary x_pull-right"><?php echo $__Context->lang->cmd_registration ?></button>
		</div>
	</form>
</section>
