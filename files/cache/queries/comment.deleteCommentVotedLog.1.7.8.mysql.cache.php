<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteCommentVotedLog");
$query->setAction("delete");
$query->setPriority("");

${'comment_srl15_argument'} = new ConditionArgument('comment_srl', $args->comment_srl, 'in');
${'comment_srl15_argument'}->checkFilter('number');
${'comment_srl15_argument'}->checkNotNull();
${'comment_srl15_argument'}->createConditionValue();
if(!${'comment_srl15_argument'}->isValid()) return ${'comment_srl15_argument'}->getErrorMessage();
if(${'comment_srl15_argument'} !== null) ${'comment_srl15_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_comment_voted_log`', '`comment_voted_log`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`comment_srl`',$comment_srl15_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>