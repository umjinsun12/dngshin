<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = 'dispPageIndex';
$info->setup_index_act='dispPageAdminInfo';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispPageAdminContent';
$info->permission = new stdClass;
$info->permission->procPageAdminRemoveWidgetCache = 'manager';
$info->permission->dispPageAdminContentModify = 'manager';
$info->permission->procPageAdminInsert = 'manager';
$info->permission->procPageAdminInsertContent = 'manager';
$info->menu = new stdClass;
$info->menu->page = new stdClass;
$info->menu->page->title='페이지';
$info->menu->page->type='all';
$info->action = new stdClass;
$info->action->dispPageIndex = new stdClass;
$info->action->dispPageIndex->type='view';
$info->action->dispPageIndex->grant='guest';
$info->action->dispPageIndex->standalone='true';
$info->action->dispPageIndex->ruleset='';
$info->action->dispPageIndex->method='';
$info->menu->page->index='dispPageAdminContent';
$info->menu->page->acts[0]='dispPageAdminContent';
$info->action->dispPageAdminContent = new stdClass;
$info->action->dispPageAdminContent->type='view';
$info->action->dispPageAdminContent->grant='guest';
$info->action->dispPageAdminContent->standalone='true';
$info->action->dispPageAdminContent->ruleset='';
$info->action->dispPageAdminContent->method='';
$info->menu->page->acts[1]='dispPageAdminGrantInfo';
$info->action->dispPageAdminGrantInfo = new stdClass;
$info->action->dispPageAdminGrantInfo->type='view';
$info->action->dispPageAdminGrantInfo->grant='guest';
$info->action->dispPageAdminGrantInfo->standalone='true';
$info->action->dispPageAdminGrantInfo->ruleset='';
$info->action->dispPageAdminGrantInfo->method='';
$info->menu->page->acts[2]='dispPageAdminInfo';
$info->action->dispPageAdminInfo = new stdClass;
$info->action->dispPageAdminInfo->type='view';
$info->action->dispPageAdminInfo->grant='guest';
$info->action->dispPageAdminInfo->standalone='true';
$info->action->dispPageAdminInfo->ruleset='';
$info->action->dispPageAdminInfo->method='';
$info->menu->page->acts[3]='dispPageAdminPageAdditionSetup';
$info->action->dispPageAdminPageAdditionSetup = new stdClass;
$info->action->dispPageAdminPageAdditionSetup->type='view';
$info->action->dispPageAdminPageAdditionSetup->grant='guest';
$info->action->dispPageAdminPageAdditionSetup->standalone='true';
$info->action->dispPageAdminPageAdditionSetup->ruleset='';
$info->action->dispPageAdminPageAdditionSetup->method='';
$info->action->dispPageAdminDelete = new stdClass;
$info->action->dispPageAdminDelete->type='view';
$info->action->dispPageAdminDelete->grant='guest';
$info->action->dispPageAdminDelete->standalone='true';
$info->action->dispPageAdminDelete->ruleset='';
$info->action->dispPageAdminDelete->method='';
$info->action->dispPageAdminContentModify = new stdClass;
$info->action->dispPageAdminContentModify->type='view';
$info->action->dispPageAdminContentModify->grant='guest';
$info->action->dispPageAdminContentModify->standalone='true';
$info->action->dispPageAdminContentModify->ruleset='';
$info->action->dispPageAdminContentModify->method='';
$info->action->dispPageAdminAddContent = new stdClass;
$info->action->dispPageAdminAddContent->type='view';
$info->action->dispPageAdminAddContent->grant='guest';
$info->action->dispPageAdminAddContent->standalone='true';
$info->action->dispPageAdminAddContent->ruleset='';
$info->action->dispPageAdminAddContent->method='';
$info->action->dispPageAdminMobileContentModify = new stdClass;
$info->action->dispPageAdminMobileContentModify->type='view';
$info->action->dispPageAdminMobileContentModify->grant='guest';
$info->action->dispPageAdminMobileContentModify->standalone='true';
$info->action->dispPageAdminMobileContentModify->ruleset='';
$info->action->dispPageAdminMobileContentModify->method='';
$info->action->dispPageAdminMobileContent = new stdClass;
$info->action->dispPageAdminMobileContent->type='view';
$info->action->dispPageAdminMobileContent->grant='guest';
$info->action->dispPageAdminMobileContent->standalone='true';
$info->action->dispPageAdminMobileContent->ruleset='';
$info->action->dispPageAdminMobileContent->method='';
$info->action->dispPageAdminSkinInfo = new stdClass;
$info->action->dispPageAdminSkinInfo->type='view';
$info->action->dispPageAdminSkinInfo->grant='guest';
$info->action->dispPageAdminSkinInfo->standalone='true';
$info->action->dispPageAdminSkinInfo->ruleset='';
$info->action->dispPageAdminSkinInfo->method='';
$info->action->dispPageAdminMobileSkinInfo = new stdClass;
$info->action->dispPageAdminMobileSkinInfo->type='view';
$info->action->dispPageAdminMobileSkinInfo->grant='guest';
$info->action->dispPageAdminMobileSkinInfo->standalone='true';
$info->action->dispPageAdminMobileSkinInfo->ruleset='';
$info->action->dispPageAdminMobileSkinInfo->method='';
$info->action->procPageAdminRemoveWidgetCache = new stdClass;
$info->action->procPageAdminRemoveWidgetCache->type='controller';
$info->action->procPageAdminRemoveWidgetCache->grant='guest';
$info->action->procPageAdminRemoveWidgetCache->standalone='true';
$info->action->procPageAdminRemoveWidgetCache->ruleset='';
$info->action->procPageAdminRemoveWidgetCache->method='';
$info->action->procPageAdminInsert = new stdClass;
$info->action->procPageAdminInsert->type='controller';
$info->action->procPageAdminInsert->grant='guest';
$info->action->procPageAdminInsert->standalone='true';
$info->action->procPageAdminInsert->ruleset='insertPage';
$info->action->procPageAdminInsert->method='';
$info->action->procPageAdminUpdate = new stdClass;
$info->action->procPageAdminUpdate->type='controller';
$info->action->procPageAdminUpdate->grant='guest';
$info->action->procPageAdminUpdate->standalone='true';
$info->action->procPageAdminUpdate->ruleset='updatePage';
$info->action->procPageAdminUpdate->method='';
$info->action->procPageAdminInsertContent = new stdClass;
$info->action->procPageAdminInsertContent->type='controller';
$info->action->procPageAdminInsertContent->grant='guest';
$info->action->procPageAdminInsertContent->standalone='true';
$info->action->procPageAdminInsertContent->ruleset='';
$info->action->procPageAdminInsertContent->method='';
$info->action->procPageAdminDelete = new stdClass;
$info->action->procPageAdminDelete->type='controller';
$info->action->procPageAdminDelete->grant='guest';
$info->action->procPageAdminDelete->standalone='true';
$info->action->procPageAdminDelete->ruleset='deletePage';
$info->action->procPageAdminDelete->method='';
$info->action->procPageAdminInsertConfig = new stdClass;
$info->action->procPageAdminInsertConfig->type='controller';
$info->action->procPageAdminInsertConfig->grant='guest';
$info->action->procPageAdminInsertConfig->standalone='true';
$info->action->procPageAdminInsertConfig->ruleset='';
$info->action->procPageAdminInsertConfig->method='';
$info->action->procPageAdminAddContent = new stdClass;
$info->action->procPageAdminAddContent->type='controller';
$info->action->procPageAdminAddContent->grant='guest';
$info->action->procPageAdminAddContent->standalone='true';
$info->action->procPageAdminAddContent->ruleset='';
$info->action->procPageAdminAddContent->method='';
$info->action->procPageAdminArticleDocumentInsert = new stdClass;
$info->action->procPageAdminArticleDocumentInsert->type='controller';
$info->action->procPageAdminArticleDocumentInsert->grant='guest';
$info->action->procPageAdminArticleDocumentInsert->standalone='true';
$info->action->procPageAdminArticleDocumentInsert->ruleset='';
$info->action->procPageAdminArticleDocumentInsert->method='';
return $info;