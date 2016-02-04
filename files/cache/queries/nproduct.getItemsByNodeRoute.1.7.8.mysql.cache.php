<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getItemsByNodeRoute");
$query->setAction("select");
$query->setPriority("");
if(isset($args->node_route)) {
${'node_route3_argument'} = new ConditionArgument('node_route', $args->node_route, 'like_prefix');
${'node_route3_argument'}->createConditionValue();
if(!${'node_route3_argument'}->isValid()) return ${'node_route3_argument'}->getErrorMessage();
} else
${'node_route3_argument'} = NULL;if(${'node_route3_argument'} !== null) ${'node_route3_argument'}->setColumnType('varchar');
if(isset($args->display)) {
${'display4_argument'} = new ConditionArgument('display', $args->display, 'equal');
${'display4_argument'}->createConditionValue();
if(!${'display4_argument'}->isValid()) return ${'display4_argument'}->getErrorMessage();
} else
${'display4_argument'} = NULL;if(${'display4_argument'} !== null) ${'display4_argument'}->setColumnType('char');
if(isset($args->module_srl)) {
${'module_srl5_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl5_argument'}->createConditionValue();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
} else
${'module_srl5_argument'} = NULL;if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');
if(isset($args->proc_module)) {
${'proc_module6_argument'} = new ConditionArgument('proc_module', $args->proc_module, 'equal');
${'proc_module6_argument'}->createConditionValue();
if(!${'proc_module6_argument'}->isValid()) return ${'proc_module6_argument'}->getErrorMessage();
} else
${'proc_module6_argument'} = NULL;if(${'proc_module6_argument'} !== null) ${'proc_module6_argument'}->setColumnType('varchar');
if(isset($args->item_name)) {
${'item_name7_argument'} = new ConditionArgument('item_name', $args->item_name, 'like');
${'item_name7_argument'}->createConditionValue();
if(!${'item_name7_argument'}->isValid()) return ${'item_name7_argument'}->getErrorMessage();
} else
${'item_name7_argument'} = NULL;if(${'item_name7_argument'} !== null) ${'item_name7_argument'}->setColumnType('varchar');

${'page10_argument'} = new Argument('page', $args->{'page'});
${'page10_argument'}->ensureDefaultValue('1');
if(!${'page10_argument'}->isValid()) return ${'page10_argument'}->getErrorMessage();

${'page_count11_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count11_argument'}->ensureDefaultValue('10');
if(!${'page_count11_argument'}->isValid()) return ${'page_count11_argument'}->getErrorMessage();

${'list_count12_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count12_argument'}->ensureDefaultValue('30');
if(!${'list_count12_argument'}->isValid()) return ${'list_count12_argument'}->getErrorMessage();

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('item_srl');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

${'order_type9_argument'} = new SortArgument('order_type9', $args->order_type);
${'order_type9_argument'}->ensureDefaultValue('asc');
if(!${'order_type9_argument'}->isValid()) return ${'order_type9_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_items`', '`nproduct_items`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`node_route`',$node_route3_argument,"like_prefix")
,new ConditionWithArgument('`display`',$display4_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl5_argument,"equal", 'and')
,new ConditionWithArgument('`proc_module`',$proc_module6_argument,"equal", 'and')
,new ConditionWithArgument('`item_name`',$item_name7_argument,"like", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, $order_type9_argument)
));
$query->setLimit(new Limit(${'list_count12_argument'}, ${'page10_argument'}, ${'page_count11_argument'}));
return $query; ?>