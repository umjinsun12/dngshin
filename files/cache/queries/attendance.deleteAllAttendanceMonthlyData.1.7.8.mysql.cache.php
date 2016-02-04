<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteAllAttendanceMonthlyData");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl11_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl11_argument'}->createConditionValue();
if(!${'member_srl11_argument'}->isValid()) return ${'member_srl11_argument'}->getErrorMessage();
} else
${'member_srl11_argument'} = NULL;if(${'member_srl11_argument'} !== null) ${'member_srl11_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_attendance_monthly`', '`attendance_monthly`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl11_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>