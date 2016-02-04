<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAllModInstList");
$query->setAction("select");
$query->setPriority("");

${'sort_index5_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index5_argument'}->ensureDefaultValue('module_srl');
if(!${'sort_index5_argument'}->isValid()) return ${'sort_index5_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`module`',"'epay'","equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index5_argument'}, "desc")
));
$query->setLimit();
return $query; ?>