<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulePartConfig");
$query->setAction("select");
$query->setPriority("");

${'module203_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module203_argument'}->checkNotNull();
${'module203_argument'}->createConditionValue();
if(!${'module203_argument'}->isValid()) return ${'module203_argument'}->getErrorMessage();
if(${'module203_argument'} !== null) ${'module203_argument'}->setColumnType('varchar');

${'module_srl204_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl204_argument'}->checkNotNull();
${'module_srl204_argument'}->createConditionValue();
if(!${'module_srl204_argument'}->isValid()) return ${'module_srl204_argument'}->getErrorMessage();
if(${'module_srl204_argument'} !== null) ${'module_srl204_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`config`')
));
$query->setTables(array(
new Table('`xe_module_part_config`', '`module_part_config`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module203_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl204_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>