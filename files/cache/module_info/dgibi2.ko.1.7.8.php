<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = 'dispDgibi2List';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = '';
$info->action = new stdClass;
$info->action->dispDgibi2List = new stdClass;
$info->action->dispDgibi2List->type='view';
$info->action->dispDgibi2List->grant='guest';
$info->action->dispDgibi2List->standalone='true';
$info->action->dispDgibi2List->ruleset='';
$info->action->dispDgibi2List->method='';
return $info;