<?php if(!defined("__XE__"))exit;
if()($__Context->layout_info->layout_type == "MAIN_PAGE"){ ?>
<h1>메인 레이아웃 형태로 선택시에 이부분이 보입니다.</h1>
<?php }elseif()($__Context->layout_info->layout_type == "SUB_PAGE"){ ?>
<h1>서브 레이아웃 형태로 선택시에 이부분이 보입니다.</h1>
<?php } ?>
