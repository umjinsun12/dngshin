<?php if(!defined("__XE__"))exit;
if($__Context->mobileex_mskin_config){ ?>
<?php $__Context->mex_info = $__Context->mobileex_mskin_config ?>
<?php }else{ ?>
<?php $__Context->mex_info = $__Context->module_info ?>
    <?php if( $__Context->list_config['thumbnail']){ ?>
       <?php if( $__Context->list_config['summary'] ){ ?>
         <!-- // 웹진형으로 지정 -->
         <?php 
           $__Context->mex_info = $__Context->mex_info;
           if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'webzine';
          ?>
       <?php }else{ ?>
         <!-- // 갤러리형으로 지정 -->
         <?php 
           $__Context->mex_info = $__Context->mex_info;
           if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'gallery';
          ?>
       <?php } ?>
    <?php } ?>
<!-- // 리스트형으로 지정 -->
<?php 
   $__Context->mex_info = $__Context->mex_info;
   if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'list'; //webzine-웹진, list-리스트, gallery-갤러리
 ?>
<?php } ?>
<!-- // 스타일별 기본설정 -->
<?php if($__Context->mex_info->list_style == 'webzine'){ ?>
<?php 
 $__Context->mex_info = $__Context->mex_info;
 if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 35; // 제목자르기
 if(!$__Context->mex_info->content_cut_size) $__Context->mex_info->content_cut_size = 100; // 내용자르기
 if(!$__Context->mex_info->thumb_width) $__Context->mex_info->thumb_width = 79; // 웹진형 섬네일 가로크기
 if(!$__Context->mex_info->thumb_height) $__Context->mex_info->thumb_height = 59; // 웹진형 섬네일 세로크기
 ?>
<?php }elseif($__Context->mex_info->list_style == 'gallery'){ ?>
<?php 
 $__Context->mex_info = $__Context->mex_info;
 if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 25; // 제목자르기
 ?>
<?php }else{ ?>
<?php 
$__Context->mex_info = $__Context->mex_info;
if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 0; // 제목자르기
if(!$__Context->mex_info->content_cut_size) $__Context->mex_info->content_cut_size = 100; // 내용자르기
 ?>
<?php } ?>
<!-- // 기본설정 -->
<?php 
$__Context->mex_info = $__Context->mex_info;
if(!$__Context->mex_info->board_title) $__Context->mex_info->board_title = $__Context->module_info->browser_title; //게시판 타이틀
if(!$__Context->mex_info->list_category) $__Context->mex_info->list_category = 'N'; // 리스트에 카테고리 표시 Y-표시, N-표시안함
if(!$__Context->mex_info->duration_new) $__Context->mex_info->duration_new = 24; // new표시 시간 (hours)
if(!$__Context->mex_info->auto_commentlist_view) $__Context->mex_info->auto_commentlist_view = 'Y'; // 댓글리스트 자동펼치기 Y-표시, N-표시안함
if(!$__Context->mex_info->cmt_list_type) $__Context->mex_info->cmt_list_type = D; // 댓글리스트 출력타입 D-기본형,E-모바일EX형
if(!$__Context->mex_info->cmt_list_count) $__Context->mex_info->cmt_list_count = 5; // 코멘트 리스트 카운트
if(!$__Context->mex_info->send_message_use) $__Context->mex_info->send_message_use = 'Y'; // 쪽지보내기 사용
 ?>
<?php if($__Context->xe_version ==4){ ?>
<?php  Context::addJsFile("./common/js/jquery.js", true, '', -1000001)  ?>
<?php }else{ ?>
<?php  Context::addJsFile("./common/js/jquery.min.js", true, '', -1000001)  ?>
<?php } ?>
<?php  Context::addJsFile("./modules/mobileex/tpl/js/jquery.rotate.min.2.2.js", true, '', -1000000)  ?>
<?php  Context::addJsFile("./common/js/js_app.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/common.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_handler.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000)  ?>
<?php  Context::addJsFile("./modules/mobileex/tpl/js/mobileex.min.js", true, '', -100000)  ?>
<?php  Context::loadLang('./modules/board/m.skins/mex_default/lang') ?>
<!--#Meta:modules/board/m.skins/mex_default/css/mboard.css--><?php $__tmp=array('modules/board/m.skins/mex_default/css/mboard.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board/m.skins/mex_default/js/mboard.js--><?php $__tmp=array('modules/board/m.skins/mex_default/js/mboard.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>