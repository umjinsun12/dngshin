<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getApplyModules");
$query->setAction("select");
$query->setPriority("");

$query->setColumns(array(
new SelectExpression('`aroundmap_apply_modules`.*')
,new SelectExpression('`modules`.`mid`', '`mid`')
,new SelectExpression('`modules`.`browser_title`', '`browser_title`')
));
$query->setTables(array(
new Table('`dbigrus_aroundmap_apply_modules`', '`aroundmap_apply_modules`')
,new Table('`dbigrus_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`aroundmap_apply_modules`.`module_srl`','`modules`.`module_srl`',"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>