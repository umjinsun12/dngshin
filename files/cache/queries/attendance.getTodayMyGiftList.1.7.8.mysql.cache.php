<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTodayMyGiftList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->present_y)) {
${'present_y8_argument'} = new ConditionArgument('present_y', $args->present_y, 'equal');
${'present_y8_argument'}->createConditionValue();
if(!${'present_y8_argument'}->isValid()) return ${'present_y8_argument'}->getErrorMessage();
} else
${'present_y8_argument'} = NULL;if(${'present_y8_argument'} !== null) ${'present_y8_argument'}->setColumnType('char');
if(isset($args->member_srl)) {
${'member_srl9_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl9_argument'}->createConditionValue();
if(!${'member_srl9_argument'}->isValid()) return ${'member_srl9_argument'}->getErrorMessage();
} else
${'member_srl9_argument'} = NULL;if(${'member_srl9_argument'} !== null) ${'member_srl9_argument'}->setColumnType('number');
if(isset($args->today)) {
${'today10_argument'} = new ConditionArgument('today', $args->today, 'like_prefix');
${'today10_argument'}->createConditionValue();
if(!${'today10_argument'}->isValid()) return ${'today10_argument'}->getErrorMessage();
} else
${'today10_argument'} = NULL;if(${'today10_argument'} !== null) ${'today10_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`present_y`',$present_y8_argument,"equal")
,new ConditionWithArgument('`member_srl`',$member_srl9_argument,"equal", 'and')
,new ConditionWithArgument('`regdate`',$today10_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>