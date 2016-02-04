<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertTrash");
$query->setAction("insert");
$query->setPriority("");

${'trashSrl1_argument'} = new Argument('trashSrl', $args->{'trashSrl'});
${'trashSrl1_argument'}->checkFilter('number');
${'trashSrl1_argument'}->checkNotNull();
if(!${'trashSrl1_argument'}->isValid()) return ${'trashSrl1_argument'}->getErrorMessage();
if(${'trashSrl1_argument'} !== null) ${'trashSrl1_argument'}->setColumnType('number');

${'title2_argument'} = new Argument('title', $args->{'title'});
${'title2_argument'}->checkNotNull();
if(!${'title2_argument'}->isValid()) return ${'title2_argument'}->getErrorMessage();
if(${'title2_argument'} !== null) ${'title2_argument'}->setColumnType('varchar');

${'originModule3_argument'} = new Argument('originModule', $args->{'originModule'});
${'originModule3_argument'}->ensureDefaultValue('document');
${'originModule3_argument'}->checkNotNull();
if(!${'originModule3_argument'}->isValid()) return ${'originModule3_argument'}->getErrorMessage();
if(${'originModule3_argument'} !== null) ${'originModule3_argument'}->setColumnType('varchar');
if(isset($args->serializedObject)) {
${'serializedObject4_argument'} = new Argument('serializedObject', $args->{'serializedObject'});
if(!${'serializedObject4_argument'}->isValid()) return ${'serializedObject4_argument'}->getErrorMessage();
} else
${'serializedObject4_argument'} = NULL;if(${'serializedObject4_argument'} !== null) ${'serializedObject4_argument'}->setColumnType('bigtext');
if(isset($args->description)) {
${'description5_argument'} = new Argument('description', $args->{'description'});
if(!${'description5_argument'}->isValid()) return ${'description5_argument'}->getErrorMessage();
} else
${'description5_argument'} = NULL;if(${'description5_argument'} !== null) ${'description5_argument'}->setColumnType('text');

${'ipaddress6_argument'} = new Argument('ipaddress', $args->{'ipaddress'});
${'ipaddress6_argument'}->ensureDefaultValue($_SERVER['REMOTE_ADDR']);
if(!${'ipaddress6_argument'}->isValid()) return ${'ipaddress6_argument'}->getErrorMessage();
if(${'ipaddress6_argument'} !== null) ${'ipaddress6_argument'}->setColumnType('varchar');

${'removerSrl7_argument'} = new Argument('removerSrl', $args->{'removerSrl'});
${'removerSrl7_argument'}->checkFilter('number');
${'removerSrl7_argument'}->ensureDefaultValue('0');
if(!${'removerSrl7_argument'}->isValid()) return ${'removerSrl7_argument'}->getErrorMessage();
if(${'removerSrl7_argument'} !== null) ${'removerSrl7_argument'}->setColumnType('number');

${'regdate8_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate8_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate8_argument'}->isValid()) return ${'regdate8_argument'}->getErrorMessage();
if(${'regdate8_argument'} !== null) ${'regdate8_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`trash_srl`', ${'trashSrl1_argument'})
,new InsertExpression('`title`', ${'title2_argument'})
,new InsertExpression('`origin_module`', ${'originModule3_argument'})
,new InsertExpression('`serialized_object`', ${'serializedObject4_argument'})
,new InsertExpression('`description`', ${'description5_argument'})
,new InsertExpression('`ipaddress`', ${'ipaddress6_argument'})
,new InsertExpression('`remover_srl`', ${'removerSrl7_argument'})
,new InsertExpression('`regdate`', ${'regdate8_argument'})
));
$query->setTables(array(
new Table('`dbigrus_trash`', '`trash`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>