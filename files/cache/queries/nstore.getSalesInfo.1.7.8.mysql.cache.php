<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSalesInfo");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl1_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl1_argument'}->createConditionValue();
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
} else
${'member_srl1_argument'} = NULL;if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');
if(isset($args->regdate)) {
${'regdate2_argument'} = new ConditionArgument('regdate', $args->regdate, 'like_prefix');
${'regdate2_argument'}->createConditionValue();
if(!${'regdate2_argument'}->isValid()) return ${'regdate2_argument'}->getErrorMessage();
} else
${'regdate2_argument'} = NULL;if(${'regdate2_argument'} !== null) ${'regdate2_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('COUNT(`total_price`)', '`count`')
,new SelectExpression('SUM(`total_price`)', '`amount`')
));
$query->setTables(array(
new Table('`dbigrus_nstore_order`', '`nstore_order`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl1_argument,"equal")
,new ConditionWithoutArgument('`order_status`',"'6'","in", 'and')
,new ConditionWithArgument('`regdate`',$regdate2_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>