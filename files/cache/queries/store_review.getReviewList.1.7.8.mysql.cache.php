<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getReviewList");
$query->setAction("select");
$query->setPriority("");

${'review_srl7_argument'} = new ConditionArgument('review_srl', $args->review_srl, 'equal');
${'review_srl7_argument'}->checkFilter('number');
${'review_srl7_argument'}->checkNotNull();
${'review_srl7_argument'}->createConditionValue();
if(!${'review_srl7_argument'}->isValid()) return ${'review_srl7_argument'}->getErrorMessage();
if(${'review_srl7_argument'} !== null) ${'review_srl7_argument'}->setColumnType('number');

${'list_order8_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order8_argument'}->ensureDefaultValue('list_order');
if(!${'list_order8_argument'}->isValid()) return ${'list_order8_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`review_srl`')
,new SelectExpression('`parent_srl`')
,new SelectExpression('`regdate`')
));
$query->setTables(array(
new Table('`dbigrus_store_review`', '`store_review`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`review_srl`',$review_srl7_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order8_argument'}, "asc")
));
$query->setLimit();
return $query; ?>