<?php if(!defined("__XE__"))exit;
if($__Context->mobileex_mskin_config){ ?>
<?php $__Context->mex_info = $__Context->mobileex_mskin_config ?>
<?php }else{ ?>
<?php $__Context->mex_info = $__Context->module_info ?>
    <?php if( $__Context->list_config['thumbnail']){ ?>
       <?php if( $__Context->list_config['summary'] ){ ?>
         <!-- // ���������� ���� -->
         <?php 
           $__Context->mex_info = $__Context->mex_info;
           if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'webzine';
          ?>
       <?php }else{ ?>
         <!-- // ������������ ���� -->
         <?php 
           $__Context->mex_info = $__Context->mex_info;
           if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'gallery';
          ?>
       <?php } ?>
    <?php } ?>
<!-- // ����Ʈ������ ���� -->
<?php 
   $__Context->mex_info = $__Context->mex_info;
   if(!$__Context->mex_info->list_style) $__Context->mex_info->list_style = 'list'; //webzine-����, list-����Ʈ, gallery-������
 ?>
<?php } ?>
<!-- // ��Ÿ�Ϻ� �⺻���� -->
<?php if($__Context->mex_info->list_style == 'webzine'){ ?>
<?php 
 $__Context->mex_info = $__Context->mex_info;
 if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 35; // �����ڸ���
 if(!$__Context->mex_info->content_cut_size) $__Context->mex_info->content_cut_size = 100; // �����ڸ���
 if(!$__Context->mex_info->thumb_width) $__Context->mex_info->thumb_width = 79; // ������ ������ ����ũ��
 if(!$__Context->mex_info->thumb_height) $__Context->mex_info->thumb_height = 59; // ������ ������ ����ũ��
 ?>
<?php }elseif($__Context->mex_info->list_style == 'gallery'){ ?>
<?php 
 $__Context->mex_info = $__Context->mex_info;
 if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 25; // �����ڸ���
 ?>
<?php }else{ ?>
<?php 
$__Context->mex_info = $__Context->mex_info;
if(!$__Context->mex_info->subject_cut_size) $__Context->mex_info->subject_cut_size = 0; // �����ڸ���
if(!$__Context->mex_info->content_cut_size) $__Context->mex_info->content_cut_size = 100; // �����ڸ���
 ?>
<?php } ?>
<!-- // �⺻���� -->
<?php 
$__Context->mex_info = $__Context->mex_info;
if(!$__Context->mex_info->board_title) $__Context->mex_info->board_title = $__Context->module_info->browser_title; //�Խ��� Ÿ��Ʋ
if(!$__Context->mex_info->list_category) $__Context->mex_info->list_category = 'N'; // ����Ʈ�� ī�װ� ǥ�� Y-ǥ��, N-ǥ�þ���
if(!$__Context->mex_info->duration_new) $__Context->mex_info->duration_new = 24; // newǥ�� �ð� (hours)
if(!$__Context->mex_info->auto_commentlist_view) $__Context->mex_info->auto_commentlist_view = 'Y'; // ��۸���Ʈ �ڵ���ġ�� Y-ǥ��, N-ǥ�þ���
if(!$__Context->mex_info->cmt_list_type) $__Context->mex_info->cmt_list_type = D; // ��۸���Ʈ ���Ÿ�� D-�⺻��,E-�����EX��
if(!$__Context->mex_info->cmt_list_count) $__Context->mex_info->cmt_list_count = 5; // �ڸ�Ʈ ����Ʈ ī��Ʈ
if(!$__Context->mex_info->send_message_use) $__Context->mex_info->send_message_use = 'Y'; // ���������� ���
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