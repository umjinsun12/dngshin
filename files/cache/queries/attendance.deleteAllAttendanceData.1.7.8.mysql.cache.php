<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteAllAttendanceData");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl7_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl7_argument'}->createConditionValue();
if(!${'member_srl7_argument'}->isValid()) return ${'member_srl7_argument'}->getErrorMessage();
} else
${'member_srl7_argument'} = NULL;if(${'member_srl7_argument'} !== null) ${'member_srl7_argument'}->setColumnType('number');
if(isset($args->selected_date)) {
${'selected_date8_argument'} = new ConditionArgument('selected_date', $args->selected_date, 'like_prefix');
${'selected_date8_argument'}->createConditionValue();
if(!${'selected_date8_argument'}->isValid()) return ${'selected_date8_argument'}->getErrorMessage();
} else
${'selected_date8_argument'} = NULL;if(${'selected_date8_argument'} !== null) ${'selected_date8_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl7_argument,"equal")
,new ConditionWithArgument('`regdate`',$selected_date8_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>