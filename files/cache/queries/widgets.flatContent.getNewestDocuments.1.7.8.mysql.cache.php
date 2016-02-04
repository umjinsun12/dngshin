<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestDocuments");
$query->setAction("select");
$query->setPriority("");

${'module_srl4_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl4_argument'}->checkFilter('number');
${'module_srl4_argument'}->checkNotNull();
${'module_srl4_argument'}->createConditionValue();
if(!${'module_srl4_argument'}->isValid()) return ${'module_srl4_argument'}->getErrorMessage();
if(${'module_srl4_argument'} !== null) ${'module_srl4_argument'}->setColumnType('number');
if(isset($args->regdate)) {
${'regdate5_argument'} = new ConditionArgument('regdate', $args->regdate, 'more');
${'regdate5_argument'}->createConditionValue();
if(!${'regdate5_argument'}->isValid()) return ${'regdate5_argument'}->getErrorMessage();
} else
${'regdate5_argument'} = NULL;if(${'regdate5_argument'} !== null) ${'regdate5_argument'}->setColumnType('date');
if(isset($args->category_srl)) {
${'category_srl6_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl6_argument'}->createConditionValue();
if(!${'category_srl6_argument'}->isValid()) return ${'category_srl6_argument'}->getErrorMessage();
} else
${'category_srl6_argument'} = NULL;if(${'category_srl6_argument'} !== null) ${'category_srl6_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList7_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList7_argument'}->createConditionValue();
if(!${'statusList7_argument'}->isValid()) return ${'statusList7_argument'}->getErrorMessage();
} else
${'statusList7_argument'} = NULL;if(${'statusList7_argument'} !== null) ${'statusList7_argument'}->setColumnType('varchar');

${'list_count10_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count10_argument'}->ensureDefaultValue('3');
if(!${'list_count10_argument'}->isValid()) return ${'list_count10_argument'}->getErrorMessage();

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('documents.list_order');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

${'order_type9_argument'} = new SortArgument('order_type9', $args->order_type);
${'order_type9_argument'}->ensureDefaultValue('asc');
if(!${'order_type9_argument'}->isValid()) return ${'order_type9_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl4_argument,"in", 'and')
,new ConditionWithArgument('`regdate`',$regdate5_argument,"more", 'and')
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl6_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$statusList7_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, $order_type9_argument)
));
$query->setLimit(new Limit(${'list_count10_argument'}));
return $query; ?>