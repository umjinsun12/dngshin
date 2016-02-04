<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getOptions");
$query->setAction("select");
$query->setPriority("");

${'item_srl8_argument'} = new ConditionArgument('item_srl', $args->item_srl, 'equal');
${'item_srl8_argument'}->checkNotNull();
${'item_srl8_argument'}->createConditionValue();
if(!${'item_srl8_argument'}->isValid()) return ${'item_srl8_argument'}->getErrorMessage();
if(${'item_srl8_argument'} !== null) ${'item_srl8_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_options`', '`nproduct_options`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`item_srl`',$item_srl8_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>