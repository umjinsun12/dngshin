<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberSrl");
$query->setAction("select");
$query->setPriority("");
if(isset($args->user_id)) {
${'user_id63_argument'} = new ConditionArgument('user_id', $args->user_id, 'equal');
${'user_id63_argument'}->createConditionValue();
if(!${'user_id63_argument'}->isValid()) return ${'user_id63_argument'}->getErrorMessage();
} else
${'user_id63_argument'} = NULL;if(${'user_id63_argument'} !== null) ${'user_id63_argument'}->setColumnType('varchar');
if(isset($args->email_address)) {
${'email_address64_argument'} = new ConditionArgument('email_address', $args->email_address, 'equal');
${'email_address64_argument'}->createConditionValue();
if(!${'email_address64_argument'}->isValid()) return ${'email_address64_argument'}->getErrorMessage();
} else
${'email_address64_argument'} = NULL;if(${'email_address64_argument'} !== null) ${'email_address64_argument'}->setColumnType('varchar');
if(isset($args->nick_name)) {
${'nick_name65_argument'} = new ConditionArgument('nick_name', $args->nick_name, 'equal');
${'nick_name65_argument'}->createConditionValue();
if(!${'nick_name65_argument'}->isValid()) return ${'nick_name65_argument'}->getErrorMessage();
} else
${'nick_name65_argument'} = NULL;if(${'nick_name65_argument'} !== null) ${'nick_name65_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`member_srl`')
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`user_id`',$user_id63_argument,"equal", 'and')
,new ConditionWithArgument('`email_address`',$email_address64_argument,"equal", 'and')
,new ConditionWithArgument('`nick_name`',$nick_name65_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>