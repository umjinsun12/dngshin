<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/mobileex/m.skins/default/css/member_info.css--><?php $__tmp=array('modules/mobileex/m.skins/default/css/member_info.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/mobileex/m.skins/default/js/member_info.js--><?php $__tmp=array('modules/mobileex/m.skins/default/js/member_info.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<ul class="mhnav">
	<li class="mhnav_l<?php if($__Context->act=='dispMobileexMemberInfo' || $__Context->act=='dispMobileexModifyPassword'){ ?> mhnav_on<?php } ?>" style="width:33.3%"><a class="mhnav_a" href="<?php echo getUrl('act','dispMobileexMemberInfo','page','','message_type','','receiver_srl','','message_srl','') ?>"><?php echo $__Context->lang->member_info ?></a></li>
	<li class="mhnav_l<?php if($__Context->act=='dispMobileexScrappedDocument'){ ?> mhnav_on<?php } ?>" style="width:33.3%"><a class="mhnav_a" href="<?php echo getUrl('act','dispMobileexScrappedDocument','page','','message_type','','receiver_srl','','message_srl','') ?>">찜</a></li>
	<li class="mhnav_l<?php if($__Context->act=='dispMobileexMessages'){ ?> mhnav_on<?php } ?>" style="width:33.3%"><a class="mhnav_a" href="<?php echo getUrl('act','dispMobileexMessages','page','','message_type','','receiver_srl','','message_srl','') ?>">견적상담내역</a></li>
</ul>
