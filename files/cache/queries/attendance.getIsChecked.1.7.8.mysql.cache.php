<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getIsChecked");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl11_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl11_argument'}->createConditionValue();
if(!${'member_srl11_argument'}->isValid()) return ${'member_srl11_argument'}->getErrorMessage();
} else
${'member_srl11_argument'} = NULL;if(${'member_srl11_argument'} !== null) ${'member_srl11_argument'}->setColumnType('number');
if(isset($args->day)) {
${'day12_argument'} = new ConditionArgument('day', $args->day, 'like_prefix');
${'day12_argument'}->createConditionValue();
if(!${'day12_argument'}->isValid()) return ${'day12_argument'}->getErrorMessage();
} else
${'day12_argument'} = NULL;if(${'day12_argument'} !== null) ${'day12_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl11_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$day12_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>