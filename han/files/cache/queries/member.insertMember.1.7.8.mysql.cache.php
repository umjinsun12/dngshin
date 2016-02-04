<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMember");
$query->setAction("insert");
$query->setPriority("");

${'member_srl67_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl67_argument'}->checkFilter('number');
${'member_srl67_argument'}->checkNotNull();
if(!${'member_srl67_argument'}->isValid()) return ${'member_srl67_argument'}->getErrorMessage();
if(${'member_srl67_argument'} !== null) ${'member_srl67_argument'}->setColumnType('number');

${'user_id68_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id68_argument'}->checkFilter('userid');
${'user_id68_argument'}->checkNotNull();
if(!${'user_id68_argument'}->isValid()) return ${'user_id68_argument'}->getErrorMessage();
if(${'user_id68_argument'} !== null) ${'user_id68_argument'}->setColumnType('varchar');

${'email_address69_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address69_argument'}->checkFilter('email');
${'email_address69_argument'}->checkNotNull();
if(!${'email_address69_argument'}->isValid()) return ${'email_address69_argument'}->getErrorMessage();
if(${'email_address69_argument'} !== null) ${'email_address69_argument'}->setColumnType('varchar');

${'password70_argument'} = new Argument('password', $args->{'password'});
${'password70_argument'}->checkNotNull();
if(!${'password70_argument'}->isValid()) return ${'password70_argument'}->getErrorMessage();
if(${'password70_argument'} !== null) ${'password70_argument'}->setColumnType('varchar');

${'email_id71_argument'} = new Argument('email_id', $args->{'email_id'});
${'email_id71_argument'}->checkNotNull();
if(!${'email_id71_argument'}->isValid()) return ${'email_id71_argument'}->getErrorMessage();
if(${'email_id71_argument'} !== null) ${'email_id71_argument'}->setColumnType('varchar');

${'email_host72_argument'} = new Argument('email_host', $args->{'email_host'});
${'email_host72_argument'}->checkNotNull();
if(!${'email_host72_argument'}->isValid()) return ${'email_host72_argument'}->getErrorMessage();
if(${'email_host72_argument'} !== null) ${'email_host72_argument'}->setColumnType('varchar');

${'user_name73_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name73_argument'}->checkNotNull();
if(!${'user_name73_argument'}->isValid()) return ${'user_name73_argument'}->getErrorMessage();
if(${'user_name73_argument'} !== null) ${'user_name73_argument'}->setColumnType('varchar');

${'nick_name74_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name74_argument'}->checkNotNull();
if(!${'nick_name74_argument'}->isValid()) return ${'nick_name74_argument'}->getErrorMessage();
if(${'nick_name74_argument'} !== null) ${'nick_name74_argument'}->setColumnType('varchar');
if(isset($args->find_account_question)) {
${'find_account_question75_argument'} = new Argument('find_account_question', $args->{'find_account_question'});
if(!${'find_account_question75_argument'}->isValid()) return ${'find_account_question75_argument'}->getErrorMessage();
} else
${'find_account_question75_argument'} = NULL;if(${'find_account_question75_argument'} !== null) ${'find_account_question75_argument'}->setColumnType('number');
if(isset($args->find_account_answer)) {
${'find_account_answer76_argument'} = new Argument('find_account_answer', $args->{'find_account_answer'});
if(!${'find_account_answer76_argument'}->isValid()) return ${'find_account_answer76_argument'}->getErrorMessage();
} else
${'find_account_answer76_argument'} = NULL;if(${'find_account_answer76_argument'} !== null) ${'find_account_answer76_argument'}->setColumnType('varchar');
if(isset($args->homepage)) {
${'homepage77_argument'} = new Argument('homepage', $args->{'homepage'});
if(!${'homepage77_argument'}->isValid()) return ${'homepage77_argument'}->getErrorMessage();
} else
${'homepage77_argument'} = NULL;if(${'homepage77_argument'} !== null) ${'homepage77_argument'}->setColumnType('varchar');
if(isset($args->blog)) {
${'blog78_argument'} = new Argument('blog', $args->{'blog'});
if(!${'blog78_argument'}->isValid()) return ${'blog78_argument'}->getErrorMessage();
} else
${'blog78_argument'} = NULL;if(${'blog78_argument'} !== null) ${'blog78_argument'}->setColumnType('varchar');
if(isset($args->birthday)) {
${'birthday79_argument'} = new Argument('birthday', $args->{'birthday'});
if(!${'birthday79_argument'}->isValid()) return ${'birthday79_argument'}->getErrorMessage();
} else
${'birthday79_argument'} = NULL;if(${'birthday79_argument'} !== null) ${'birthday79_argument'}->setColumnType('char');

${'allow_mailing80_argument'} = new Argument('allow_mailing', $args->{'allow_mailing'});
${'allow_mailing80_argument'}->ensureDefaultValue('Y');
if(!${'allow_mailing80_argument'}->isValid()) return ${'allow_mailing80_argument'}->getErrorMessage();
if(${'allow_mailing80_argument'} !== null) ${'allow_mailing80_argument'}->setColumnType('char');

