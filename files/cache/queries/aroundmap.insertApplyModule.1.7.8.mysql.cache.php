<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertApplyModule");
$query->setAction("insert");
$query->setPriority("");

${'module_srl1_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->checkNotNull();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');

${'regdate2_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate2_argument'}->ensureDefaultValue(date("YmdHis"));
${'regdate2_argument'}->checkNotNull();
if(!${'regdate2_argument'}->isValid()) return ${'regdate2_argument'}->getErrorMessage();
if(${'regdate2_argument'} !== null) ${'regdate2_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl1_argument'})
,new InsertExpression('`regdate`', ${'regdate2_argument'})
));
$query->setTables(array(
new Table('`dbigrus_aroundmap_apply_modules`', '`aroundmap_apply_modules`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>