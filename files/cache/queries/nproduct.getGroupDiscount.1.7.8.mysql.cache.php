<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroupDiscount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->item_srl)) {
${'item_srl7_argument'} = new ConditionArgument('item_srl', $args->item_srl, 'equal');
${'item_srl7_argument'}->createConditionValue();
if(!${'item_srl7_argument'}->isValid()) return ${'item_srl7_argument'}->getErrorMessage();
} else
${'item_srl7_argument'} = NULL;if(${'item_srl7_argument'} !== null) ${'item_srl7_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_group_discount`', '`nproduct_group_discount`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`item_srl`',$item_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>