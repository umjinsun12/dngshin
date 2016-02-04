<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/authentication/tpl','header.html') ?>
<!--#Meta:modules/module/tpl/js/multi_order.js--><?php $__tmp=array('modules/module/tpl/js/multi_order.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php Context::loadLang('modules/authentication/lang'); ?>
<!--#Meta:modules/editor/tpl/js/editor_module_config.js--><?php $__tmp=array('modules/editor/tpl/js/editor_module_config.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php Context::addJsFile("./files/ruleset/insert_config.xml", FALSE, "", 0, "body", TRUE, "") ?><form class="x_form-horizontal" action="./" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@insert_config" />
	<input type="hidden" name="act" value="procAuthenticationAdminConfig" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="module_srl" value=<?php echo $__Context->module_srl ?> />
	<input type="hidden" name="agreement" value="<?php echo htmlspecialchars($__Context->config->agreement) ?>" />
	<section class="section">
		<h1>기본설정</h1>
		<div class="x_control-group">
			<label class="x_control-label">국가설정</label>
			<div class="x_controls">
				<select name="country_code">
					<option value="">선택</option>
						<?php asort($__Context->lang->country_codes) ?>
						<?php if($__Context->lang->country_codes&&count($__Context->lang->country_codes))foreach($__Context->lang->country_codes as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->key ?>"<?php if($__Context->key == $__Context->config->country_code){ ?> selected="selected"<?php } ?>><?php echo $__Context->val ?></option><?php } ?>
				</select>
				<a href="#country_code_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="country_code_help" hidden>문자가 기본 국가로 설정된 나라로 문자를 발송하게 합니다.<br />기본은 82 대한민국입니다.</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">중복가입</label>
			<div class="x_controls"> 
				<select name="number_overlap">
					<option value="Y"<?php if($__Context->config->number_overlap=='Y'){ ?> selected="selected"<?php } ?>>허용</option>
					<option value="N"<?php if($__Context->config->number_overlap=='N'){ ?> selected="selected"<?php } ?>>허용하지않음</option>
				</select>
				<a href="#number_overlap_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="number_overlap_help" hidden>중복을 허용하지 않을 시 가입하신 휴대폰 번호로 재가입이 불가합니다.</p>
			</div>
		</div>
		<div class="x_control-group">
			<label class="x_control-label">발신번호</label>
			<div class="x_controls">
				<input type="text" size="5" name="sender_no" value="<?php echo $__Context->config->sender_no ?>" />
				<a href="#sender_no_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
				<p id="sender_no_help" class="x_help-block" hidden><?php echo $__Context->lang->about_sender_no ?></p>
			</div>
		</div>
	</section>
	<section class="section">
		<h1>인증코드설정</h1>
		<div class="x_control-group">
			<label class="x_control-label">인증번호 자릿수</label>
			<div class="x_controls">
				<input type="text" size="5" maxlength="2" name="digit_number" value="<?php echo $__Context->config->digit_number ?>" />
				<a href="#digit_number_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="digit_number_help" class="x_help-block" hidden>5로 설정하면 다섯자리의 숫자값이 인증코드로 발송됩니다.</p>
			</div>
   		</div>
		<div class="x_control-group">
			<label class="x_control-label">인증번호 횟수 제한</label>
			<div class="x_controls">
				<input type="text" size="5" maxlength="2" name="day_try_limit" value="<?php echo $__Context->config->day_try_limit ?>" />
				<a href="#day_try_limit_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="day_try_limit_help" class="x_help-block" hidden>같은번호로 일정 횟수 이상 인증번호 요청시 해당 번호를 하루동안 금지합니다.</p>
			</div>
   		</div>
		<div class="x_control-group">
			<label class="x_control-label">인증번호 재전송 제한</label>
			<div class="x_controls">
				<input type="text" size="5" maxlength="2" name="authcode_time_limit" value="<?php echo $__Context->config->authcode_time_limit ?>" />
				<a href="#authcode_time_limit_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="authcode_time_limit_help" class="x_help-block" hidden>연이어 인증번호를 여러번 전송받을 수 없도록 합니다. 예) 20으로 설정하면 인증번호를 전송받은 후 20초 후에 재전송이 가능하게 설정됩니다.</p>
			</div>
   		</div>
		<div class="x_control-group">
			<label class="x_control-label">인증번호 치환</label>
			<div class="x_controls">
				<textarea name="message_content" rows="5" cols="40"><?php echo htmlspecialchars($__Context->config->message_content) ?></textarea>
				<a href="#message_content_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            	<p id="message_content_help" class="x_help-block" hidden>%authcode%에 인증번호가 치환되어 들어갑니다. 적절한 문구로 수정가능합니다. 예) [핸드폰인증] %authcode% ☜ 인증번호를 정확히 입력해 주세요.</p>
			</div>
   		</div>
		<div class="x_control-group">
			<label class="x_control-label">인증번호 요구 페이지</label>
			<div class="x_controls">
				<?php $__Context->list = array_filter(explode(',',$__Context->config->list)) ?>
					<input type="hidden" name="list" value="<?php echo $__Context->config->list ?>" />
					<select class="multiorder_show" size="8" multiple="multiple" style="width:290px;vertical-align:top">
						<?php if($__Context->action_list&&count($__Context->action_list))foreach($__Context->action_list as $__Context->key=>$__Context->val){;
if(!in_array($__Context->val,$__Context->list)){ ?><option value="<?php echo $__Context->val ?>"><?php echo Context::getLang($__Context->val) ?></option><?php }} ?>
					</select>
					<button type="button" class="text multiorder_add" style="vertical-align:top">추가</button>
					<select class="multiorder_selected" size="8" multiple="multiple" style="width:290px;vertical-align:top">
						<?php if($__Context->list&&count($__Context->list))foreach($__Context->list as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val ?>"><?php echo Context::getLang($__Context->val) ?></option><?php } ?>
					</select>
					<button type="button" class="text multiorder_del" style="vertical-align:top">삭제</button>
					<script type="text/javascript">
						xe.registerApp(new xe.MultiOrderManager('list'));
					</script>	
					<a href="#validationcode_act_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
            		<p id="validationcode_act_help" class="x_help-block"hidden>인증모듈을 사용할 액션을 선택하세요.<br />예) '회원가입'을 추가하시면 회원가입시 인증번호를 요구합니다.</p>
			</div>
   		</div>
	</section>
	<section class="section">
		<h1>부가설정</h1>
		<div class="x_control-group">
			<label class="x_control-label" for="agreement">약관내용</label>
			<div class="x_controls"><?php echo $__Context->editor ?></div>
				<style scoped>
					#smart_content,
					#smart_content>.tool{clear:none !important}
				</style>
			</div>
		<div class="x_control-group">
			<label class="x_control-label">휴대전화필드 선택</label>
				<div class="x_controls">
					<select name="cellphone_fieldname">
						<option value=""><?php echo $__Context->lang->select ?></option>
						<?php if($__Context->member_config->signupForm&&count($__Context->member_config->signupForm))foreach($__Context->member_config->signupForm as $__Context->item){ ?><option value="<?php echo $__Context->item->name ?>"<?php if($__Context->item->name==$__Context->config->cellphone_fieldname){ ?> selected="selected"<?php } ?>><?php echo $__Context->item->title ?></option><?php } ?>
					</select>
						<a href="#about_cellphone_fieldname_help" class="x_icon-question-sign" data-toggle><?php echo $__Context->lang->help ?></a>
						<p id="about_cellphone_fieldname_help" class="x_help-block" hidden>선택된 필드 값을 인증번호를 수신할 휴대전화번호로 사용합니다. <a href="/xe/?module=admin&act=dispMemberAdminConfig">회원설정 > 가입폼관리</a> 에서 전화번호 형식으로 추가해주세요. <br /><span style="color:red;"> * authentication_change 애드온이 있어야 작동합니다.</span></p>
				</div>
		</div>
	</section>
	<div class="btnArea">
		<button type="submit" class="x_btn">저장</button>
	</div>
</form>
