<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMobileComment");
$query->setAction("select");
$query->setPriority("");

${'comment_srl4_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'equal');
${'comment_srl4_argument'}->checkFilter('number');
${'comment_srl4_argument'}->checkNotNull();
${'comment_srl4_argument'}->createConditionValue();
if(!${'comment_srl4_argument'}->isValid()) return ${'comment_srl4_argument'}->getErrorMessage();
if(${'comment_srl4_argument'} !== null) ${'comment_srl4_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_mobileex_comments`', '`mobileex_comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srl4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>