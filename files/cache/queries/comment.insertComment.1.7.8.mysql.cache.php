<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertComment");
$query->setAction("insert");
$query->setPriority("");

${'comment_srl8_argument'} = new Argument('comment_srl', $args->{'comment_srl'});
${'comment_srl8_argument'}->checkNotNull();
if(!${'comment_srl8_argument'}->isValid()) return ${'comment_srl8_argument'}->getErrorMessage();
if(${'comment_srl8_argument'} !== null) ${'comment_srl8_argument'}->setColumnType('number');

${'module_srl9_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl9_argument'}->checkFilter('number');
${'module_srl9_argument'}->checkNotNull();
if(!${'module_srl9_argument'}->isValid()) return ${'module_srl9_argument'}->getErrorMessage();
if(${'module_srl9_argument'} !== null) ${'module_srl9_argument'}->setColumnType('number');

${'parent_srl10_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl10_argument'}->checkFilter('number');
${'parent_srl10_argument'}->ensureDefaultValue('0');
if(!${'parent_srl10_argument'}->isValid()) return ${'parent_srl10_argument'}->getErrorMessage();
if(${'parent_srl10_argument'} !== null) ${'parent_srl10_argument'}->setColumnType('number');

${'document_srl11_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl11_argument'}->checkFilter('number');
${'document_srl11_argument'}->checkNotNull();
if(!${'document_srl11_argument'}->isValid()) return ${'document_srl11_argument'}->getErrorMessage();
if(${'document_srl11_argument'} !== null) ${'document_srl11_argument'}->setColumnType('number');

${'is_secret12_argument'} = new Argument('is_secret', $args->{'is_secret'});
${'is_secret12_argument'}->ensureDefaultValue('N');
if(!${'is_secret12_argument'}->isValid()) return ${'is_secret12_argument'}->getErrorMessage();
if(${'is_secret12_argument'} !== null) ${'is_secret12_argument'}->setColumnType('char');

${'notify_message13_argument'} = new Argument('notify_message', $args->{'notify_message'});
${'notify_message13_argument'}->ensureDefaultValue('N');
if(!${'notify_message13_argument'}->isValid()) return ${'notify_message13_argument'}->getErrorMessage();
if(${'notify_message13_argument'} !== null) ${'notify_message13_argument'}->setColumnType('char');

${'content14_argument'} = new Argument('content', $args->{'content'});
${'content14_argument'}->checkNotNull();
if(!${'content14_argument'}->isValid()) return ${'content14_argument'}->getErrorMessage();
if(${'content14_argument'} !== null) ${'content14_argument'}->setColumnType('bigtext');

${'voted_count15_argument'} = new Argument('voted_count', $args->{'voted_count'});
${'voted_count15_argument'}->ensureDefaultValue('0');
if(!${'voted_count15_argument'}->isValid()) return ${'voted_count15_argument'}->getErrorMessage();
if(${'voted_count15_argument'} !== null) ${'voted_count15_argument'}->setColumnType('number');

${'blamed_count16_argument'} = new Argument('blamed_count', $args->{'blamed_count'});
${'blamed_count16_argument'}->ensureDefaultValue('0');
if(!${'blamed_count16_argument'}->isValid()) return ${'blamed_count16_argument'}->getErrorMessage();
if(${'blamed_count16_argument'} !== null) ${'blamed_count16_argument'}->setColumnType('number');
if(isset($args->password)) {
${'password17_argument'} = new Argument('password', $args->{'password'});
if(!${'password17_argument'}->isValid()) return ${'password17_argument'}->getErrorMessage();
} else
${'password17_argument'} = NULL;if(${'password17_argument'} !== null) ${'password17_argument'}->setColumnType('varchar');

${'nick_name18_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name18_argument'}->checkNotNull();
if(!${'nick_name18_argument'}->isValid()) return ${'nick_name18_argument'}->getErrorMessage();
if(${'nick_name18_argument'} !== null) ${'nick_name18_argument'}->setColumnType('varchar');

${'user_id19_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id19_argument'}->ensureDefaultValue('');
if(!${'user_id19_argument'}->isValid()) return ${'user_id19_argument'}->getErrorMessage();
if(${'user_id19_argument'} !== null) ${'user_id19_argument'}->setColumnType('varchar');

${'user_name20_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name20_argument'}->ensureDefaultValue('');
if(!${'user_name20_argument'}->isValid()) return ${'user_name20_argument'}->getErrorMessage();
if(${'user_name20_argument'} !== null) ${'user_name20_argument'}->setColumnType('varchar');

