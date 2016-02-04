<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteLoginCountHistoryByMemberSrl");
$query->setAction("delete");
$query->setPriority("");

${'member_srl12_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl12_argument'}->checkNotNull();
${'member_srl12_argument'}->createConditionValue();
if(!${'member_srl12_argument'}->isValid()) return ${'member_srl12_argument'}->getErrorMessage();
if(${'member_srl12_argument'} !== null) ${'member_srl12_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_member_count_history`', '`member_count_history`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl12_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>