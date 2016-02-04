<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/authentication/tpl/css/style.css--><?php $__tmp=array('modules/authentication/tpl/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<div class="x_page-header">
	<h1>인증모듈 관리
		<a href="#aboutModule" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>	
	</h1>
</div>	
<p class="x_alert x_alert-info" id="aboutModule" hidden>인증번호를 발송하는 모듈입니다.</p>
	<?php if($__Context->module_info){ ?><ul class="x_nav x_nav-tabs">
		<li<?php if($__Context->act=='dispAuthenticationAdminConfig'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAuthenticationAdminConfig') ?>">기본설정</a></li>
		<li<?php if($__Context->act=='dispAuthenticationAdminDesign'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAuthenticationAdminDesign') ?>">디자인설정</a></li>
		<li<?php if($__Context->act=='dispAuthenticationAdminAuthcodeList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAuthenticationAdminAuthcodeList') ?>">사용현황</a></li>
		<li<?php if($__Context->act=='dispAuthenticationAdminMemberList'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispAuthenticationAdminMemberList') ?>">인증회원</a></li>
	</ul><?php } ?>
	
<?php if($__Context->cs_error_message){ ?>
<?php $__Context->XE_VALIDATOR_MESSAGE=$__Context->cs_error_message ?>
<?php } ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
