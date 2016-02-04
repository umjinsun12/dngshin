<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteAlias");
$query->setAction("delete");
$query->setPriority("");
if(isset($args->alias_srl)) {
${'alias_srl39_argument'} = new ConditionArgument('alias_srl', $args->alias_srl, 'equal');
${'alias_srl39_argument'}->checkFilter('number');
${'alias_srl39_argument'}->createConditionValue();
if(!${'alias_srl39_argument'}->isValid()) return ${'alias_srl39_argument'}->getErrorMessage();
} else
${'alias_srl39_argument'} = NULL;if(${'alias_srl39_argument'} !== null) ${'alias_srl39_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl40_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl40_argument'}->checkFilter('number');
${'document_srl40_argument'}->createConditionValue();
if(!${'document_srl40_argument'}->isValid()) return ${'document_srl40_argument'}->getErrorMessage();
} else
${'document_srl40_argument'} = NULL;if(${'document_srl40_argument'} !== null) ${'document_srl40_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl41_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl41_argument'}->checkFilter('number');
${'module_srl41_argument'}->createConditionValue();
if(!${'module_srl41_argument'}->isValid()) return ${'module_srl41_argument'}->getErrorMessage();
} else
${'module_srl41_argument'} = NULL;if(${'module_srl41_argument'} !== null) ${'module_srl41_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_document_aliases`', '`document_aliases`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`alias_srl`',$alias_srl39_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl40_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl41_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>