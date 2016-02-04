<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestCommentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->status)) {
${'status29_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status29_argument'}->createConditionValue();
if(!${'status29_argument'}->isValid()) return ${'status29_argument'}->getErrorMessage();
} else
${'status29_argument'} = NULL;if(${'status29_argument'} !== null) ${'status29_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl30_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl30_argument'}->checkFilter('number');
${'module_srl30_argument'}->createConditionValue();
if(!${'module_srl30_argument'}->isValid()) return ${'module_srl30_argument'}->getErrorMessage();
} else
${'module_srl30_argument'} = NULL;if(${'module_srl30_argument'} !== null) ${'module_srl30_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl31_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl31_argument'}->checkFilter('number');
${'document_srl31_argument'}->createConditionValue();
if(!${'document_srl31_argument'}->isValid()) return ${'document_srl31_argument'}->getErrorMessage();
} else
${'document_srl31_argument'} = NULL;if(${'document_srl31_argument'} !== null) ${'document_srl31_argument'}->setColumnType('number');

${'list_count33_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count33_argument'}->ensureDefaultValue('20');
if(!${'list_count33_argument'}->isValid()) return ${'list_count33_argument'}->getErrorMessage();

${'sort_index32_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index32_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index32_argument'}->isValid()) return ${'sort_index32_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`status`',$status29_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl30_argument,"in", 'and')
,new ConditionWithArgument('`document_srl`',$document_srl31_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index32_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count33_argument'}));
return $query; ?>