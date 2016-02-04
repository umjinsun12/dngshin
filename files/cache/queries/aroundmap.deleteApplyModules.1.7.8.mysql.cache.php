<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteApplyModules");
$query->setAction("delete");
$query->setPriority("");

$query->setTables(array(
new Table('`dbigrus_aroundmap_apply_modules`', '`aroundmap_apply_modules`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>