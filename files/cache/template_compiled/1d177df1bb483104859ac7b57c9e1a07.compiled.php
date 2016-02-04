<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1> 문자메시지
		<a href="#aboutModule" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="aboutModule" hidden>SMS, LMS, MMS 등의 문자메시지 발송 API를 제공하여 모듈, 애드온, 위젯에서 연동할 수 있도록 합니다.</p>
    <ul class="x_nav x_nav-tabs">
		<li<?php if($__Context->act=='dispTextmessageAdminIndex'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispTextmessageAdminIndex') ?>"><?php echo $__Context->lang->dashboard ?></a></li>
		<li<?php if($__Context->act=='dispTextmessageAdminUsageStatement'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act','dispTextmessageAdminUsageStatement') ?>"><?php echo $__Context->lang->usage_statement ?></a></li>
		<?php if($__Context->act=='dispTextmessageAdminCancelReserv'){ ?><li<?php if($__Context->act=='dispTextmessageAdminCancelReserv'){ ?> class="x_active"<?php } ?>><a href="<?php echo getUrl('act', 'dispTextmessageAdminCancelReserv') ?>"><?php echo $__Context->lang->cmd_cancel_reserv ?></a></li><?php } ?>
    </ul>
<?php if($__Context->cs_error_message){ ?>
	<?php $__Context->XE_VALIDATOR_MESSAGE=$__Context->cs_error_message ?>
<?php } ?>
<?php if($__Context->XE_VALIDATOR_MESSAGE){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
	<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
</div><?php } ?>
