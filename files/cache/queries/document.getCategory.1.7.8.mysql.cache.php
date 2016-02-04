<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategory");
$query->setAction("select");
$query->setPriority("");

${'category_srl1_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl1_argument'}->checkFilter('number');
${'category_srl1_argument'}->checkNotNull();
${'category_srl1_argument'}->createConditionValue();
if(!${'category_srl1_argument'}->isValid()) return ${'category_srl1_argument'}->getErrorMessage();
if(${'category_srl1_argument'} !== null) ${'category_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_document_categories`', '`document_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`category_srl`',$category_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>