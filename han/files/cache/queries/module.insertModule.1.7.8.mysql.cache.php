<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModule");
$query->setAction("insert");
$query->setPriority("");

${'site_srl156_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl156_argument'}->ensureDefaultValue('0');
${'site_srl156_argument'}->checkNotNull();
if(!${'site_srl156_argument'}->isValid()) return ${'site_srl156_argument'}->getErrorMessage();
if(${'site_srl156_argument'} !== null) ${'site_srl156_argument'}->setColumnType('number');

${'module_srl157_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl157_argument'}->checkNotNull();
if(!${'module_srl157_argument'}->isValid()) return ${'module_srl157_argument'}->getErrorMessage();
if(${'module_srl157_argument'} !== null) ${'module_srl157_argument'}->setColumnType('number');

${'module_category_srl158_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
${'module_category_srl158_argument'}->ensureDefaultValue('0');
if(!${'module_category_srl158_argument'}->isValid()) return ${'module_category_srl158_argument'}->getErrorMessage();
if(${'module_category_srl158_argument'} !== null) ${'module_category_srl158_argument'}->setColumnType('number');

${'mid159_argument'} = new Argument('mid', $args->{'mid'});
${'mid159_argument'}->checkNotNull();
if(!${'mid159_argument'}->isValid()) return ${'mid159_argument'}->getErrorMessage();
if(${'mid159_argument'} !== null) ${'mid159_argument'}->setColumnType('varchar');
if(isset($args->skin)) {
${'skin160_argument'} = new Argument('skin', $args->{'skin'});
if(!${'skin160_argument'}->isValid()) return ${'skin160_argument'}->getErrorMessage();
} else
${'skin160_argument'} = NULL;if(${'skin160_argument'} !== null) ${'skin160_argument'}->setColumnType('varchar');

${'is_skin_fix161_argument'} = new Argument('is_skin_fix', $args->{'is_skin_fix'});
${'is_skin_fix161_argument'}->ensureDefaultValue('N');
if(!${'is_skin_fix161_argument'}->isValid()) return ${'is_skin_fix161_argument'}->getErrorMessage();
if(${'is_skin_fix161_argument'} !== null) ${'is_skin_fix161_argument'}->setColumnType('char');

${'is_mskin_fix162_argument'} = new Argument('is_mskin_fix', $args->{'is_mskin_fix'});
${'is_mskin_fix162_argument'}->ensureDefaultValue('N');
if(!${'is_mskin_fix162_argument'}->isValid()) return ${'is_mskin_fix162_argument'}->getErrorMessage();
if(${'is_mskin_fix162_argument'} !== null) ${'is_mskin_fix162_argument'}->setColumnType('char');
if(isset($args->mskin)) {
${'mskin163_argument'} = new Argument('mskin', $args->{'mskin'});
if(!${'mskin163_argument'}->isValid()) return ${'mskin163_argument'}->getErrorMessage();
} else
${'mskin163_argument'} = NULL;if(${'mskin163_argument'} !== null) ${'mskin163_argument'}->setColumnType('varchar');

${'browser_title164_argument'} = new Argument('browser_title', $args->{'browser_title'});
${'browser_title164_argument'}->checkNotNull();
if(!${'browser_title164_argument'}->isValid()) return ${'browser_title164_argument'}->getErrorMessage();
if(${'browser_title164_argument'} !== null) ${'browser_title164_argument'}->setColumnType('varchar');
if(isset($args->layout_srl)) {
${'layout_srl165_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl165_argument'}->isValid()) return ${'layout_srl165_argument'}->getErrorMessage();
} else
${'layout_srl165_argument'} = NULL;if(${'layout_srl165_argument'} !== null) ${'layout_srl165_argument'}->setColumnType('number');
if(isset($args->description)) {
${'description166_argument'} = new Argument('description', $args->{'description'});
if(!${'description166_argument'}->isValid()) return ${'description166_argument'}->getErrorMessage();
} else
${'description166_argument'} = NULL;if(${'description166_argument'} !== null) ${'description166_argument'}->setColumnType('text');
if(isset($args->content)) {
${'content167_argument'} = new Argument('content', $args->{'content'});
if(!${'content167_argument'}->isValid()) return ${'content167_argument'}->getErrorMessage();
} else
${'content167_argument'} = NULL;if(${'content167_argument'} !== null) ${'content167_argument'}->setColumnType('bigtext');
if(isset($args->mcontent)) {
${'mcontent168_argument'} = new Argument('mcontent', $args->{'mcontent'});
if(!${'mcontent168_argument'}->isValid()) return ${'mcontent168_argument'}->getErrorMessage();
} else
${'mcontent168_argument'} = NULL;if(${'mcontent168_argument'} !== null) ${'mcontent168_argument'}->setColumnType('bigtext');

