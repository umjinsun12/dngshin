<?php if(!defined("__XE__"))exit;?>	<?php if($__Context->module_info->footer_text){ ?><div class="footer_text"><?php echo $__Context->module_info->footer_text ?></div><?php } ?>
	<?php if($__Context->mi->bd_font!='N'){ ?><div id="install_ng2">
		<button type="button" class="tg_blur2"></button><button class="tg_close2">X</button>
		<h3>나눔글꼴 설치 안내</h3><br />
		<h4>이 PC에는 <b>나눔글꼴</b>이 설치되어 있지 않습니다.</h4>
		<p>이 사이트를 <b>나눔글꼴</b>로 보기 위해서는<br /><b>나눔글꼴</b>을 설치해야 합니다.</p>
		<a class="do btn_img" href="http://hangeul.naver.com" target="_blank"><span class="tx_ico_chk">✔</span> 설치</a>
		<a class="btn_img no close" href="#"><?php echo $__Context->lang->cmd_cancel ?></a>
		<button type="button" class="tg_blur2"></button>
	</div><?php } ?>
	<p class="blind">Designed by sketchbooks.co.kr / sketchbook5 board skin</p>
</div>
<div class="fontcheckWrp">
	<?php if($__Context->mi->bd_font!='N'){ ?><div class="blind">
		<p id="fontcheck_ng3" style="font-family:'나눔고딕',NanumGothic,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
		<p id="fontcheck_ng4" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
	</div><?php } ?>
	<div class="blind">
		<p id="fontcheck_np1" style="font-family:'나눔손글씨 펜','Nanum Pen Script',np,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
		<p id="fontcheck_np2" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
	</div> 
</div>