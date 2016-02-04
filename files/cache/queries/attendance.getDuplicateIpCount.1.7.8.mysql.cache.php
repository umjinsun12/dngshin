<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDuplicateIpCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->ipaddress)) {
${'ipaddress1_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress1_argument'}->createConditionValue();
if(!${'ipaddress1_argument'}->isValid()) return ${'ipaddress1_argument'}->getErrorMessage();
} else
${'ipaddress1_argument'} = NULL;if(${'ipaddress1_argument'} !== null) ${'ipaddress1_argument'}->setColumnType('varchar');
if(isset($args->today)) {
${'today2_argument'} = new ConditionArgument('today', $args->today, 'like_prefix');
${'today2_argument'}->createConditionValue();
if(!${'today2_argument'}->isValid()) return ${'today2_argument'}->getErrorMessage();
} else
${'today2_argument'} = NULL;if(${'today2_argument'} !== null) ${'today2_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`ipaddress`',$ipaddress1_argument,"equal")
,new ConditionWithArgument('`regdate`',$today2_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>