${'module169_argument'} = new Argument('module', $args->{'module'});
${'module169_argument'}->checkNotNull();
if(!${'module169_argument'}->isValid()) return ${'module169_argument'}->getErrorMessage();
if(${'module169_argument'} !== null) ${'module169_argument'}->setColumnType('varchar');

${'is_default170_argument'} = new Argument('is_default', $args->{'is_default'});
${'is_default170_argument'}->ensureDefaultValue('N');
${'is_default170_argument'}->checkNotNull();
if(!${'is_default170_argument'}->isValid()) return ${'is_default170_argument'}->getErrorMessage();
if(${'is_default170_argument'} !== null) ${'is_default170_argument'}->setColumnType('char');
if(isset($args->menu_srl)) {
${'menu_srl171_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl171_argument'}->checkFilter('number');
if(!${'menu_srl171_argument'}->isValid()) return ${'menu_srl171_argument'}->getErrorMessage();
} else
${'menu_srl171_argument'} = NULL;if(${'menu_srl171_argument'} !== null) ${'menu_srl171_argument'}->setColumnType('number');

${'open_rss172_argument'} = new Argument('open_rss', $args->{'open_rss'});
${'open_rss172_argument'}->ensureDefaultValue('Y');
${'open_rss172_argument'}->checkNotNull();
if(!${'open_rss172_argument'}->isValid()) return ${'open_rss172_argument'}->getErrorMessage();
if(${'open_rss172_argument'} !== null) ${'open_rss172_argument'}->setColumnType('char');
if(isset($args->header_text)) {
${'header_text173_argument'} = new Argument('header_text', $args->{'header_text'});
if(!${'header_text173_argument'}->isValid()) return ${'header_text173_argument'}->getErrorMessage();
} else
${'header_text173_argument'} = NULL;if(${'header_text173_argument'} !== null) ${'header_text173_argument'}->setColumnType('text');
if(isset($args->footer_text)) {
${'footer_text174_argument'} = new Argument('footer_text', $args->{'footer_text'});
if(!${'footer_text174_argument'}->isValid()) return ${'footer_text174_argument'}->getErrorMessage();
} else
${'footer_text174_argument'} = NULL;if(${'footer_text174_argument'} !== null) ${'footer_text174_argument'}->setColumnType('text');

${'regdate175_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate175_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate175_argument'}->isValid()) return ${'regdate175_argument'}->getErrorMessage();
if(${'regdate175_argument'} !== null) ${'regdate175_argument'}->setColumnType('date');
if(isset($args->mlayout_srl)) {
${'mlayout_srl176_argument'} = new Argument('mlayout_srl', $args->{'mlayout_srl'});
if(!${'mlayout_srl176_argument'}->isValid()) return ${'mlayout_srl176_argument'}->getErrorMessage();
} else
${'mlayout_srl176_argument'} = NULL;if(${'mlayout_srl176_argument'} !== null) ${'mlayout_srl176_argument'}->setColumnType('number');

${'use_mobile177_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
${'use_mobile177_argument'}->ensureDefaultValue('N');
if(!${'use_mobile177_argument'}->isValid()) return ${'use_mobile177_argument'}->getErrorMessage();
if(${'use_mobile177_argument'} !== null) ${'use_mobile177_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl156_argument'})
,new InsertExpression('`module_srl`', ${'module_srl157_argument'})
,new InsertExpression('`module_category_srl`', ${'module_category_srl158_argument'})
,new InsertExpression('`mid`', ${'mid159_argument'})
,new InsertExpression('`skin`', ${'skin160_argument'})
,new InsertExpression('`is_skin_fix`', ${'is_skin_fix161_argument'})
,new InsertExpression('`is_mskin_fix`', ${'is_mskin_fix162_argument'})
,new InsertExpression('`mskin`', ${'mskin163_argument'})
,new InsertExpression('`browser_title`', ${'browser_title164_argument'})
,new InsertExpression('`layout_srl`', ${'layout_srl165_argument'})
,new InsertExpression('`description`', ${'description166_argument'})
,new InsertExpression('`content`', ${'content167_argument'})
,new InsertExpression('`mcontent`', ${'mcontent168_argument'})
,new InsertExpression('`module`', ${'module169_argument'})
,new InsertExpression('`is_default`', ${'is_default170_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl171_argument'})
,new InsertExpression('`open_rss`', ${'open_rss172_argument'})
,new InsertExpression('`header_text`', ${'header_text173_argument'})
,new InsertExpression('`footer_text`', ${'footer_text174_argument'})
,new InsertExpression('`regdate`', ${'regdate175_argument'})
,new InsertExpression('`mlayout_srl`', ${'mlayout_srl176_argument'})
,new InsertExpression('`use_mobile`', ${'use_mobile177_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>