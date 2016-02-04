<?php if(!defined("__XE__"))exit;
Context::addJsFile("./common/js/jquery.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php  Context::loadLang('./modules/board/m.skins/default/lang') ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/dgibi/m.skins/default','_head.html') ?>
 
      	<div class="grey-header">
              <h2 class="grey-heading-title">1. 사전사항 및 준비서류</h2>
        </div>
            
        	
        	<div class="text-new" style="margin-top:10px">
                <h2 class="title-new">매도인에게 받을 서류</h2>
                <p class="description-new">
					    1. 등기권리증<br>
  						2. 매도인 주민등록초본<br>
  						3. 부동산 매도용 인감증명서<br>
  						4. 인감도장<br>
                </p>
           </div>
           
           <div class="text-new" style="margin-top:10px">
                <h2 class="title-new">매수인(본인)이 준비해야 할 서류</h2>
                <p class="description-new">
  1. 주민등록등본이나 초본 1부<br>
  2. 부동산 매매계약서 원본 1부, 사본 2부<br>
  3. 도장<br>
  4. 신분증<br>
  5. 구분건물소유권등기이전신청서<br>
  6. 위임장<br>
  7. 토지대장 1부<br>
  8. 건축물대장 1부<br>
  9. 취득세 납부 영수증<br>
  10. 국민채권매입 영수증<br>
  11. 법원수입인지<br>
  12. 소유권이전등기신청수수료 납부영수증<br>
                </p>
           </div>
		       <div class="text-new" style="margin-top:10px">
                <h2 class="title-new">부동산이 준비해 줘야 할 서류</h2>
                <p class="description-new">
					1. 부동산거래계약신고필증 원본 1부,사본 2부<br>
                </p>
	           </div>
 
 <br>
<a class="button" href="<?php echo getUrl('', 'mid', $__Context->mid, 'act', 'dispDgibidgi2') ?>">다음으로 넘어가기</a>