<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMGroup");
$query->setAction("select");
$query->setPriority("");

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_member_group`', '`member_group`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>