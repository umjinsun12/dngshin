<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLatitude");
$query->setAction("update");
$query->setPriority("");

${'map_latitude1_argument'} = new Argument('map_latitude', $args->{'map_latitude'});
${'map_latitude1_argument'}->checkNotNull();
if(!${'map_latitude1_argument'}->isValid()) return ${'map_latitude1_argument'}->getErrorMessage();

${'document_srl2_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl2_argument'}->checkFilter('number');
${'document_srl2_argument'}->checkNotNull();
${'document_srl2_argument'}->createConditionValue();
if(!${'document_srl2_argument'}->isValid()) return ${'document_srl2_argument'}->getErrorMessage();
if(${'document_srl2_argument'} !== null) ${'document_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`map_latitude`', ${'map_latitude1_argument'})
));
$query->setTables(array(
new Table('`dbigrus_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>