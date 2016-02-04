<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCommentCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->status)) {
${'status30_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status30_argument'}->createConditionValue();
if(!${'status30_argument'}->isValid()) return ${'status30_argument'}->getErrorMessage();
} else
${'status30_argument'} = NULL;if(${'status30_argument'} !== null) ${'status30_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl31_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl31_argument'}->checkFilter('number');
${'document_srl31_argument'}->createConditionValue();
if(!${'document_srl31_argument'}->isValid()) return ${'document_srl31_argument'}->getErrorMessage();
} else
${'document_srl31_argument'} = NULL;if(${'document_srl31_argument'} !== null) ${'document_srl31_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl32_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl32_argument'}->checkFilter('number');
${'module_srl32_argument'}->createConditionValue();
if(!${'module_srl32_argument'}->isValid()) return ${'module_srl32_argument'}->getErrorMessage();
} else
${'module_srl32_argument'} = NULL;if(${'module_srl32_argument'} !== null) ${'module_srl32_argument'}->setColumnType('number');
if(isset($args->regDate)) {
${'regDate33_argument'} = new ConditionArgument('regDate', $args->regDate, 'like_prefix');
${'regDate33_argument'}->createConditionValue();
if(!${'regDate33_argument'}->isValid()) return ${'regDate33_argument'}->getErrorMessage();
} else
${'regDate33_argument'} = NULL;if(${'regDate33_argument'} !== null) ${'regDate33_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`status`',$status30_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl31_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl32_argument,"in", 'and')
,new ConditionWithArgument('`regdate`',$regDate33_argument,"like_prefix", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>