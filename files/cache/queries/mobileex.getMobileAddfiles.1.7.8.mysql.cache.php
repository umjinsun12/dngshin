<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMobileAddfiles");
$query->setAction("select");
$query->setPriority("");

${'upload_target_srl2_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl2_argument'}->checkFilter('number');
${'upload_target_srl2_argument'}->checkNotNull();
${'upload_target_srl2_argument'}->createConditionValue();
if(!${'upload_target_srl2_argument'}->isValid()) return ${'upload_target_srl2_argument'}->getErrorMessage();
if(${'upload_target_srl2_argument'} !== null) ${'upload_target_srl2_argument'}->setColumnType('number');
if(isset($args->sort_index)) {
${'sort_index3_argument'} = new Argument('sort_index', $args->{'sort_index'});
if(!${'sort_index3_argument'}->isValid()) return ${'sort_index3_argument'}->getErrorMessage();
} else
${'sort_index3_argument'} = NULL;
$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_mobileex_add_files`', '`mobileex_add_files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index3_argument'}, "asc")
));
$query->setLimit();
return $query; ?>