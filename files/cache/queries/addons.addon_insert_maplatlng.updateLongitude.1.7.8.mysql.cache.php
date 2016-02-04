<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLongitude");
$query->setAction("update");
$query->setPriority("");

${'map_longitude3_argument'} = new Argument('map_longitude', $args->{'map_longitude'});
${'map_longitude3_argument'}->checkNotNull();
if(!${'map_longitude3_argument'}->isValid()) return ${'map_longitude3_argument'}->getErrorMessage();

${'document_srl4_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl4_argument'}->checkFilter('number');
${'document_srl4_argument'}->checkNotNull();
${'document_srl4_argument'}->createConditionValue();
if(!${'document_srl4_argument'}->isValid()) return ${'document_srl4_argument'}->getErrorMessage();
if(${'document_srl4_argument'} !== null) ${'document_srl4_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`map_longitude`', ${'map_longitude3_argument'})
));
$query->setTables(array(
new Table('`dbigrus_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>