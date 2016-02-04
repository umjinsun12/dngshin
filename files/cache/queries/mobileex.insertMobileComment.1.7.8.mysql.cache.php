<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMobileComment");
$query->setAction("insert");
$query->setPriority("");

${'comment_srl1_argument'} = new Argument('comment_srl', $args->{'comment_srl'});
${'comment_srl1_argument'}->checkNotNull();
if(!${'comment_srl1_argument'}->isValid()) return ${'comment_srl1_argument'}->getErrorMessage();
if(${'comment_srl1_argument'} !== null) ${'comment_srl1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'parent_srl3_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl3_argument'}->checkFilter('number');
${'parent_srl3_argument'}->ensureDefaultValue('0');
if(!${'parent_srl3_argument'}->isValid()) return ${'parent_srl3_argument'}->getErrorMessage();
if(${'parent_srl3_argument'} !== null) ${'parent_srl3_argument'}->setColumnType('number');

${'document_srl4_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl4_argument'}->checkFilter('number');
${'document_srl4_argument'}->checkNotNull();
if(!${'document_srl4_argument'}->isValid()) return ${'document_srl4_argument'}->getErrorMessage();
if(${'document_srl4_argument'} !== null) ${'document_srl4_argument'}->setColumnType('number');

${'is_secret5_argument'} = new Argument('is_secret', $args->{'is_secret'});
${'is_secret5_argument'}->ensureDefaultValue('N');
if(!${'is_secret5_argument'}->isValid()) return ${'is_secret5_argument'}->getErrorMessage();
if(${'is_secret5_argument'} !== null) ${'is_secret5_argument'}->setColumnType('char');

${'notify_message6_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message6_argument'}->ensureDefaultValue('N');
if(!${'notify_message6_argument'}->isValid()) return ${'notify_message6_argument'}->getErrorMessage();
if(${'notify_message6_argument'} !== null) ${'notify_message6_argument'}->setColumnType('char');

${'content7_argument'} = new Argument('content', $args->{'content'});
${'content7_argument'}->checkNotNull();
if(!${'content7_argument'}->isValid()) return ${'content7_argument'}->getErrorMessage();
if(${'content7_argument'} !== null) ${'content7_argument'}->setColumnType('bigtext');

${'voted_count8_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count8_argument'}->ensureDefaultValue('0');
if(!${'voted_count8_argument'}->isValid()) return ${'voted_count8_argument'}->getErrorMessage();
if(${'voted_count8_argument'} !== null) ${'voted_count8_argument'}->setColumnType('number');

${'blamed_count9_argument'} = new Argument('blamed_count', $args->{'blamed_count'});
${'blamed_count9_argument'}->ensureDefaultValue('0');
if(!${'blamed_count9_argument'}->isValid()) return ${'blamed_count9_argument'}->getErrorMessage();
if(${'blamed_count9_argument'} !== null) ${'blamed_count9_argument'}->setColumnType('number');
if(isset($args->password)) {
${'password10_argument'} = new Argument('password', $args->{'password'});
if(!${'password10_argument'}->isValid()) return ${'password10_argument'}->getErrorMessage();
} else
${'password10_argument'} = NULL;if(${'password10_argument'} !== null) ${'password10_argument'}->setColumnType('varchar');

${'nick_name11_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name11_argument'}->checkNotNull();
if(!${'nick_name11_argument'}->isValid()) return ${'nick_name11_argument'}->getErrorMessage();
if(${'nick_name11_argument'} !== null) ${'nick_name11_argument'}->setColumnType('varchar');

${'user_id12_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id12_argument'}->ensureDefaultValue('');
if(!${'user_id12_argument'}->isValid()) return ${'user_id12_argument'}->getErrorMessage();
if(${'user_id12_argument'} !== null) ${'user_id12_argument'}->setColumnType('varchar');

${'user_name13_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name13_argument'}->ensureDefaultValue('');
if(!${'user_name13_argument'}->isValid()) return ${'user_name13_argument'}->getErrorMessage();
if(${'user_name13_argument'} !== null) ${'user_name13_argument'}->setColumnType('varchar');

${'member_srl14_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl14_argument'}->checkFilter('number');
${'member_srl14_argument'}->ensureDefaultValue('0');
if(!${'member_srl14_argument'}->isValid()) return ${'member_srl14_argument'}->getErrorMessage();
if(${'member_srl14_argument'} !== null) ${'member_srl14_argument'}->setColumnType('number');
if(isset($args->email_address)) {
${'email_address15_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address15_argument'}->checkFilter('email');
if(!${'email_address15_argument'}->isValid()) return ${'email_address15_argument'}->getErrorMessage();
} else
${'email_address15_argument'} = NULL;if(${'email_address15_argument'} !== null) ${'email_address15_argument'}->setColumnType('varchar');
if(isset($args->homepage)) {
${'homepage16_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage16_argument'}->checkFilter('homepage');
if(!${'homepage16_argument'}->isValid()) return ${'homepage16_argument'}->getErrorMessage();
} else
${'homepage16_argument'} = NULL;if(${'homepage16_argument'} !== null) ${'homepage16_argument'}->setColumnType('varchar');

${'uploaded_count17_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count17_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count17_argument'}->isValid()) return ${'uploaded_count17_argument'}->getErrorMessage();
if(${'uploaded_count17_argument'} !== null) ${'uploaded_count17_argument'}->setColumnType('number');