${'member_srl21_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl21_argument'}->checkFilter('number');
${'member_srl21_argument'}->ensureDefaultValue('0');
if(!${'member_srl21_argument'}->isValid()) return ${'member_srl21_argument'}->getErrorMessage();
if(${'member_srl21_argument'} !== null) ${'member_srl21_argument'}->setColumnType('number');

${'email_address22_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address22_argument'}->checkFilter('email');
${'email_address22_argument'}->ensureDefaultValue('');
if(!${'email_address22_argument'}->isValid()) return ${'email_address22_argument'}->getErrorMessage();
if(${'email_address22_argument'} !== null) ${'email_address22_argument'}->setColumnType('varchar');

${'homepage23_argument'} = new Argument('homepage', $args->{'homepage'});
${'homepage23_argument'}->checkFilter('homepage');
${'homepage23_argument'}->ensureDefaultValue('');
if(!${'homepage23_argument'}->isValid()) return ${'homepage23_argument'}->getErrorMessage();
if(${'homepage23_argument'} !== null) ${'homepage23_argument'}->setColumnType('varchar');

${'uploaded_count24_argument'} = new Argument('uploaded_count', $args->{'uploaded_count'});
${'uploaded_count24_argument'}->ensureDefaultValue('0');
if(!${'uploaded_count24_argument'}->isValid()) return ${'uploaded_count24_argument'}->getErrorMessage();
if(${'uploaded_count24_argument'} !== null) ${'uploaded_count24_argument'}->setColumnType('number');

${'regdate25_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate25_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate25_argument'}->isValid()) return ${'regdate25_argument'}->getErrorMessage();
if(${'regdate25_argument'} !== null) ${'regdate25_argument'}->setColumnType('date');

${'last_update26_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update26_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update26_argument'}->isValid()) return ${'last_update26_argument'}->getErrorMessage();
if(${'last_update26_argument'} !== null) ${'last_update26_argument'}->setColumnType('date');

${'ipaddress27_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress27_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress27_argument'}->isValid()) return ${'ipaddress27_argument'}->getErrorMessage();
if(${'ipaddress27_argument'} !== null) ${'ipaddress27_argument'}->setColumnType('varchar');

${'list_order28_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order28_argument'}->ensureDefaultValue('0');
if(!${'list_order28_argument'}->isValid()) return ${'list_order28_argument'}->getErrorMessage();
if(${'list_order28_argument'} !== null) ${'list_order28_argument'}->setColumnType('number');

${'status29_argument'} = new Argument('status', $args->{'status'});
${'status29_argument'}->checkFilter('number');
${'status29_argument'}->checkNotNull();
if(!${'status29_argument'}->isValid()) return ${'status29_argument'}->getErrorMessage();
if(${'status29_argument'} !== null) ${'status29_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`comment_srl`', ${'comment_srl8_argument'})
,new InsertExpression('`module_srl`', ${'module_srl9_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl10_argument'})
,new InsertExpression('`document_srl`', ${'document_srl11_argument'})
,new InsertExpression('`is_secret`', ${'is_secret12_argument'})
,new InsertExpression('`notify_message`', ${'notify_message13_argument'})
,new InsertExpression('`content`', ${'content14_argument'})
,new InsertExpression('`voted_count`', ${'voted_count15_argument'})
,new InsertExpression('`blamed_count`', ${'blamed_count16_argument'})
,new InsertExpression('`password`', ${'password17_argument'})
,new InsertExpression('`nick_name`', ${'nick_name18_argument'})
,new InsertExpression('`user_id`', ${'user_id19_argument'})
,new InsertExpression('`user_name`', ${'user_name20_argument'})
,new InsertExpression('`member_srl`', ${'member_srl21_argument'})
,new InsertExpression('`email_address`', ${'email_address22_argument'})
,new InsertExpression('`homepage`', ${'homepage23_argument'})
,new InsertExpression('`uploaded_count`', ${'uploaded_count24_argument'})
,new InsertExpression('`regdate`', ${'regdate25_argument'})
,new InsertExpression('`last_update`', ${'last_update26_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress27_argument'})
,new InsertExpression('`list_order`', ${'list_order28_argument'})
,new InsertExpression('`status`', ${'status29_argument'})
));
$query->setTables(array(
new Table('`dbigrus_comments`', '`comments`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>