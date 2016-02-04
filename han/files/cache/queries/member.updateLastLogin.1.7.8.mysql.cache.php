<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLastLogin");
$query->setAction("update");
$query->setPriority("");

${'member_srl99_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl99_argument'}->checkFilter('number');
${'member_srl99_argument'}->checkNotNull();
if(!${'member_srl99_argument'}->isValid()) return ${'member_srl99_argument'}->getErrorMessage();
if(${'member_srl99_argument'} !== null) ${'member_srl99_argument'}->setColumnType('number');

${'last_login100_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login100_argument'}->ensureDefaultValue(date("YmdHis"));
${'last_login100_argument'}->checkNotNull();
if(!${'last_login100_argument'}->isValid()) return ${'last_login100_argument'}->getErrorMessage();
if(${'last_login100_argument'} !== null) ${'last_login100_argument'}->setColumnType('date');

${'member_srl101_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl101_argument'}->checkFilter('number');
${'member_srl101_argument'}->checkNotNull();
${'member_srl101_argument'}->createConditionValue();
if(!${'member_srl101_argument'}->isValid()) return ${'member_srl101_argument'}->getErrorMessage();
if(${'member_srl101_argument'} !== null) ${'member_srl101_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`member_srl`', ${'member_srl99_argument'})
,new UpdateExpression('`last_login`', ${'last_login100_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl101_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>