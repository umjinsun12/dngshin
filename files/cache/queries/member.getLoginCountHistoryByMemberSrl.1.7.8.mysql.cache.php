<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLoginCountHistoryByMemberSrl");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl102_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl102_argument'}->createConditionValue();
if(!${'member_srl102_argument'}->isValid()) return ${'member_srl102_argument'}->getErrorMessage();
} else
${'member_srl102_argument'} = NULL;if(${'member_srl102_argument'} !== null) ${'member_srl102_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_member_count_history`', '`member_count_history`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl102_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>