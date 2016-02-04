<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTransactionList");
$query->setAction("select");
$query->setPriority("");

${'page2_argument'} = new Argument('page', $args->{'page'});
${'page2_argument'}->ensureDefaultValue('1');
if(!${'page2_argument'}->isValid()) return ${'page2_argument'}->getErrorMessage();

${'page_count3_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count3_argument'}->ensureDefaultValue('10');
if(!${'page_count3_argument'}->isValid()) return ${'page_count3_argument'}->getErrorMessage();

${'list_count4_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count4_argument'}->ensureDefaultValue('20');
if(!${'list_count4_argument'}->isValid()) return ${'list_count4_argument'}->getErrorMessage();

${'sort_index1_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index1_argument'}->ensureDefaultValue('tran.transaction_srl');
if(!${'sort_index1_argument'}->isValid()) return ${'sort_index1_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`tran`.`transaction_srl`', '`transaction_srl`')
,new SelectExpression('`tran`.`epay_module_srl`', '`epay_module_srl`')
,new SelectExpression('`tran`.`module_srl`', '`module_srl`')
,new SelectExpression('`tran`.`target_module`', '`target_module`')
,new SelectExpression('`tran`.`order_srl`', '`order_srl`')
,new SelectExpression('`tran`.`order_title`', '`order_title`')
,new SelectExpression('`tran`.`payment_method`', '`payment_method`')
,new SelectExpression('`tran`.`payment_amount`', '`payment_amount`')
,new SelectExpression('`tran`.`p_member_srl`', '`p_member_srl`')
,new SelectExpression('`tran`.`p_user_id`', '`p_user_id`')
,new SelectExpression('`tran`.`p_name`', '`p_name`')
,new SelectExpression('`tran`.`p_email_address`', '`p_email_address`')
,new SelectExpression('`tran`.`result_code`', '`result_code`')
,new SelectExpression('`tran`.`result_message`', '`result_message`')
,new SelectExpression('`tran`.`state`', '`state`')
,new SelectExpression('`tran`.`extra_vars`', '`extra_vars`')
,new SelectExpression('`tran`.`regdate`', '`regdate`')
,new SelectExpression('`module`.`mid`', '`mid`')
,new SelectExpression('`module`.`browser_title`', '`browser_title`')
,new SelectExpression('`plugin`.`plugin_srl`', '`plugin_srl`')
,new SelectExpression('`plugin`.`plugin`', '`plugin_name`')
,new SelectExpression('`plugin`.`title`', '`plugin_title`')
,new SelectExpression('`member`.`user_id`', '`user_id`')
,new SelectExpression('`member`.`user_name`', '`user_name`')
,new SelectExpression('`member`.`nick_name`', '`nick_name`')
));
$query->setTables(array(
new Table('`dbigrus_epay_transactions`', '`tran`')
,new JoinTable('`dbigrus_modules`', '`module`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`module`.`module_srl`','`tran`.`module_srl`',"equal")))
))
,new JoinTable('`dbigrus_member`', '`member`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`member`.`member_srl`','`tran`.`p_member_srl`',"equal")))
))
,new JoinTable('`dbigrus_epay_plugins`', '`plugin`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`plugin`.`plugin_srl`','`tran`.`plugin_srl`',"equal")))
))
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index1_argument'}, "desc")
));
$query->setLimit(new Limit(${'list_count4_argument'}, ${'page2_argument'}, ${'page_count3_argument'}));
return $query; ?>