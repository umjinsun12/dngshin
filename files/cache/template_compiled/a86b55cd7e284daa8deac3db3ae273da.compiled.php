<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/m.skins/default','member_header.html') ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/mobileex/m.skins/default/filter','modify_member_password.xml');$__xmlFilter->compile(); ?>
<div class="member_info_wrap">
    <h3 class="p_tit"><?php echo $__Context->member_title = $__Context->lang->cmd_modify_member_password ?></h3>
    <p class="info_msg msg2">
		현재 아이디는 <span class="user_id"><?php echo $__Context->formValue ?></span>입니다.
	</p>
    <form id="fo_insert_member" action="./" method="get" onsubmit="return procFilter(this, modify_member_password)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
        <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
        <input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
        <input type="hidden" name="page" value="<?php echo $__Context->page ?>" />
        
        <div class="mb_box">
          <table class="mb_tbl2">
          		<colgroup><col style="width:110px"><col></colgroup>
          		<tbody>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->current_password ?></th>
             		<td><span class="input_area"><input type="password" name="current_password" id="cpw" class="input_box" /><span class="txt"></span></span></td>
          		</tr>
          		</tbody>
          	</table>
        </div>
        <div class="mb_box2">
          <table class="mb_tbl2">
          		<colgroup><col style="width:110px"><col></colgroup>
          		<tbody>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->password1 ?></th>
             		<td><span class="input_area"><input type="password" name="password1" id="npw1" class="input_box" value="" /><span class="txt"><?php echo $__Context->lang->about_password ?></span></span></td>
          		</tr>
          		<tr>
             		<th scope="row"><?php echo $__Context->lang->password2 ?></th>
             		<td><span class="input_area"><input type="password" name="password2" id="npw2" class="input_box" value=""  /><span class="txt" id="msg_upw"></span></span></td>
          		</tr>
          		</tbody>
          	</table>
        </div>
        <div class="btn_area">
		      <button class="btn bt_btn" title="확인" type="submit">확인</button>
	     </div>
    </form>
</div>