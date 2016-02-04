<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteCommentDeclaredLog");
$query->setAction("delete");
$query->setPriority("");

${'comment_srl14_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'in');
${'comment_srl14_argument'}->checkFilter('number');
${'comment_srl14_argument'}->checkNotNull();
${'comment_srl14_argument'}->createConditionValue();
if(!${'comment_srl14_argument'}->isValid()) return ${'comment_srl14_argument'}->getErrorMessage();
if(${'comment_srl14_argument'} !== null) ${'comment_srl14_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_comment_declared_log`', '`comment_declared_log`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srl14_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>