<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPositionData");
$query->setAction("select");
$query->setPriority("");
if(isset($args->today)) {
${'today1_argument'} = new ConditionArgument('today', $args->today, 'like_prefix');
${'today1_argument'}->createConditionValue();
if(!${'today1_argument'}->isValid()) return ${'today1_argument'}->getErrorMessage();
} else
${'today1_argument'} = NULL;if(${'today1_argument'} !== null) ${'today1_argument'}->setColumnType('varchar');
if(isset($args->greetings)) {
${'greetings2_argument'} = new ConditionArgument('greetings', $args->greetings, 'notequal');
${'greetings2_argument'}->createConditionValue();
if(!${'greetings2_argument'}->isValid()) return ${'greetings2_argument'}->getErrorMessage();
} else
${'greetings2_argument'} = NULL;if(${'greetings2_argument'} !== null) ${'greetings2_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
,new Table('`dbigrus_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`attendance`.`regdate`',$today1_argument,"like_prefix", 'and')
,new ConditionWithArgument('`attendance`.`greetings`',$greetings2_argument,"notequal", 'and')
,new ConditionWithoutArgument('`attendance`.`member_srl`','`member`.`member_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>