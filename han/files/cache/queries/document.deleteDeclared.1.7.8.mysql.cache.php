<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDeclared");
$query->setAction("delete");
$query->setPriority("");

${'document_srl45_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl45_argument'}->checkFilter('number');
${'document_srl45_argument'}->checkNotNull();
${'document_srl45_argument'}->createConditionValue();
if(!${'document_srl45_argument'}->isValid()) return ${'document_srl45_argument'}->getErrorMessage();
if(${'document_srl45_argument'} !== null) ${'document_srl45_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_document_declared`', '`document_declared`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl45_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>