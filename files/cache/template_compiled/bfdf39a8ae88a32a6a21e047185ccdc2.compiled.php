<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/admin/tpl/css/admin.bootstrap.css--><?php $__tmp=array('modules/admin/tpl/css/admin.bootstrap.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/admin/tpl/css/admin.css--><?php $__tmp=array('modules/admin/tpl/css/admin.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if($__Context->lang_type=='ko'){ ?><!--#Meta:modules/admin/tpl/css/admin_ko.css--><?php $__tmp=array('modules/admin/tpl/css/admin_ko.css','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php if($__Context->lang_type=='en'){ ?><!--#Meta:modules/admin/tpl/css/admin_en.css--><?php $__tmp=array('modules/admin/tpl/css/admin_en.css','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<!--#Meta:modules/widget/tpl/css/widget.css--><?php $__tmp=array('modules/widget/tpl/css/widget.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/admin/tpl/js/admin.js--><?php $__tmp=array('modules/admin/tpl/js/admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/admin/tpl/js/jquery.tmpl.js--><?php $__tmp=array('modules/admin/tpl/js/jquery.tmpl.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/widget/tpl/js/generate_code.js--><?php $__tmp=array('modules/widget/tpl/js/generate_code.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#JSPLUGIN:ui.colorpicker--><?php Context::loadJavascriptPlugin('ui.colorpicker'); ?>
<script>
	jQuery(function(){
		getWidgetVars();
	});
</script>
<div id="content" class="x">
	<form action="./" method="post" id="fo_widget"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="module_srl" value="<?php echo $__Context->module_srl ?>" />
		<input type="hidden" name="widget_sequence" value="" />
		<input type="hidden" name="style" value="" />
		<input type="hidden" name="widget_padding_left" value="" />
		<input type="hidden" name="widget_padding_right" value="" />
		<input type="hidden" name="widget_padding_top" value="" />
		<input type="hidden" name="widget_padding_bottom" value="" />
		<input type="hidden" name="module" value="widget" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="widgetstyle" value="<?php echo $__Context->widgetstyle ?>" />
		<input type="hidden" name="selected_widget" value="<?php echo $__Context->selected_widget ?>" />
		<div class="x_modal-header">
			<h1><?php echo $__Context->lang->widgetstyle ?></h1>
		</div>
		<div class="x_modal-body x_form-horizontal">
			<a href="<?php echo getUrl('widgetstyle','none') ?>" class="widgetStyle"><img src="/modules/widget/tpl/images/widgetstyle_none.gif" title="<?php echo $__Context->lang->notuse ?>" /></a>
			<?php if($__Context->widgetStyle_list&&count($__Context->widgetStyle_list))foreach($__Context->widgetStyle_list as $__Context->key=>$__Context->widgetStyle){;
if($__Context->widgetStyle->preview){ ?><a href="<?php echo getUrl('widgetstyle',$__Context->widgetStyle->widgetStyle) ?>" class="widgetStyle <?php if($__Context->widgetStyle->widgetStyle==$__Context->widgetstyle){ ?>selected<?php } ?>"><img src="<?php echo getUrl();
echo $__Context->widgetStyle->preview ?>" title="<?php echo $__Context->widgetStyle->title ?>" /><span><?php echo $__Context->widgetStyle->title ?></span></a><?php }} ?>
			<?php if($__Context->widgetstyle_info){ ?>
	
				<h2><?php echo $__Context->widgetstyle_info->title ?> ver <?php echo $__Context->widgetstyle_info->version ?></h2>
				<div class="x_control-group">
					<label class="x_control-label"><?php echo $__Context->lang->description ?></label>
					<div class="x_controls">
						<?php echo $__Context->widgetstyle_info->description ?>
					</div>
				</div>
				<div class="x_control-group">
					<label class="x_control-label"><?php echo $__Context->lang->author ?></label>
					<div class="x_controls">
						<?php if($__Context->widgetstyle_info->author&&count($__Context->widgetstyle_info->author))foreach($__Context->widgetstyle_info->author as $__Context->author){ ?>
							<?php echo $__Context->author->name ?> (<?php echo $__Context->author->homepage ?>)
						<?php } ?>
					</div>
				</div>
				<div class="x_control-group">
					<label class="x_control-label"><?php echo $__Context->lang->regdate ?></label>
					<div class="x_controls">
						<?php echo zdate($__Context->widgetstyle_info->date,'Y-m-d') ?>
					</div>
				</div>
	
				<?php if($__Context->widgetstyle_info->extra_var&&count($__Context->widgetstyle_info->extra_var))foreach($__Context->widgetstyle_info->extra_var as $__Context->id=>$__Context->var){ ?>
					<?php $__Context->suggestion_id++ ?>
					<?php if(!$__Context->not_first && !$__Context->var->group){ ?><section class="section"><?php } ?>
					<?php if($__Context->group != $__Context->var->group){ ?>
						<?php if($__Context->not_first){ ?></section><?php } ?>
						<h1><?php echo $__Context->var->group ?></h1>
						<section class="section">
						<?php $__Context->group = $__Context->var->group ?>
					<?php } ?>
					<?php $__Context->not_first = true ?>
					<div class="x_control-group">
						<label class="x_control-label"<?php if($__Context->var->type!='text'&&$__Context->var->type!='textarea'){ ?> for="<?php echo $__Context->id ?>"<?php };
if($__Context->var->type=='text'||$__Context->var->type=='textarea'){ ?> for="lang_<?php echo $__Context->id ?>"<?php } ?>><?php echo $__Context->var->name ?></label>
						<div class="x_controls extra_vars">
							<?php if($__Context->var->type == 'text'){ ?><div>
								<input type="text" name="<?php echo $__Context->id ?>" value="" class="lang_code" />
							</div><?php } ?>
	
							<?php if($__Context->var->type == 'color'){ ?><input type="text" name="<?php echo $__Context->id ?>" class="color-indicator" /><?php } ?>
	
							<?php if($__Context->var->type == 'textarea'){ ?><div>
								<textarea name="<?php echo $__Context->id ?>" rows="8" cols="42" class="lang_code"></textarea>
							</div><?php } ?>
	
							<?php if($__Context->var->type == 'select'){ ?><select name="<?php echo $__Context->id ?>">
								<?php if($__Context->var->options&&count($__Context->var->options))foreach($__Context->var->options as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"><?php echo $__Context->val ?></option><?php } ?>
							</select><?php } ?>
	
							<?php if($__Context->var->type == 'filebox'){ ?>
								<input type="hidden" name="<?php echo $__Context->id ?>" />
								<a href="#modalFilebox" class="modalAnchor filebox"><?php echo $__Context->lang->cmd_select ?></a>
								<?php $__Context->use_filebox = TRUE ?>
							<?php } ?>
							<?php if($__Context->var->options&&count($__Context->var->options))foreach($__Context->var->options as $__Context->key=>$__Context->val){;
if($__Context->var->type == 'radio'){ ?><label>
								<input type="radio" name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>_<?php echo $__Context->key ?>" value="<?php echo $__Context->key ?>" > <?php echo $__Context->val ?>
							</label><?php }} ?>
							<?php if($__Context->var->options&&count($__Context->var->options))foreach($__Context->var->options as $__Context->key=>$__Context->val){;
if($__Context->var->type == 'checkbox'){ ?><label>
								<input type="checkbox" name="<?php echo $__Context->id ?>" id="<?php echo $__Context->id ?>_<?php echo $__Context->key ?>" value="<?php echo $__Context->key ?>" > <?php echo $__Context->val ?>
							</label><?php }} ?>
							<span class="x_help-block"><?php echo $__Context->var->description ?></span>
						</div>
					</div>
				<?php } ?>
				</section>
			<?php } ?>
		</div>
		<div class="x_modal-footer">
			<input class="x_btn x_btn-primary" type="submit" value="<?php echo $__Context->lang->cmd_setup ?>"  />
		</div>
	</form>
	<script>
		xe.current_lang = "<?php echo $__Context->lang_type ?>";
	</script>
	<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/module/tpl','include.filebox.html') ?>
</div>
