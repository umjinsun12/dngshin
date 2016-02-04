<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategoryAllSubitems");
$query->setAction("select");
$query->setPriority("");

${'module_srl14_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl14_argument'}->checkNotNull();
${'module_srl14_argument'}->createConditionValue();
if(!${'module_srl14_argument'}->isValid()) return ${'module_srl14_argument'}->getErrorMessage();
if(${'module_srl14_argument'} !== null) ${'module_srl14_argument'}->setColumnType('number');
if(isset($args->node_route)) {
${'node_route15_argument'} = new ConditionArgument('node_route', $args->node_route, 'like_prefix');
${'node_route15_argument'}->createConditionValue();
if(!${'node_route15_argument'}->isValid()) return ${'node_route15_argument'}->getErrorMessage();
} else
${'node_route15_argument'} = NULL;if(${'node_route15_argument'} !== null) ${'node_route15_argument'}->setColumnType('varchar');

${'sort_index16_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index16_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index16_argument'}->isValid()) return ${'sort_index16_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_categories`', '`nproduct_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl14_argument,"equal")
,new ConditionWithArgument('`node_route`',$node_route15_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index16_argument'}, "asc")
));
$query->setLimit();
return $query; ?>