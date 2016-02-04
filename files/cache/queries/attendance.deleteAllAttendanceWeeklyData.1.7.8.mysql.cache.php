<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteAllAttendanceWeeklyData");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl12_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl12_argument'}->createConditionValue();
if(!${'member_srl12_argument'}->isValid()) return ${'member_srl12_argument'}->getErrorMessage();
} else
${'member_srl12_argument'} = NULL;if(${'member_srl12_argument'} !== null) ${'member_srl12_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_attendance_weekly`', '`attendance_weekly`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl12_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>