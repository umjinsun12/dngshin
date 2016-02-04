<?php if(!defined("__XE__"))exit;?>
<?php $__Context->is_https = strtoupper(parse_url($__Context->current_url, 0)) == 'HTTPS' ?>
<!--#Meta:modules/krzip/tpl/css/default.css--><?php $__tmp=array('modules/krzip/tpl/css/default.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if(!$__Context->is_https){ ?><!--#Meta:http://dmaps.daum.net/map_js_init/postcode.v2.js--><?php $__tmp=array('http://dmaps.daum.net/map_js_init/postcode.v2.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<?php if($__Context->is_https){ ?><!--#Meta:https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js--><?php $__tmp=array('https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js','','','');Context::loadFile($__tmp);unset($__tmp);
} ?>
<!--#Meta:modules/krzip/tpl/js/daumapi.min.js--><?php $__tmp=array('modules/krzip/tpl/js/daumapi.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="krZip" id="krzip-<?php echo $__Context->template_config->sequence_id ?>">
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-postcode" value="<?php echo $__Context->template_config->values[0] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-roadAddress" value="<?php echo $__Context->template_config->values[1] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-jibunAddress" value="<?php echo $__Context->template_config->values[2] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-detailAddress" value="<?php echo $__Context->template_config->values[3] ?>" />
	<input type="hidden" name="<?php echo $__Context->template_config->column_name ?>[]" class="krzip-hidden-extraAddress" value="<?php echo $__Context->template_config->values[4] ?>" />
	
	
	
	
	
	
	<div class="krzip-address-wrap" style="margin-top: 15px">
		<input type="text" class="krzip-roadAddress" value="<?php echo $__Context->template_config->values[1] ?>" disabled="disabled" />
	</div>
	
	<div class="krzip-detailAddress-wrap" style="margin-top: 15px">
		<label><?php echo $__Context->lang->cmd_krzip_detail_address ?></label>
		<input type="text" class="krzip-detailAddress" value="<?php echo $__Context->template_config->values[3] ?>" />
	</div>
	
	<div class="krzip-postcode-wrap" style="padding: 4px">
		<input type="button" onclick="sample3_execDaumPostcode()" class="krzip-search" style="background-color: #2B669A;color: #FFFFFF;margin-top: 15px;font-size: 15px" value="주소 검색" />
	</div>
	
	<div id="alayer" style="position:absolute;border:1px solid;width:100%;height:100%;">	
		<img id="adclo"src="http://i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:100"onclick="foldDaumPostcode()" alt="접기 버튼">
	</div>
	
	
	
	
</div>
<script>
//<![CDATA[
xe.lang.msg_krzip_road_address_expectation = "<?php echo $__Context->lang->msg_krzip_road_address_expectation ?>";
xe.lang.msg_krzip_jibun_address_expectation = "<?php echo $__Context->lang->msg_krzip_jibun_address_expectation ?>";
jQuery("#krzip-<?php echo $__Context->template_config->sequence_id ?>").Krzip();
//]]>
</script>
