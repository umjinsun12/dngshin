<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getItemList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->category_id)) {
${'category_id2_argument'} = new ConditionArgument('category_id', $args->category_id, 'equal');
${'category_id2_argument'}->createConditionValue();
if(!${'category_id2_argument'}->isValid()) return ${'category_id2_argument'}->getErrorMessage();
} else
${'category_id2_argument'} = NULL;if(${'category_id2_argument'} !== null) ${'category_id2_argument'}->setColumnType('number');
if(isset($args->item_srl)) {
${'item_srl3_argument'} = new ConditionArgument('item_srl', $args->item_srl, 'in');
${'item_srl3_argument'}->createConditionValue();
if(!${'item_srl3_argument'}->isValid()) return ${'item_srl3_argument'}->getErrorMessage();
} else
${'item_srl3_argument'} = NULL;if(${'item_srl3_argument'} !== null) ${'item_srl3_argument'}->setColumnType('number');
if(isset($args->display)) {
${'display4_argument'} = new ConditionArgument('display', $args->display, 'equal');
${'display4_argument'}->createConditionValue();
if(!${'display4_argument'}->isValid()) return ${'display4_argument'}->getErrorMessage();
} else
${'display4_argument'} = NULL;if(${'display4_argument'} !== null) ${'display4_argument'}->setColumnType('char');
if(isset($args->updatetime)) {
${'updatetime5_argument'} = new ConditionArgument('updatetime', $args->updatetime, 'more');
${'updatetime5_argument'}->createConditionValue();
if(!${'updatetime5_argument'}->isValid()) return ${'updatetime5_argument'}->getErrorMessage();
} else
${'updatetime5_argument'} = NULL;if(${'updatetime5_argument'} !== null) ${'updatetime5_argument'}->setColumnType('date');

${'page7_argument'} = new Argument('page', $args->{'page'});
${'page7_argument'}->ensureDefaultValue('1');
if(!${'page7_argument'}->isValid()) return ${'page7_argument'}->getErrorMessage();

${'page_count8_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count8_argument'}->ensureDefaultValue('10');
if(!${'page_count8_argument'}->isValid()) return ${'page_count8_argument'}->getErrorMessage();

${'list_count9_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count9_argument'}->ensureDefaultValue('20');
if(!${'list_count9_argument'}->isValid()) return ${'list_count9_argument'}->getErrorMessage();

${'sort_index6_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index6_argument'}->ensureDefaultValue('item_srl');
if(!${'sort_index6_argument'}->isValid()) return ${'sort_index6_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_nproduct_items`', '`nproduct_items`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl1_argument,"equal")
,new ConditionWithArgument('`category_id`',$category_id2_argument,"equal", 'and')
,new ConditionWithArgument('`item_srl`',$item_srl3_argument,"in", 'and')
,new ConditionWithArgument('`display`',$display4_argument,"equal", 'and')
,new ConditionWithArgument('`updatetime`',$updatetime5_argument,"more", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index6_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count9_argument'}, ${'page7_argument'}, ${'page_count8_argument'}));
return $query; ?>