<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNproductExtraVars");
$query->setAction("select");
$query->setPriority("");
if(isset($args->item_srl)) {
${'item_srl4_argument'} = new ConditionArgument('item_srl', $args->item_srl, 'in');
${'item_srl4_argument'}->createConditionValue();
if(!${'item_srl4_argument'}->isValid()) return ${'item_srl4_argument'}->getErrorMessage();
} else
${'item_srl4_argument'} = NULL;if(${'item_srl4_argument'} !== null) ${'item_srl4_argument'}->setColumnType('number');
if(isset($args->name)) {
${'name5_argument'} = new ConditionArgument('name', $args->name, 'equal');
${'name5_argument'}->createConditionValue();
if(!${'name5_argument'}->isValid()) return ${'name5_argument'}->getErrorMessage();
} else
${'name5_argument'} = NULL;if(${'name5_argument'} !== null) ${'name5_argument'}->setColumnType('varchar');
if(isset($args->value)) {
${'value6_argument'} = new ConditionArgument('value', $args->value, 'equal');
${'value6_argument'}->createConditionValue();
if(!${'value6_argument'}->isValid()) return ${'value6_argument'}->getErrorMessage();
} else
${'value6_argument'} = NULL;if(${'value6_argument'} !== null) ${'value6_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_extra_vars`', '`nproduct_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`item_srl`',$item_srl4_argument,"in", 'and')
,new ConditionWithArgument('`name`',$name5_argument,"equal", 'and')
,new ConditionWithArgument('`value`',$value6_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>