<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = '';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispAroundmapAdminConfig';
$info->action = new stdClass;
$info->action->dispQueryAddress = new stdClass;
$info->action->dispQueryAddress->type='view';
$info->action->dispQueryAddress->grant='guest';
$info->action->dispQueryAddress->standalone='true';
$info->action->dispQueryAddress->ruleset='';
$info->action->dispQueryAddress->method='';
$info->action->procControllerTest = new stdClass;
$info->action->procControllerTest->type='controller';
$info->action->procControllerTest->grant='guest';
$info->action->procControllerTest->standalone='true';
$info->action->procControllerTest->ruleset='';
$info->action->procControllerTest->method='';
$info->action->dispAroundmapAdminConfig = new stdClass;
$info->action->dispAroundmapAdminConfig->type='view';
$info->action->dispAroundmapAdminConfig->grant='guest';
$info->action->dispAroundmapAdminConfig->standalone='true';
$info->action->dispAroundmapAdminConfig->ruleset='';
$info->action->dispAroundmapAdminConfig->method='';
$info->action->procAroundmapAdminSetApiKey = new stdClass;
$info->action->procAroundmapAdminSetApiKey->type='controller';
$info->action->procAroundmapAdminSetApiKey->grant='guest';
$info->action->procAroundmapAdminSetApiKey->standalone='true';
$info->action->procAroundmapAdminSetApiKey->ruleset='';
$info->action->procAroundmapAdminSetApiKey->method='';
return $info;