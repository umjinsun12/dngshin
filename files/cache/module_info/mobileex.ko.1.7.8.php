<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = '';
$info->setup_index_act='';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispMobileexAdminConfig';
$info->permission = new stdClass;
$info->permission->dispMobileexAdminConfig = 'manager';
$info->permission->dispMobileexAdminModuleList = 'manager';
$info->permission->dispMobileexAdminEachConfig = 'manager';
$info->permission->procMobileexAdminInsertEachConfig = 'manager';
$info->action = new stdClass;
$info->action->MEIS = new stdClass;
$info->action->MEIS->type='view';
$info->action->MEIS->grant='guest';
$info->action->MEIS->standalone='true';
$info->action->MEIS->ruleset='';
$info->action->MEIS->method='';
$info->action->dispMobileexMemberInfo = new stdClass;
$info->action->dispMobileexMemberInfo->type='view';
$info->action->dispMobileexMemberInfo->grant='guest';
$info->action->dispMobileexMemberInfo->standalone='true';
$info->action->dispMobileexMemberInfo->ruleset='';
$info->action->dispMobileexMemberInfo->method='';
$info->action->dispMobileexModifyPassword = new stdClass;
$info->action->dispMobileexModifyPassword->type='view';
$info->action->dispMobileexModifyPassword->grant='guest';
$info->action->dispMobileexModifyPassword->standalone='true';
$info->action->dispMobileexModifyPassword->ruleset='';
$info->action->dispMobileexModifyPassword->method='';
$info->action->dispMobileexScrappedDocument = new stdClass;
$info->action->dispMobileexScrappedDocument->type='view';
$info->action->dispMobileexScrappedDocument->grant='guest';
$info->action->dispMobileexScrappedDocument->standalone='true';
$info->action->dispMobileexScrappedDocument->ruleset='';
$info->action->dispMobileexScrappedDocument->method='';
$info->action->dispMobileexSavedDocument = new stdClass;
$info->action->dispMobileexSavedDocument->type='view';
$info->action->dispMobileexSavedDocument->grant='guest';
$info->action->dispMobileexSavedDocument->standalone='true';
$info->action->dispMobileexSavedDocument->ruleset='';
$info->action->dispMobileexSavedDocument->method='';
$info->action->dispMobileexOwnDocument = new stdClass;
$info->action->dispMobileexOwnDocument->type='view';
$info->action->dispMobileexOwnDocument->grant='guest';
$info->action->dispMobileexOwnDocument->standalone='true';
$info->action->dispMobileexOwnDocument->ruleset='';
$info->action->dispMobileexOwnDocument->method='';
$info->action->dispMobileexMessages = new stdClass;
$info->action->dispMobileexMessages->type='view';
$info->action->dispMobileexMessages->grant='guest';
$info->action->dispMobileexMessages->standalone='true';
$info->action->dispMobileexMessages->ruleset='';
$info->action->dispMobileexMessages->method='';
$info->action->dispMobileexMessageView = new stdClass;
$info->action->dispMobileexMessageView->type='view';
$info->action->dispMobileexMessageView->grant='guest';
$info->action->dispMobileexMessageView->standalone='true';
$info->action->dispMobileexMessageView->ruleset='';
$info->action->dispMobileexMessageView->method='';
$info->action->dispMobileexSendMessage = new stdClass;
$info->action->dispMobileexSendMessage->type='view';
$info->action->dispMobileexSendMessage->grant='guest';
$info->action->dispMobileexSendMessage->standalone='true';
$info->action->dispMobileexSendMessage->ruleset='';
$info->action->dispMobileexSendMessage->method='';
$info->action->mobileFileDelete = new stdClass;
$info->action->mobileFileDelete->type='controller';
$info->action->mobileFileDelete->grant='guest';
$info->action->mobileFileDelete->standalone='true';
$info->action->mobileFileDelete->ruleset='';
$info->action->mobileFileDelete->method='';
$info->action->mobileFileUpload = new stdClass;
$info->action->mobileFileUpload->type='controller';
$info->action->mobileFileUpload->grant='guest';
$info->action->mobileFileUpload->standalone='true';
$info->action->mobileFileUpload->ruleset='';
$info->action->mobileFileUpload->method='';
$info->action->mobileInsertAddFile = new stdClass;
$info->action->mobileInsertAddFile->type='controller';
$info->action->mobileInsertAddFile->grant='guest';
$info->action->mobileInsertAddFile->standalone='true';
$info->action->mobileInsertAddFile->ruleset='';
$info->action->mobileInsertAddFile->method='';
$info->action->mobileDeleteAddFile = new stdClass;
$info->action->mobileDeleteAddFile->type='controller';
$info->action->mobileDeleteAddFile->grant='guest';
$info->action->mobileDeleteAddFile->standalone='true';
$info->action->mobileDeleteAddFile->ruleset='';
$info->action->mobileDeleteAddFile->method='';
$info->action->mobileUpdateAddFile = new stdClass;
$info->action->mobileUpdateAddFile->type='controller';
$info->action->mobileUpdateAddFile->grant='guest';
$info->action->mobileUpdateAddFile->standalone='true';
$info->action->mobileUpdateAddFile->ruleset='';
$info->action->mobileUpdateAddFile->method='';
$info->action->dispMobileexAdminConfig = new stdClass;
$info->action->dispMobileexAdminConfig->type='view';
$info->action->dispMobileexAdminConfig->grant='guest';
$info->action->dispMobileexAdminConfig->standalone='true';
$info->action->dispMobileexAdminConfig->ruleset='';
$info->action->dispMobileexAdminConfig->method='';
$info->action->dispMobileexAdminModuleList = new stdClass;
$info->action->dispMobileexAdminModuleList->type='view';
$info->action->dispMobileexAdminModuleList->grant='guest';
$info->action->dispMobileexAdminModuleList->standalone='true';
$info->action->dispMobileexAdminModuleList->ruleset='';
$info->action->dispMobileexAdminModuleList->method='';
$info->action->dispMobileexAdminEachConfig = new stdClass;
$info->action->dispMobileexAdminEachConfig->type='view';
$info->action->dispMobileexAdminEachConfig->grant='guest';
$info->action->dispMobileexAdminEachConfig->standalone='true';
$info->action->dispMobileexAdminEachConfig->ruleset='';
$info->action->dispMobileexAdminEachConfig->method='';
$info->action->dispMobileexAdminModuleDelete = new stdClass;
$info->action->dispMobileexAdminModuleDelete->type='view';
$info->action->dispMobileexAdminModuleDelete->grant='guest';
$info->action->dispMobileexAdminModuleDelete->standalone='true';
$info->action->dispMobileexAdminModuleDelete->ruleset='';
$info->action->dispMobileexAdminModuleDelete->method='';
$info->action->dispMobileexAdminMobileSkinInfo = new stdClass;
$info->action->dispMobileexAdminMobileSkinInfo->type='view';
$info->action->dispMobileexAdminMobileSkinInfo->grant='guest';
$info->action->dispMobileexAdminMobileSkinInfo->standalone='true';
$info->action->dispMobileexAdminMobileSkinInfo->ruleset='';
$info->action->dispMobileexAdminMobileSkinInfo->method='';
$info->action->procMobileexAdminInsertConfig = new stdClass;
$info->action->procMobileexAdminInsertConfig->type='controller';
$info->action->procMobileexAdminInsertConfig->grant='guest';
$info->action->procMobileexAdminInsertConfig->standalone='true';
$info->action->procMobileexAdminInsertConfig->ruleset='insertConfig';
$info->action->procMobileexAdminInsertConfig->method='';
$info->action->procMobileexAdminInsertEachConfig = new stdClass;
$info->action->procMobileexAdminInsertEachConfig->type='controller';
$info->action->procMobileexAdminInsertEachConfig->grant='guest';
$info->action->procMobileexAdminInsertEachConfig->standalone='true';
$info->action->procMobileexAdminInsertEachConfig->ruleset='insertEachConfig';
$info->action->procMobileexAdminInsertEachConfig->method='';
$info->action->procMobileexAdminModuleDelete = new stdClass;
$info->action->procMobileexAdminModuleDelete->type='controller';
$info->action->procMobileexAdminModuleDelete->grant='guest';
$info->action->procMobileexAdminModuleDelete->standalone='true';
$info->action->procMobileexAdminModuleDelete->ruleset='';
$info->action->procMobileexAdminModuleDelete->method='';
$info->action->procMobileexAdminUpdateSkinInfo = new stdClass;
$info->action->procMobileexAdminUpdateSkinInfo->type='controller';
$info->action->procMobileexAdminUpdateSkinInfo->grant='guest';
$info->action->procMobileexAdminUpdateSkinInfo->standalone='true';
$info->action->procMobileexAdminUpdateSkinInfo->ruleset='';
$info->action->procMobileexAdminUpdateSkinInfo->method='';
$info->action->procMobileexModifyPassword = new stdClass;
$info->action->procMobileexModifyPassword->type='controller';
$info->action->procMobileexModifyPassword->grant='guest';
$info->action->procMobileexModifyPassword->standalone='true';
$info->action->procMobileexModifyPassword->ruleset='';
$info->action->procMobileexModifyPassword->method='';
$info->action->procMobileexDeleteMessage = new stdClass;
$info->action->procMobileexDeleteMessage->type='controller';
$info->action->procMobileexDeleteMessage->grant='guest';
$info->action->procMobileexDeleteMessage->standalone='true';
$info->action->procMobileexDeleteMessage->ruleset='';
$info->action->procMobileexDeleteMessage->method='';
$info->action->procMobileexSendMessage = new stdClass;
$info->action->procMobileexSendMessage->type='controller';
$info->action->procMobileexSendMessage->grant='guest';
$info->action->procMobileexSendMessage->standalone='true';
$info->action->procMobileexSendMessage->ruleset='';
$info->action->procMobileexSendMessage->method='';
$info->action->getMobileexCommentList = new stdClass;
$info->action->getMobileexCommentList->type='mobile';
$info->action->getMobileexCommentList->grant='guest';
$info->action->getMobileexCommentList->standalone='true';
$info->action->getMobileexCommentList->ruleset='';
$info->action->getMobileexCommentList->method='';
$info->action->getMobileexSubCommentList = new stdClass;
$info->action->getMobileexSubCommentList->type='mobile';
$info->action->getMobileexSubCommentList->grant='guest';
$info->action->getMobileexSubCommentList->standalone='true';
$info->action->getMobileexSubCommentList->ruleset='';
$info->action->getMobileexSubCommentList->method='';
return $info;