${'regdate18_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate18_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate18_argument'}->isValid()) return ${'regdate18_argument'}->getErrorMessage();
if(${'regdate18_argument'} !== null) ${'regdate18_argument'}->setColumnType('date');

${'last_update19_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update19_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update19_argument'}->isValid()) return ${'last_update19_argument'}->getErrorMessage();
if(${'last_update19_argument'} !== null) ${'last_update19_argument'}->setColumnType('date');

${'ipaddress20_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress20_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress20_argument'}->isValid()) return ${'ipaddress20_argument'}->getErrorMessage();
if(${'ipaddress20_argument'} !== null) ${'ipaddress20_argument'}->setColumnType('varchar');

${'list_order21_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order21_argument'}->ensureDefaultValue('0');
if(!${'list_order21_argument'}->isValid()) return ${'list_order21_argument'}->getErrorMessage();
if(${'list_order21_argument'} !== null) ${'list_order21_argument'}->setColumnType('number');

${'is_mobile22_argument'} = new Argument('is_mobile', $args->{'is_mobile'});
${'is_mobile22_argument'}->ensureDefaultValue('Y');
if(!${'is_mobile22_argument'}->isValid()) return ${'is_mobile22_argument'}->getErrorMessage();
if(${'is_mobile22_argument'} !== null) ${'is_mobile22_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`comment_srl`', ${'comment_srl1_argument'})
,new InsertExpression('`module_srl`', ${'module_srl2_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl3_argument'})
,new InsertExpression('`document_srl`', ${'document_srl4_argument'})
,new InsertExpression('`is_secret`', ${'is_secret5_argument'})
,new InsertExpression('`notify_message`', ${'notify_message6_argument'})
,new InsertExpression('`content`', ${'content7_argument'})
,new InsertExpression('`voted_count`', ${'voted_count8_argument'})
,new InsertExpression('`blamed_count`', ${'blamed_count9_argument'})
,new InsertExpression('`password`', ${'password10_argument'})
,new InsertExpression('`nick_name`', ${'nick_name11_argument'})
,new InsertExpression('`user_id`', ${'user_id12_argument'})
,new InsertExpression('`user_name`', ${'user_name13_argument'})
,new InsertExpression('`member_srl`', ${'member_srl14_argument'})
,new InsertExpression('`email_address`', ${'email_address15_argument'})
,new InsertExpression('`homepage`', ${'homepage16_argument'})
,new InsertExpression('`uploaded_count`', ${'uploaded_count17_argument'})
,new InsertExpression('`regdate`', ${'regdate18_argument'})
,new InsertExpression('`last_update`', ${'last_update19_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress20_argument'})
,new InsertExpression('`list_order`', ${'list_order21_argument'})
,new InsertExpression('`is_mobile`', ${'is_mobile22_argument'})
));
$query->setTables(array(
new Table('`dbigrus_mobileex_comments`', '`mobileex_comments`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>