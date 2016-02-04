<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/dgibi/m.skins/default','_head.html') ?>
<div class="grey-header">
     <h2 class="grey-heading-title">3. 다음으로 해야할 일</h2>
</div>
<div class="text-new" style="margin-top:10px">
                <h2 class="title-new">구청에서 취득세 신청/납부</h2>
                <p class="description-new">
				등기하려는 물건지 관할 구청에 가셔서 취득세 신청/납부를 하시면 됩니다.<br>
				취득세 신고 후 부동산에서 받은<br>
				1. 부동산거래신고계약신고 필증 사본 <br>
				2. 매매계약서 사본<br>
				을 각각 첨부서류로 제출하시면 됩니다.
                </p>
</div>
<div class="text-new" style="margin-top:10px">
                <h2 class="title-new">은행에서 해야 할 일</h2>
                <p class="description-new">
				취득세 고지서를 은행에서 납부하도록 합니다. 그리고 은행에서 국민주택채권 매입을 하도록 합니다.
				매입 금액은 .... 입니다.<br>
                </p>
</div>
<div class="text-new" style="margin-top:10px">
                <h2 class="title-new">법원 수입인지 구입하기</h2>
                <p class="description-new">
				은행이나 농협, 우체국에서 구매하세요. 인터넷(http://www.e-revenuestamp.or.kr/)에서도 구매 가능합니다.
                </p>
</div>
<a class="button" href="<?php echo getUrl('', 'mid', $__Context->mid, 'act', 'dispDgibidgi6') ?>">다음으로 가기</a>