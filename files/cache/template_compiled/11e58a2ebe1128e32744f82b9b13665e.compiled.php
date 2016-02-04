<?php if(!defined("__XE__"))exit;
require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/attendance/tpl/filter','insert_greetingsboard.xml');$__xmlFilter->compile(); ?>
<?php if(!$__Context->module){ ?>
    <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/attendance/tpl','header.html') ?>
<?php } ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
<!--출석게시판 설정-->
<form action="<?php echo getUrl('') ?>" method="post" onsubmit="return procFilter(this, insert_greetingsboard);" enctype="multipart/form-data" class="x_form-horizontal"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
    <input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
    <input type="hidden" name="type" value="<?php echo $__Context->type ?>" />
    <input type="hidden" name="selected_date" value="<?php echo $__Context->selected_date ?>" />
    <!--input type="hidden" name="page" value="<?php echo $__Context->page ?>" /-->
    <!--input type="hidden" name="module_srl" value="<?php echo $__Context->module_info->module_srl ?>" /-->
	<section class="section">
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl"><?php echo $__Context->lang->module_category ?></label>
			<div class="x_controls">
				<select name="module_category_srl" id="module_category_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"><?php echo $__Context->val->title ?></option><?php } ?>
				</select>
				<a href="#aboutcategory" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="aboutcategory" hidden><?php echo $__Context->lang->about_module_category ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->browser_title ?></label>
			<div class="x_controls">
				<input type="text" name="browser_title" id="browser_title" value="<?php echo htmlspecialchars($__Context->module_info->browser_title) ?>"  class="lang_code"/>
				<a href="#aboutBrowserTitle" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="aboutBrowserTitle" hidden><?php echo $__Context->lang->about_browser_title ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl"><?php echo $__Context->lang->layout ?></label>
			<div class="x_controls">
				<select name="layout_srl" id="layout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->layout_list&&count($__Context->layout_list))foreach($__Context->layout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->layout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#aboutLayout" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="aboutLayout" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="skin"><?php echo $__Context->lang->skin ?></label>
			<div class="x_controls">
				<select name="skin" id="skin" style="width:auto">
					<?php if($__Context->skin_list&&count($__Context->skin_list))foreach($__Context->skin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->skin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->key ?>)</option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->mobile_view ?></label>
			<div class="x_controls">
				<select name="use_mobile" id="skin" style="width:auto">
					<option value="Y"<?php if($__Context->module_info->use_mobile == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->use ?></option>
					<option value="N"<?php if($__Context->module_info->use_mobile == 'N'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->notuse ?></option>
				</select>
				<a href="#mobile_view_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="mobile_view_help" class="x_help-block" hidden><?php echo $__Context->lang->about_mobile_view ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="layout_srl"><?php echo $__Context->lang->mobile_layout ?></label>
			<div class="x_controls">
				<select name="mlayout_srl" id="layout_srl">
					<option value="0"><?php echo $__Context->lang->notuse ?></option>
					<?php if($__Context->mlayout_list&&count($__Context->mlayout_list))foreach($__Context->mlayout_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->layout_srl ?>"<?php if($__Context->module_info->mlayout_srl==$__Context->val->layout_srl){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->val->layout ?>)</option><?php } ?>
				</select>
				<a href="#aboutmLayout" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="aboutmLayout" hidden><?php echo $__Context->lang->about_layout ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="skin"><?php echo $__Context->lang->mobile ?> <?php echo $__Context->lang->skin ?></label>
			<div class="x_controls">
				<select name="mskin" id="mskin" style="width:auto">
					<?php if($__Context->mskin_list&&count($__Context->mskin_list))foreach($__Context->mskin_list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->module_info->mskin== $__Context->key || (!$__Context->module_info->skin && $__Context->key=='default')){ ?> selected="selected"<?php } ?>><?php echo $__Context->val->title ?> (<?php echo $__Context->key ?>)</option><?php } ?>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->mobile_view ?></label>
			<div class="x_controls">
				<select name="order_type" style="width:auto">
					<option value="asc"<?php if($__Context->module_info->order_type == 'asc'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->order_asc ?></option>
					<option value="desc"<?php if($__Context->module_info->order_type == 'desc'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->order_desc ?></option>
				</select>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->attend_display_bonus ?></label>
			<div class="x_controls">
				<select name="display_bonus" style="width:auto">
					<option value="N"<?php if($__Context->module_info->display_bonus == 'N'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->attendance_no ?></option>
					<option value="Y"<?php if($__Context->module_info->display_bonus == 'Y'){ ?> selected="selected"<?php } ?>><?php echo $__Context->lang->attendance_yes ?></option>
				</select>
				<a href="#about_attend_display_bonus_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="about_attend_display_bonus_help" class="x_help-block" hidden><?php echo $__Context->lang->about_attend_display_bonus ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->list_count ?></label>
			<div class="x_controls">
				<input type="text" name="list_count" value="<?php echo $__Context->module_info->list_count?$__Context->module_info->list_count:20 ?>"/>
				<a href="#about_list" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_list" hidden><?php echo $__Context->lang->about_list_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->page_count ?></label>
			<div class="x_controls">
				<input type="text" name="page_count" value="<?php echo $__Context->module_info->page_count?$__Context->module_info->page_count:10 ?>"/>
				<a href="#about_page" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_page" hidden><?php echo $__Context->lang->about_page_count ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->description ?></label>
			<div class="x_controls">
				<textarea name="description"><?php echo htmlspecialchars($__Context->module_info->description) ?></textarea>
				<a href="#about_description" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_description" hidden><?php echo $__Context->lang->about_description ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->header_text ?></label>
			<div class="x_controls">
				<textarea name="header_text" id="header_text"><?php echo htmlspecialchars($__Context->module_info->header_text) ?></textarea><a href="<?php echo getUrl('','module','module','act','dispModuleAdminLangcode','target','header_text') ?>" onclick="popopen(this.href);return false;" class="buttonSet buttonSetting"><span><?php echo $__Context->lang->cmd_find_langcode ?></span></a>
				<a href="#cmd_find_langcode" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="cmd_find_langcode" hidden><?php echo $__Context->lang->about_header_text ?></p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label" for="lang_browser_title"><?php echo $__Context->lang->footer_text ?></label>
			<div class="x_controls">
				<textarea name="footer_text" id="footer_text"><?php echo htmlspecialchars($__Context->module_info->footer_text) ?></textarea><a href="<?php echo getUrl('','module','module','act','dispModuleAdminLangcode','target','footer_text') ?>" onclick="popopen(this.href);return false;" class="buttonSet buttonSetting"><span><?php echo $__Context->lang->cmd_find_langcode ?></span></a>
				<a href="#about_footer_text" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
				<p class="x_help-block" id="about_footer_text" hidden><?php echo $__Context->lang->about_footer_text ?></p>
			</div>
		</div>
	</section>
	<div class="x_clearfix btnArea">
		<div class="x_pull-right">
			<button class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" accesskey="s"><?php echo $__Context->lang->cmd_submit ?></button>
		</div>
	</div>
</form>
