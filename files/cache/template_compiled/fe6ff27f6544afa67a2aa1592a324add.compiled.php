<?php if(!defined("__XE__"))exit;?><div id="configAddImg" style="display:none">
   <div class="af_config_box">
       <div class="af_prev_img"><span id="configAddImg"><img src="/modules/board/m.skins/mex_default/#" title="설정이미지"></span></div>
       <ul class="af_conf_lst">
         <li><span class="af_btn"><input type="button" onclick="rotateAddFile(-90);" value="-90도 회전" title="" class="af_btn_ip" /></span></li>
         <li><span class="af_btn"><input type="button" onclick="rotateAddFile(180);" value="180도 회전" title="" class="af_btn_ip" /></span></li>
         <li><span class="af_btn"><input type="button" onclick="rotateAddFile(90)" value="+90도 회전 " title="" class="af_btn_ip" /></span></li>
         <li><span class="af_btn"><input type="button" onclick="alignAddFile('left');" value="좌측정렬" title="좌측정렬" class="af_btn_ip" /></span></li>
         <li><span class="af_btn"><input type="button" onclick="alignAddFile('center');" value="중앙정렬" title="중앙정렬" class="af_btn_ip" /></span></li>
         <li><span class="af_btn"><input type="button" onclick="alignAddFile('right');" value="우측정렬" title="우측정렬" class="af_btn_ip" /></span></li>
         <li class="cf"><span class="af_btn"><input type="button" onclick="configAddFileClose();" value="취소" title="" class="af_btn_ip" /></span></li>
         <li class="cf"><span class="af_btn"><input type="button" onclick="doConfigAddFile();" value="저장" title="" class="af_btn_ip" /></span></li>
       </ul>
    </div>
</div>