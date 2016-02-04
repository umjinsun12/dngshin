<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleExtraVars");
$query->setAction("select");
$query->setPriority("");

${'module_srl205_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl205_argument'}->checkNotNull();
${'module_srl205_argument'}->createConditionValue();
if(!${'module_srl205_argument'}->isValid()) return ${'module_srl205_argument'}->getErrorMessage();
if(${'module_srl205_argument'} !== null) ${'module_srl205_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl205_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>