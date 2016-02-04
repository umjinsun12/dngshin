<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/x.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php if($__Context->document_srl){ ?><!--#Meta:modules/board/m.skins/dgiBoard/js/edit.js--><?php $__tmp=array('modules/board/m.skins/dgiBoard/js/edit.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_header.html') ?>
<span class="check-cancel-dummy"></span>
<script type="text/javascript" src="/modules/board/m.skins/dgiBoard/js/framework.js"></script>
<script>
function aaa(chkbox)
{
	var divTest = document.getElementById("chekok");
if ( chkbox.checked == true )
{
			
			divTest.innerHTML = "85m²(25평) 이하 주택";
}
else
{
			divTest.innerHTML = "85m²(25평) 이상 주택";
}
}
</script>
<script language='javascript'> 
<!--
function comma(obj) { 
    var num = obj.value;
        if (obj.value.length >= 4) {
            re = /^$|,/g; 
            num = num.replace(re, ""); 
            fl="" 
        if(isNaN(num)) { alert("문자는 사용할 수 없습니다.");return 0} 
        if(num==0) return num 
        if(num<0){ 
            num=num*(-1) 
            fl="-" 
        }
        else{ 
            num=num*1 //처음 입력값이 0부터 시작할때 이것을 제거한다. 
        } 
            num = new String(num) 
            temp="" 
            co=3 
            num_len=num.length 
    while (num_len>0){ 
        num_len=num_len-co 
        if(num_len<0){co=num_len+co;num_len=0} 
        temp=","+num.substr(num_len,co)+temp 
        } 
    obj.value =  fl+temp.substr(1);
    }
}
function num_check(inNum) { 
    var keyCode = event.keyCode 
        if (keyCode < 48 || keyCode > 57){ 
            alert("문자는 사용할 수 없습니다."+"["+keyCode+"]") 
            event.returnValue=false 
        } 
    } 
//-->
</script> 
<div class="write-form">
	
	<div class="hero-image">
          <div class="hero-image-title">
            <h2>등기비 계산하기</h2>
            <div class="sub-title-small">등기를 하기전에 등기비 계산을 먼저 하셔야합니다.</div>
          </div>
          <div class="hero-image-img"><img src="/modules/board/m.skins/dgiBoard/images/photo-1429032021766-c6a53949594f.jpg">
          </div>
    </div>
    
	<form stlye="padding:10px" action="./" method="post" name="ff" class="ff" id="ff" onsubmit="return procFilter(this, insert)"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
		<ul style="margin-top:8px;margin-left: 5px">
			<?php if($__Context->module_info->use_category == 'Y'){ ?><li class="clearfix">
				<label for="nCategory"><?php echo $__Context->lang->category ?> <em>*</em></label>
				<select name="category_srl" id="nCategory">
					<option></option>
					<?php if($__Context->category_list&&count($__Context->category_list))foreach($__Context->category_list as $__Context->val){ ?>	
					<option <?php if(!$__Context->val->grant){ ?>disabled="disabled"<?php } ?> value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->val->grant&&$__Context->val->selected||$__Context->val->category_srl==$__Context->oDocument->get('category_srl')){ ?>selected="selected"<?php } ?>>
						<?php echo $__Context->val->title ?>
					</option>
					<?php } ?>
				</select>
			</li><?php } ?>
			
				<?php if($__Context->oDocument->getTitleText()){ ?>
				<input name="title" type="hidden" id="nTitle" readonly="readonly" value="<?php echo htmlspecialchars($__Context->oDocument->getTitleText()) ?>"/>
				<?php }else{ ?>
				<?php if($__Context->is_logged){ ?>	
				<input name="title" type="hidden" id="nTitle" readonly="readonly" value="<?php echo $__Context->logged_info->user_id ?>"/>
				<?php }else{ ?>
				<input name="title" type="hidden" id="nTitle" readonly="readonly" value="123"/>
				<?php } ?>
				<?php } ?>
				<input type="hidden" name="content" rows="2" cols="12" id="nText" readonly="readonly" value="등기비 결과입니다.">
			
			<?php if(!$__Context->is_logged){ ?>
			<input name="nick_name" type="hidden" id="uName" value="ejsseop" />
			<input name="password" type="hidden" id="uPw" value="igrus123"/>
			
			<?php } ?>
			<?php if(count($__Context->extra_keys)){ ?>
			
            
            
			
			<ul class="exvar">
				<label class="label-form middle" for="$extra_keys[1]->name}"><?php echo $__Context->extra_keys[1]->name ?> <?php if($__Context->extra_keys[1]->is_required=="Y"){ ?><em>*</em><?php } ?></label>
				<input type="text" name="extra_vars1[]" class="text" onkeypress="num_check(this)" onkeyup="comma(this)" style="TEXT-ALIGN:right ">
			</ul>
			<ul class="exvar">
				<label class="label-form middle" for="$extra_keys[2]->name}"><?php echo $__Context->extra_keys[2]->name ?> <?php if($__Context->extra_keys[2]->is_required=="Y"){ ?><em>*</em><?php } ?></label>
				<input type="text" name="extra_vars2[]" value="" class="text" onkeypress="num_check(this)" onkeyup="comma(this)" id="extra_vars2">
			</ul>
			
			
			<div class="w-clearfix input-form one-line" style="margin-bottom: 10px">
                <label class="label-form middle" for="email">부동산 소재지</label>
                
                
                <div class="w-clearfix radios-container" style="float:right">
                	
                	
                <div class="w-radio w-clearfix radio-button">
                    <div class="radio-bullet-replacement checked"></div>
                    <input style="height:2px" class="w-radio-input radio-bullet" id="node-2" type="radio" name="extra_vars3[]" value="특별시/광역시" data-name="Radio1">
                    <label class="w-form-label" for="node-2">특별시/광역시</label>
                  </div>
                  
                  <div class="w-radio w-clearfix radio-button">
                    <div class="radio-bullet-replacement"></div>
                    <input style="height:2px" class="w-radio-input radio-bullet" id="node" type="radio" name="extra_vars3[]" value="기타지역" data-name="Radio1">
                    <label class="w-form-label" for="node">기타지역</label>
                  </div>
                  
                  
                </div>
              </div>
			
		<div class="w-clearfix input-form one-line">
                <label class="label-form middle" for="$extra_keys[6]->name" id="chekok">85m²(25평) 이상 주택</label>
                <!--85m²(25평) 이하 주택-->
                <div class="w-clearfix radios-container">
                 
                  <div class="w-checkbox w-clearfix checkbox-field">
                    <div class="checkbox-handle"></div>
                    <input class="w-checkbox-input checkbox-input" id="checkbox" type="checkbox" name="extra_vars4[]" data-name="Checkbox" value="85m² 이하 주택" onclick="aaa(this);">
                    <label class="w-form-label checkbox-label" for="checkbox"></label>
                  </div>
                </div>
                <p style="
                padding: 0px 10px 10px 23px;
    			margin: 4px 0 0px;
    			font-size: 0.85em;
    			background-repeat: no-repeat;
    			background-position: 10px center;">85m²(25평)이하 주택 여부를 체크하세요</p>
        </div>
			
			<?php } ?>
			
			
			
			<li class="exvar option">
				<!--<?php if($__Context->grant->manager){ ?><input type="checkbox" name="is_notice" value="Y" class="iCheck"<?php if($__Context->oDocument->isNotice()){ ?> checked="checked"<?php } ?> id="is_notice" /><?php } ?>-->
				<!--<?php if($__Context->grant->manager){ ?><label for="is_notice"><?php echo $__Context->lang->notice ?></label><?php } ?>-->
				<!--<input type="checkbox" name="comment_status" value="ALLOW"<?php if($__Context->oDocument->allowComment()){ ?> checked="checked"<?php } ?> id="reAllow" />-->
				<!--<label for="reAllow"><?php echo $__Context->lang->allow_comment ?></label>-->
				<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
				<!--<input type="radio" name="status" value="<?php echo $__Context->key ?>"<?php if($__Context->oDocument->get('status') == $__Context->key){ ?> checked="checked"<?php } ?> /> <label for="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>-->
				<?php } ?>
			</li>
		</ul>
        
		<div class="bt-wrap clearfix bt-wrap-full">
			<a href="javascript:history.back()" class="btCancel"><?php echo $__Context->lang->cmd_cancel ?></a>
			<button type="submit" class="btSubmit">결과보기</button>
		</div>
	</form>
</div>
		<img widget="modalpopup" skin="default" colorset="default" />
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/dgiBoard','_footer.html') ?>
