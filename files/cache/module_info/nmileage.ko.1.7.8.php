<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = 'dispNmileageMileageHistory';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispNmileageAdminAllMileageHistory';
$info->action = new stdClass;
$info->action->dispNmileageAdminModInstList = new stdClass;
$info->action->dispNmileageAdminModInstList->type='view';
$info->action->dispNmileageAdminModInstList->grant='guest';
$info->action->dispNmileageAdminModInstList->standalone='true';
$info->action->dispNmileageAdminModInstList->ruleset='';
$info->action->dispNmileageAdminModInstList->method='';
$info->action->dispNmileageAdminConfig = new stdClass;
$info->action->dispNmileageAdminConfig->type='view';
$info->action->dispNmileageAdminConfig->grant='guest';
$info->action->dispNmileageAdminConfig->standalone='true';
$info->action->dispNmileageAdminConfig->ruleset='';
$info->action->dispNmileageAdminConfig->method='';
$info->action->dispNmileageAdminInsertModInst = new stdClass;
$info->action->dispNmileageAdminInsertModInst->type='view';
$info->action->dispNmileageAdminInsertModInst->grant='guest';
$info->action->dispNmileageAdminInsertModInst->standalone='true';
$info->action->dispNmileageAdminInsertModInst->ruleset='';
$info->action->dispNmileageAdminInsertModInst->method='';
$info->action->dispNmileageAdminAdditionSetup = new stdClass;
$info->action->dispNmileageAdminAdditionSetup->type='view';
$info->action->dispNmileageAdminAdditionSetup->grant='guest';
$info->action->dispNmileageAdminAdditionSetup->standalone='true';
$info->action->dispNmileageAdminAdditionSetup->ruleset='';
$info->action->dispNmileageAdminAdditionSetup->method='';
$info->action->dispNmileageAdminSkinInfo = new stdClass;
$info->action->dispNmileageAdminSkinInfo->type='view';
$info->action->dispNmileageAdminSkinInfo->grant='guest';
$info->action->dispNmileageAdminSkinInfo->standalone='true';
$info->action->dispNmileageAdminSkinInfo->ruleset='';
$info->action->dispNmileageAdminSkinInfo->method='';
$info->action->dispNmileageAdminMobileSkinInfo = new stdClass;
$info->action->dispNmileageAdminMobileSkinInfo->type='view';
$info->action->dispNmileageAdminMobileSkinInfo->grant='guest';
$info->action->dispNmileageAdminMobileSkinInfo->standalone='true';
$info->action->dispNmileageAdminMobileSkinInfo->ruleset='';
$info->action->dispNmileageAdminMobileSkinInfo->method='';
$info->action->dispNmileageAdminMileageList = new stdClass;
$info->action->dispNmileageAdminMileageList->type='view';
$info->action->dispNmileageAdminMileageList->grant='guest';
$info->action->dispNmileageAdminMileageList->standalone='true';
$info->action->dispNmileageAdminMileageList->ruleset='';
$info->action->dispNmileageAdminMileageList->method='';
$info->action->dispNmileageAdminMileageHistory = new stdClass;
$info->action->dispNmileageAdminMileageHistory->type='view';
$info->action->dispNmileageAdminMileageHistory->grant='guest';
$info->action->dispNmileageAdminMileageHistory->standalone='true';
$info->action->dispNmileageAdminMileageHistory->ruleset='';
$info->action->dispNmileageAdminMileageHistory->method='';
$info->action->dispNmileageAdminAllMileageHistory = new stdClass;
$info->action->dispNmileageAdminAllMileageHistory->type='view';
$info->action->dispNmileageAdminAllMileageHistory->grant='guest';
$info->action->dispNmileageAdminAllMileageHistory->standalone='true';
$info->action->dispNmileageAdminAllMileageHistory->ruleset='';
$info->action->dispNmileageAdminAllMileageHistory->method='';
$info->action->procNmileageAdminConfig = new stdClass;
$info->action->procNmileageAdminConfig->type='controller';
$info->action->procNmileageAdminConfig->grant='guest';
$info->action->procNmileageAdminConfig->standalone='true';
$info->action->procNmileageAdminConfig->ruleset='';
$info->action->procNmileageAdminConfig->method='';
$info->action->procNmileageAdminInsertModInst = new stdClass;
$info->action->procNmileageAdminInsertModInst->type='controller';
$info->action->procNmileageAdminInsertModInst->grant='guest';
$info->action->procNmileageAdminInsertModInst->standalone='true';
$info->action->procNmileageAdminInsertModInst->ruleset='';
$info->action->procNmileageAdminInsertModInst->method='';
$info->action->procNmileageAdminDeleteModInst = new stdClass;
$info->action->procNmileageAdminDeleteModInst->type='controller';
$info->action->procNmileageAdminDeleteModInst->grant='guest';
$info->action->procNmileageAdminDeleteModInst->standalone='true';
$info->action->procNmileageAdminDeleteModInst->ruleset='';
$info->action->procNmileageAdminDeleteModInst->method='';
$info->action->procNmileageAdminPlusMileage = new stdClass;
$info->action->procNmileageAdminPlusMileage->type='controller';
$info->action->procNmileageAdminPlusMileage->grant='guest';
$info->action->procNmileageAdminPlusMileage->standalone='true';
$info->action->procNmileageAdminPlusMileage->ruleset='insertMileage';
$info->action->procNmileageAdminPlusMileage->method='';
$info->action->procNmileageAdminMinusMileage = new stdClass;
$info->action->procNmileageAdminMinusMileage->type='controller';
$info->action->procNmileageAdminMinusMileage->grant='guest';
$info->action->procNmileageAdminMinusMileage->standalone='true';
$info->action->procNmileageAdminMinusMileage->ruleset='';
$info->action->procNmileageAdminMinusMileage->method='';
$info->action->getNmileageAdminDeleteModInst = new stdClass;
$info->action->getNmileageAdminDeleteModInst->type='model';
$info->action->getNmileageAdminDeleteModInst->grant='guest';
$info->action->getNmileageAdminDeleteModInst->standalone='true';
$info->action->getNmileageAdminDeleteModInst->ruleset='';
$info->action->getNmileageAdminDeleteModInst->method='';
$info->action->getNmileageAdminPlusMileage = new stdClass;
$info->action->getNmileageAdminPlusMileage->type='model';
$info->action->getNmileageAdminPlusMileage->grant='guest';
$info->action->getNmileageAdminPlusMileage->standalone='true';
$info->action->getNmileageAdminPlusMileage->ruleset='';
$info->action->getNmileageAdminPlusMileage->method='';
$info->action->getNmileageAdminMinusMileage = new stdClass;
$info->action->getNmileageAdminMinusMileage->type='model';
$info->action->getNmileageAdminMinusMileage->grant='guest';
$info->action->getNmileageAdminMinusMileage->standalone='true';
$info->action->getNmileageAdminMinusMileage->ruleset='';
$info->action->getNmileageAdminMinusMileage->method='';
$info->action->getNmileageAdminCheckUserId = new stdClass;
$info->action->getNmileageAdminCheckUserId->type='model';
$info->action->getNmileageAdminCheckUserId->grant='guest';
$info->action->getNmileageAdminCheckUserId->standalone='true';
$info->action->getNmileageAdminCheckUserId->ruleset='';
$info->action->getNmileageAdminCheckUserId->method='';
$info->action->getMileage = new stdClass;
$info->action->getMileage->type='model';
$info->action->getMileage->grant='guest';
$info->action->getMileage->standalone='true';
$info->action->getMileage->ruleset='';
$info->action->getMileage->method='';
$info->action->dispNmileageMileageHistory = new stdClass;
$info->action->dispNmileageMileageHistory->type='view';
$info->action->dispNmileageMileageHistory->grant='guest';
$info->action->dispNmileageMileageHistory->standalone='true';
$info->action->dispNmileageMileageHistory->ruleset='';
$info->action->dispNmileageMileageHistory->method='';
$info->action->dispNmileageMyMileage = new stdClass;
$info->action->dispNmileageMyMileage->type='view';
$info->action->dispNmileageMyMileage->grant='guest';
$info->action->dispNmileageMyMileage->standalone='true';
$info->action->dispNmileageMyMileage->ruleset='';
$info->action->dispNmileageMyMileage->method='';
return $info;