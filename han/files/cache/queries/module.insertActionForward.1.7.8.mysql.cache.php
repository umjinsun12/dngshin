<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertActionForward");
$query->setAction("insert");
$query->setPriority("");

${'act119_argument'} = new Argument('act', $args->{'act'});
${'act119_argument'}->checkNotNull();
if(!${'act119_argument'}->isValid()) return ${'act119_argument'}->getErrorMessage();
if(${'act119_argument'} !== null) ${'act119_argument'}->setColumnType('varchar');

${'module120_argument'} = new Argument('module', $args->{'module'});
${'module120_argument'}->checkNotNull();
if(!${'module120_argument'}->isValid()) return ${'module120_argument'}->getErrorMessage();
if(${'module120_argument'} !== null) ${'module120_argument'}->setColumnType('varchar');

${'type121_argument'} = new Argument('type', $args->{'type'});
${'type121_argument'}->checkNotNull();
if(!${'type121_argument'}->isValid()) return ${'type121_argument'}->getErrorMessage();
if(${'type121_argument'} !== null) ${'type121_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`act`', ${'act119_argument'})
,new InsertExpression('`module`', ${'module120_argument'})
,new InsertExpression('`type`', ${'type121_argument'})
));
$query->setTables(array(
new Table('`xe_action_forward`', '`action_forward`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>