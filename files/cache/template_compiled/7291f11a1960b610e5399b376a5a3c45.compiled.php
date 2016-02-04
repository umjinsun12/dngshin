<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/authentication/tpl','header.html') ?>
<?php Context::loadLang('modules/authentication/lang'); ?>
<form class="x_form-horizontal" action="./" method="post"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="act" value="procAuthenticationAdminDesignConfig" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="module_srl" value=<?php echo $__Context->module_srl ?> />
	<section class="section">
		<h1>디자인 설정</h1>
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl">레이아웃</label>
			<div class="x_controls">
				<select name="layout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->config->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#layout_srl_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="layout_srl_help" class="x_help-block" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>		
		<div class="x_control-group">
			<label class="x_control-label">스킨</label>
			<div class="x_controls">
				<select name="skin">
					<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<a href="#skin_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="skin_help" class="x_help-block" hidden><?php echo $__Context->lang->about_skin ?></p>
			</div>
		</div>		
		<div class="x_control-group">
			<label class="x_control-label">모바일 레이아웃</label>
			<div class="x_controls">
				<select name="mlayout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->val->layout_srl == $__Context->config->mlayout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">모바일 스킨</label>
			<div class="x_controls">
				<select name="mskin">
					<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin==$__Context->key){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">가로길이</label>
			<div class="x_controls">
				<input type="text" size="5" name="width" value="<?php echo $__Context->config->width ?>" />
				<a href="#width_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="width_help" class="x_help-block" hidden>가로너비를 설정하실 수 있습니다. 90% 혹은 650px 와 같이 입력해 주세요.</p>
			</div>
		</div>
	</section>
	<div class="btnArea">
		<button type="submit" class="x_btn">저장</button>
	</div>
</form>
