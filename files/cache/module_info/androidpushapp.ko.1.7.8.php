<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = '';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispAndroidpushappAdminConfig';
$info->menu = new stdClass;
$info->menu->androidpushapp = new stdClass;
$info->menu->androidpushapp->title='안드로이드 푸시 앱';
$info->menu->androidpushapp->type='all';
$info->action = new stdClass;
$info->menu->androidpushapp->index='dispAndroidpushappAdminConfig';
$info->menu->androidpushapp->acts[0]='dispAndroidpushappAdminConfig';
$info->action->dispAndroidpushappAdminConfig = new stdClass;
$info->action->dispAndroidpushappAdminConfig->type='view';
$info->action->dispAndroidpushappAdminConfig->grant='guest';
$info->action->dispAndroidpushappAdminConfig->standalone='true';
$info->action->dispAndroidpushappAdminConfig->ruleset='';
$info->action->dispAndroidpushappAdminConfig->method='';
$info->action->dispAndroidpushappAdminList = new stdClass;
$info->action->dispAndroidpushappAdminList->type='view';
$info->action->dispAndroidpushappAdminList->grant='guest';
$info->action->dispAndroidpushappAdminList->standalone='true';
$info->action->dispAndroidpushappAdminList->ruleset='';
$info->action->dispAndroidpushappAdminList->method='';
$info->action->dispAndroidpushappAdminRegId = new stdClass;
$info->action->dispAndroidpushappAdminRegId->type='view';
$info->action->dispAndroidpushappAdminRegId->grant='guest';
$info->action->dispAndroidpushappAdminRegId->standalone='true';
$info->action->dispAndroidpushappAdminRegId->ruleset='';
$info->action->dispAndroidpushappAdminRegId->method='';
$info->action->procAndroidpushappAdminInsertConfig = new stdClass;
$info->action->procAndroidpushappAdminInsertConfig->type='controller';
$info->action->procAndroidpushappAdminInsertConfig->grant='guest';
$info->action->procAndroidpushappAdminInsertConfig->standalone='true';
$info->action->procAndroidpushappAdminInsertConfig->ruleset='insertConfig';
$info->action->procAndroidpushappAdminInsertConfig->method='';
$info->action->procAndroidpushappAdminDelete = new stdClass;
$info->action->procAndroidpushappAdminDelete->type='controller';
$info->action->procAndroidpushappAdminDelete->grant='guest';
$info->action->procAndroidpushappAdminDelete->standalone='true';
$info->action->procAndroidpushappAdminDelete->ruleset='';
$info->action->procAndroidpushappAdminDelete->method='';
$info->action->procAndroidpushappAdminInsertPushData = new stdClass;
$info->action->procAndroidpushappAdminInsertPushData->type='controller';
$info->action->procAndroidpushappAdminInsertPushData->grant='guest';
$info->action->procAndroidpushappAdminInsertPushData->standalone='true';
$info->action->procAndroidpushappAdminInsertPushData->ruleset='';
$info->action->procAndroidpushappAdminInsertPushData->method='';
$info->action->procAndroidpushappFiledown = new stdClass;
$info->action->procAndroidpushappFiledown->type='controller';
$info->action->procAndroidpushappFiledown->grant='guest';
$info->action->procAndroidpushappFiledown->standalone='true';
$info->action->procAndroidpushappFiledown->ruleset='';
$info->action->procAndroidpushappFiledown->method='';
$info->action->procAndroidpushappRegIn = new stdClass;
$info->action->procAndroidpushappRegIn->type='controller';
$info->action->procAndroidpushappRegIn->grant='guest';
$info->action->procAndroidpushappRegIn->standalone='true';
$info->action->procAndroidpushappRegIn->ruleset='insertDevice';
$info->action->procAndroidpushappRegIn->method='';
$info->action->procAndroidpushappSync = new stdClass;
$info->action->procAndroidpushappSync->type='controller';
$info->action->procAndroidpushappSync->grant='guest';
$info->action->procAndroidpushappSync->standalone='true';
$info->action->procAndroidpushappSync->ruleset='updateDevice';
$info->action->procAndroidpushappSync->method='';
$info->action->procAndroidpushappSyncSetting = new stdClass;
$info->action->procAndroidpushappSyncSetting->type='controller';
$info->action->procAndroidpushappSyncSetting->grant='guest';
$info->action->procAndroidpushappSyncSetting->standalone='true';
$info->action->procAndroidpushappSyncSetting->ruleset='insertSetting';
$info->action->procAndroidpushappSyncSetting->method='';
$info->action->procAndroidpushappPush = new stdClass;
$info->action->procAndroidpushappPush->type='controller';
$info->action->procAndroidpushappPush->grant='guest';
$info->action->procAndroidpushappPush->standalone='true';
$info->action->procAndroidpushappPush->ruleset='sendMessage';
$info->action->procAndroidpushappPush->method='';
return $info;