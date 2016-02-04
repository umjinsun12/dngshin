<?php if(!defined("__XE__"))exit;?><div class="x_page-header">
	<h1>
		라이선스관리
		<?php if($__Context->module_info->mid){ ?><span class="path">
			&gt; <a href="<?php echo getSiteUrl($__Context->module_info->domain,'','mid',$__Context->module_info->mid) ?>"<?php if($__Context->module=='admin'){ ?> target="_blank"<?php } ?>><?php echo $__Context->module_info->mid;
if($__Context->module_info->is_default=='Y'){ ?>(<?php echo $__Context->lang->is_default ?>)<?php } ?></a>
		</span><?php } ?>
		<a href="#aboutModule" data-toggle class="x_icon-question-sign"><?php echo $__Context->lang->help ?></a>
	</h1>
</div>
<p class="x_alert x_alert-info" id="aboutModule" hidden>누리고 XE쇼핑몰 라이선스 관리 모듈입니다</p>
<?php if($__Context->module_info){ ?><ul class="x_nav x_nav-tabs">
	<li<?php if($__Context->act=='dispLicenseAdminConfig'){ ?> class="x_active"<?php } ?> ><a href="<?php echo getUrl('','module',$__Context->module,'act','dispLicenseAdminConfig') ?>">라이선스</a></li>
</ul><?php } ?>
