<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleExtraVars");
$query->setAction("insert");
$query->setPriority("");

${'module_srl179_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl179_argument'}->checkFilter('number');
${'module_srl179_argument'}->checkNotNull();
if(!${'module_srl179_argument'}->isValid()) return ${'module_srl179_argument'}->getErrorMessage();
if(${'module_srl179_argument'} !== null) ${'module_srl179_argument'}->setColumnType('number');

${'name180_argument'} = new Argument('name', $args->{'name'});
${'name180_argument'}->checkNotNull();
if(!${'name180_argument'}->isValid()) return ${'name180_argument'}->getErrorMessage();
if(${'name180_argument'} !== null) ${'name180_argument'}->setColumnType('varchar');

${'value181_argument'} = new Argument('value', $args->{'value'});
${'value181_argument'}->checkNotNull();
if(!${'value181_argument'}->isValid()) return ${'value181_argument'}->getErrorMessage();
if(${'value181_argument'} !== null) ${'value181_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl179_argument'})
,new InsertExpression('`name`', ${'name180_argument'})
,new InsertExpression('`value`', ${'value181_argument'})
));
$query->setTables(array(
new Table('`xe_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>