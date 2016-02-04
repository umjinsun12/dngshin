<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getReviewPageList");
$query->setAction("select");
$query->setPriority("");

${'item_srl1_argument'} = new ConditionArgument('item_srl', $args->item_srl, 'equal');
${'item_srl1_argument'}->checkNotNull();
${'item_srl1_argument'}->createConditionValue();
if(!${'item_srl1_argument'}->isValid()) return ${'item_srl1_argument'}->getErrorMessage();
if(${'item_srl1_argument'} !== null) ${'item_srl1_argument'}->setColumnType('number');

${'page4_argument'} = new Argument('page', $args->{'page'});
${'page4_argument'}->ensureDefaultValue('1');
if(!${'page4_argument'}->isValid()) return ${'page4_argument'}->getErrorMessage();

${'page_count5_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count5_argument'}->ensureDefaultValue('10');
if(!${'page_count5_argument'}->isValid()) return ${'page_count5_argument'}->getErrorMessage();

${'list_count6_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count6_argument'}->ensureDefaultValue('list_count');
if(!${'list_count6_argument'}->isValid()) return ${'list_count6_argument'}->getErrorMessage();

${'list_order3_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order3_argument'}->ensureDefaultValue('list.arrange');
if(!${'list_order3_argument'}->isValid()) return ${'list_order3_argument'}->getErrorMessage();

${'list_order2_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order2_argument'}->ensureDefaultValue('list.head');
if(!${'list_order2_argument'}->isValid()) return ${'list_order2_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`review`.*')
,new SelectExpression('`list`.`depth`', '`depth`')
));
$query->setTables(array(
new Table('`dbigrus_store_review`', '`review`')
,new Table('`dbigrus_store_review_list`', '`list`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`list`.`item_srl`',$item_srl1_argument,"equal", 'and')
,new ConditionWithoutArgument('`list`.`review_srl`','`review`.`review_srl`',"equal", 'and')
,new ConditionWithoutArgument('`list`.`head`','0',"more", 'and')
,new ConditionWithoutArgument('`list`.`arrange`','0',"more", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order2_argument'}, "asc")
,new OrderByColumn(${'list_order3_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count6_argument'}, ${'page4_argument'}, ${'page_count5_argument'}));
return $query; ?>