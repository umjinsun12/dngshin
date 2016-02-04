<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAModuleCount");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module)) {
${'module1_argument'} = new ConditionArgument('module', $args->module, 'equal');
${'module1_argument'}->createConditionValue();
if(!${'module1_argument'}->isValid()) return ${'module1_argument'}->getErrorMessage();
} else
${'module1_argument'} = NULL;if(${'module1_argument'} !== null) ${'module1_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`dbigrus_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$module1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>