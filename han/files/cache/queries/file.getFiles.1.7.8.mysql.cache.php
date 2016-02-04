<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getFiles");
$query->setAction("select");
$query->setPriority("");

${'upload_target_srl54_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl54_argument'}->checkFilter('number');
${'upload_target_srl54_argument'}->checkNotNull();
${'upload_target_srl54_argument'}->createConditionValue();
if(!${'upload_target_srl54_argument'}->isValid()) return ${'upload_target_srl54_argument'}->getErrorMessage();
if(${'upload_target_srl54_argument'} !== null) ${'upload_target_srl54_argument'}->setColumnType('number');
if(isset($args->isvalid)) {
${'isvalid55_argument'} = new ConditionArgument('isvalid', $args->isvalid, 'equal');
${'isvalid55_argument'}->createConditionValue();
if(!${'isvalid55_argument'}->isValid()) return ${'isvalid55_argument'}->getErrorMessage();
} else
${'isvalid55_argument'} = NULL;if(${'isvalid55_argument'} !== null) ${'isvalid55_argument'}->setColumnType('char');
if(isset($args->sort_index)) {
${'sort_index56_argument'} = new Argument('sort_index', $args->{'sort_index'});
if(!${'sort_index56_argument'}->isValid()) return ${'sort_index56_argument'}->getErrorMessage();
} else
${'sort_index56_argument'} = NULL;
$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl54_argument,"equal")
,new ConditionWithArgument('`isvalid`',$isvalid55_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index56_argument'}, "asc")
));
$query->setLimit();
return $query; ?>