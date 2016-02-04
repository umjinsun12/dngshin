<?php if(!defined("__XE__"))exit;
if($__Context->colorset=="PINK"){ ?>
<!--#Meta:widgets/androidapp_login/skins/default_join/css/mlogin_PINK.css--><?php $__tmp=array('widgets/androidapp_login/skins/default_join/css/mlogin_PINK.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }elseif($__Context->colorset=="PURPLE"){ ?>
<!--#Meta:widgets/androidapp_login/skins/default_join/css/mlogin_PURPLE.css--><?php $__tmp=array('widgets/androidapp_login/skins/default_join/css/mlogin_PURPLE.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }elseif($__Context->colorset=="JADE"){ ?>
<!--#Meta:widgets/androidapp_login/skins/default_join/css/mlogin_JADE.css--><?php $__tmp=array('widgets/androidapp_login/skins/default_join/css/mlogin_JADE.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php }else{ ?>
<!--#Meta:widgets/androidapp_login/skins/default_join/css/mlogin_PURPLE.css--><?php $__tmp=array('widgets/androidapp_login/skins/default_join/css/mlogin_PURPLE.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<div class="bd">
<div class="title"><center><?php echo $__Context->app_name ?></center></div>
<div class="top"><br><br><?php echo $__Context->top_text ?><br><br></div>
<div class="cent">
	<?php Context::addJsFile("./files/ruleset/login.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="<?php echo getUrl('','act','procMemberLogin') ?>" method="post" class="ff" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="@login" />
		<input type="hidden" name="success_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment()) ?>" />
		<input type="hidden" name="act" value="procMemberLogin" />
		<input type="hidden" name="keep_signed" value="Y"/>
		<ul><li>
			<?php if($__Context->member_config->identifier != 'email_address'){ ?><label for="id"><?php echo $__Context->lang->user_id ?></label><?php } ?>
			<?php if($__Context->member_config->identifier != 'email_address'){ ?><input name="user_id" id="id" type="text" required   value=""/><?php } ?>
			<?php if($__Context->member_config->identifier == 'email_address'){ ?><label for="id"><?php echo $__Context->lang->email_address ?></label><?php } ?>
			<?php if($__Context->member_config->identifier == 'email_address'){ ?><input name="user_id" id="id" type="email" required   value=""/><?php } ?>
			</li>
			<li><label for="pw"><?php echo $__Context->lang->password ?></label><input name="password" type="password" id="pw" value="" /></li>
		</ul>		
		<div class="bna">			
			<div class="fr"><button type="submit" class="bn dark"><?php echo $__Context->lang->cmd_login ?></button></div>
		</div>
		<ul class="hp">
			<li><a href="<?php echo getUrl('act','dispMemberFindAccount') ?>"><span><?php echo $__Context->lang->cmd_find_member_account ?></span></a></li>
			<li><a href="<?php echo getUrl('act','dispMemberSignUpForm','app','1') ?>"><span><?php echo $__Context->lang->cmd_signup ?></span></a></li>		
		</ul>
	</form>
	</div>
	<div class="bottom"><br><br><br><button type="submit" class="bn dark" onclick="javascript:window.myJs_ins.callAndroid_ins();">로그인하지 않고 시작하기</button><br><br>지금 로그인하지 않아도 나중에 알림설정을 통해서<br><br>따로 로그인하여 동기화 하실 수 있습니다.</div>
</div>