${'allow_message81_argument'} = new Argument('allow_message', $args->{'allow_message'});
${'allow_message81_argument'}->ensureDefaultValue('Y');
if(!${'allow_message81_argument'}->isValid()) return ${'allow_message81_argument'}->getErrorMessage();
if(${'allow_message81_argument'} !== null) ${'allow_message81_argument'}->setColumnType('char');

${'denied82_argument'} = new Argument('denied', $args->{'denied'});
${'denied82_argument'}->ensureDefaultValue('N');
if(!${'denied82_argument'}->isValid()) return ${'denied82_argument'}->getErrorMessage();
if(${'denied82_argument'} !== null) ${'denied82_argument'}->setColumnType('char');
if(isset($args->limit_date)) {
${'limit_date83_argument'} = new Argument('limit_date', $args->{'limit_date'});
if(!${'limit_date83_argument'}->isValid()) return ${'limit_date83_argument'}->getErrorMessage();
} else
${'limit_date83_argument'} = NULL;if(${'limit_date83_argument'} !== null) ${'limit_date83_argument'}->setColumnType('date');

${'regdate84_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate84_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate84_argument'}->isValid()) return ${'regdate84_argument'}->getErrorMessage();
if(${'regdate84_argument'} !== null) ${'regdate84_argument'}->setColumnType('date');

${'change_password_date85_argument'} = new Argument('change_password_date', $args->{'change_password_date'});
${'change_password_date85_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'change_password_date85_argument'}->isValid()) return ${'change_password_date85_argument'}->getErrorMessage();
if(${'change_password_date85_argument'} !== null) ${'change_password_date85_argument'}->setColumnType('date');

${'last_login86_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login86_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_login86_argument'}->isValid()) return ${'last_login86_argument'}->getErrorMessage();
if(${'last_login86_argument'} !== null) ${'last_login86_argument'}->setColumnType('date');

${'is_admin87_argument'} = new Argument('is_admin', $args->{'is_admin'});
${'is_admin87_argument'}->ensureDefaultValue('N');
if(!${'is_admin87_argument'}->isValid()) return ${'is_admin87_argument'}->getErrorMessage();
if(${'is_admin87_argument'} !== null) ${'is_admin87_argument'}->setColumnType('char');
if(isset($args->description)) {
${'description88_argument'} = new Argument('description', $args->{'description'});
if(!${'description88_argument'}->isValid()) return ${'description88_argument'}->getErrorMessage();
} else
${'description88_argument'} = NULL;if(${'description88_argument'} !== null) ${'description88_argument'}->setColumnType('text');
if(isset($args->extra_vars)) {
${'extra_vars89_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars89_argument'}->isValid()) return ${'extra_vars89_argument'}->getErrorMessage();
} else
${'extra_vars89_argument'} = NULL;if(${'extra_vars89_argument'} !== null) ${'extra_vars89_argument'}->setColumnType('text');
if(isset($args->list_order)) {
${'list_order90_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order90_argument'}->isValid()) return ${'list_order90_argument'}->getErrorMessage();
} else
${'list_order90_argument'} = NULL;if(${'list_order90_argument'} !== null) ${'list_order90_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`member_srl`', ${'member_srl67_argument'})
,new InsertExpression('`user_id`', ${'user_id68_argument'})
,new InsertExpression('`email_address`', ${'email_address69_argument'})
,new InsertExpression('`password`', ${'password70_argument'})
,new InsertExpression('`email_id`', ${'email_id71_argument'})
,new InsertExpression('`email_host`', ${'email_host72_argument'})
,new InsertExpression('`user_name`', ${'user_name73_argument'})
,new InsertExpression('`nick_name`', ${'nick_name74_argument'})
,new InsertExpression('`find_account_question`', ${'find_account_question75_argument'})
,new InsertExpression('`find_account_answer`', ${'find_account_answer76_argument'})
,new InsertExpression('`homepage`', ${'homepage77_argument'})
,new InsertExpression('`blog`', ${'blog78_argument'})
,new InsertExpression('`birthday`', ${'birthday79_argument'})
,new InsertExpression('`allow_mailing`', ${'allow_mailing80_argument'})
,new InsertExpression('`allow_message`', ${'allow_message81_argument'})
,new InsertExpression('`denied`', ${'denied82_argument'})
,new InsertExpression('`limit_date`', ${'limit_date83_argument'})
,new InsertExpression('`regdate`', ${'regdate84_argument'})
,new InsertExpression('`change_password_date`', ${'change_password_date85_argument'})
,new InsertExpression('`last_login`', ${'last_login86_argument'})
,new InsertExpression('`is_admin`', ${'is_admin87_argument'})
,new InsertExpression('`description`', ${'description88_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars89_argument'})
,new InsertExpression('`list_order`', ${'list_order90_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>