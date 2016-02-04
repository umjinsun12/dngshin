<?php if(!defined("__XE__"))exit;?><div class="alert"><?php echo $__Context->lang->attend_click_msg ?></div>
<form action="<?php echo getUrl('') ?>" method="post" id="click_button" onsubmit="return attendance_check()" name="f1" style="text-align:center" class="write_author"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<span class="input-append" style="width:100%; display:inline-block">
	<input type="text" onclick="this.value='';" name="greetings" id="greetings" class="iText" onkeypress="return text_entercheck(event); " maxlength="<?php if(!$__Context->mi->maxlength){ ?>30<?php } ?> <?php echo $__Context->mi->maxlength ?>" onfocus="alll()" style="width:550px" class="write_text"  />
	<input type="hidden" name="about_position" value="yes" />
	
	<button type="button" class="sm-btn" onclick="if(f1.greetings.value){return attendance_check()}else{return attendance_no_check()}">출석 도장!</button>
</span>
</form>