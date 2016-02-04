<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategoryList");
$query->setAction("select");
$query->setPriority("");

${'module_srl19_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl19_argument'}->checkNotNull();
${'module_srl19_argument'}->createConditionValue();
if(!${'module_srl19_argument'}->isValid()) return ${'module_srl19_argument'}->getErrorMessage();
if(${'module_srl19_argument'} !== null) ${'module_srl19_argument'}->setColumnType('number');
if(isset($args->node_route)) {
${'node_route20_argument'} = new ConditionArgument('node_route', $args->node_route, 'equal');
${'node_route20_argument'}->createConditionValue();
if(!${'node_route20_argument'}->isValid()) return ${'node_route20_argument'}->getErrorMessage();
} else
${'node_route20_argument'} = NULL;if(${'node_route20_argument'} !== null) ${'node_route20_argument'}->setColumnType('varchar');
if(isset($args->node_route_like_prefix)) {
${'node_route_like_prefix21_argument'} = new ConditionArgument('node_route_like_prefix', $args->node_route_like_prefix, 'like_prefix');
${'node_route_like_prefix21_argument'}->createConditionValue();
if(!${'node_route_like_prefix21_argument'}->isValid()) return ${'node_route_like_prefix21_argument'}->getErrorMessage();
} else
${'node_route_like_prefix21_argument'} = NULL;if(${'node_route_like_prefix21_argument'} !== null) ${'node_route_like_prefix21_argument'}->setColumnType('varchar');

${'sort_index22_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index22_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index22_argument'}->isValid()) return ${'sort_index22_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_categories`', '`nproduct_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl19_argument,"equal")
,new ConditionWithArgument('`node_route`',$node_route20_argument,"equal", 'and')
,new ConditionWithArgument('`node_route`',$node_route_like_prefix21_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index22_argument'}, "asc")
));
$query->setLimit();
return $query; ?>