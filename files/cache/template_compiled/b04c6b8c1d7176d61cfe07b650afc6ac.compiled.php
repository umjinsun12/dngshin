<?php if(!defined("__XE__"))exit;
if($__Context->grant->write_comment){ ?>
     <script type="text/javascript">
     //<![CDATA[
        cmtWriteGrant = true;
     //]]>
     </script>
<?php } ?>
<?php if($__Context->mex_info->cmt_list_type == 'E'){ ?>
     <?php if($__Context->rnd){ ?>
          <?php 
            $__Context->oMobileexModel = &getModel('mobileex');
            $__Context->rndComment = $__Context->oMobileexModel->getMobileexComment($__Context->rnd);
           ?>
     <?php } ?>
     <?php if($__Context->rndComment->parent_srl || $__Context->rndComment->parent_srl != 0){ ?>
          <?php 
          $__Context->cmt_list_mode = 1;
          $__Context->up_category = $__Context->rndComment->parent_srl;
           ?>
     <?php } ?>
<?php } ?>
<?php if($__Context->cmt_list_mode && $__Context->mex_info->cmt_list_type == 'E'){ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','read_sub_comments.html') ?>
<?php }else{ ?>
        <?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board/m.skins/mex_default','read_document.html') ?>
<?php } ?>
