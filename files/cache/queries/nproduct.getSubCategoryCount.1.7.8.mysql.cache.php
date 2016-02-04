<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSubCategoryCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->node_route)) {
${'node_route17_argument'} = new ConditionArgument('node_route', $args->node_route, 'like_prefix');
${'node_route17_argument'}->createConditionValue();
if(!${'node_route17_argument'}->isValid()) return ${'node_route17_argument'}->getErrorMessage();
} else
${'node_route17_argument'} = NULL;if(${'node_route17_argument'} !== null) ${'node_route17_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('COUNT(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_nproduct_categories`', '`nproduct_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`node_route`',$node_route17_argument,"like_prefix")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>