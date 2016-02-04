<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTodayTotalCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->today)) {
${'today13_argument'} = new ConditionArgument('today', $args->today, 'like_prefix');
${'today13_argument'}->createConditionValue();
if(!${'today13_argument'}->isValid()) return ${'today13_argument'}->getErrorMessage();
} else
${'today13_argument'} = NULL;if(${'today13_argument'} !== null) ${'today13_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
,new JoinTable('`dbigrus_member`', '`member`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`attendance`.`member_srl`','`member`.`member_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`attendance`.`regdate`',$today13_argument,"like_prefix")
,new ConditionWithoutArgument('`attendance`.`member_srl`','`member`.`member_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>