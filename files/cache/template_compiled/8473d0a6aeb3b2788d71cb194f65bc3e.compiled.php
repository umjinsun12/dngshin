<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/textmessage/tpl','header.html') ?>
	<div class="content dashboard" id="content">
			<?php if(!$__Context->isSetupCompleted){ ?><div class="message update">
				<p><?php echo $__Context->lang->msg_config_required ?></p>
				<p><a href="<?php echo getUrl('act','dispTextmessageAdminConfig') ?>"><?php echo $__Context->lang->cmd_goto_config ?></a></p>
			</div><?php } ?>
	</div>
		<div class="x_control-group">
			<?php if($__Context->isSetupCompleted){ ?><div class="portlet">
				<h3><?php echo $__Context->lang->recharging_state ?></h3>
				<ul class="lined">
					<li><?php echo $__Context->lang->service_api_key ?> : <?php echo $__Context->config->api_key ?> <span class="side"><a href="<?php echo getUrl('act','dispTextmessageAdminConfig') ?>"><?php echo $__Context->lang->cmd_configure ?></a></span></li>
					<li><?php echo $__Context->lang->balance ?> : <b title="<?php echo $__Context->lang->sms ?> : <?php echo (int)($__Context->config->cs_cash / $__Context->config->sms_price) ?>, <?php echo $__Context->lang->lms ?> : <?php echo (int)($__Context->config->cs_cash / $__Context->config->lms_price) ?>, <?php echo $__Context->lang->mms ?> : <?php echo (int)($__Context->config->cs_cash / $__Context->config->mms_price) ?>"><?php echo number_format($__Context->config->cs_cash) ?></b> <?php echo $__Context->lang->won ?> <span class="side"><a href="http://www.coolsms.co.kr/chg/" target="_blank"><?php echo $__Context->lang->recharge ?></a></span></li>
					<li><?php echo $__Context->lang->point ?> : <b title="<?php echo $__Context->lang->sms ?> : <?php echo (int)($__Context->config->cs_point / $__Context->config->sms_price) ?>, <?php echo $__Context->lang->lms ?> : <?php echo (int)($__Context->config->cs_point / $__Context->config->lms_price) ?>, <?php echo $__Context->lang->mms ?> : <?php echo (int)($__Context->config->cs_point / $__Context->config->mms_price) ?>"><?php echo number_format($__Context->config->cs_point) ?></b> <?php echo sprintf($__Context->lang->point_guide,$__Context->config->sms_price) ?></li>
					<?php if($__Context->config->cs_mdrop){ ?><li><?php echo $__Context->lang->mdrop ?> : <b><?php echo number_format($__Context->config->cs_mdrop) ?></b> 개 (SMS 1개, 장문 3개, 포토 10개 차감)</li><?php } ?>
					<li><?php echo $__Context->lang->sms ?> : <b<?php if($__Context->config->sms_volume < 100){ ?> style="color:red"<?php } ?>><?php echo number_format($__Context->config->sms_volume) ?></b> <?php echo sprintf($__Context->lang->volume_guide,$__Context->config->sms_price) ?></li>
					<li><?php echo $__Context->lang->lms ?> : <b><?php echo number_format($__Context->config->lms_volume) ?></b> <?php echo sprintf($__Context->lang->volume_guide,$__Context->config->lms_price) ?></li>
					<li><?php echo $__Context->lang->mms ?> : <b><?php echo number_format($__Context->config->mms_volume) ?></b> <?php echo sprintf($__Context->lang->volume_guide,$__Context->config->mms_price) ?></li>
				</ul>
			</div><?php } ?>
		</div>
		<div class="x_control-group">
			<div class="notice_area">
				<h3><?php echo $__Context->lang->notice ?></h3>
				<ul class="lined">
					<?php if($__Context->news&&count($__Context->news))foreach($__Context->news AS $__Context->key=>$__Context->value){ ?>
					<li><a href="<?php echo $__Context->value->url ?>" target="_blank"><?php echo $__Context->value->title ?></a> <span class="side"><?php echo zdate($__Context->value->date, 'Y-m-d') ?></span></li>
					<?php } ?>
					<?php if(!is_array($__Context->news) || count($__Context->news) < 1){ ?><li><?php echo $__Context->lang->no_data ?></li><?php } ?>
				</ul>
			</div>
		</div>
