<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsSiteDomain");
$query->setAction("select");
$query->setPriority("");

${'domain125_argument'} = new ConditionArgument('domain', $args->domain, 'equal');
${'domain125_argument'}->checkNotNull();
${'domain125_argument'}->createConditionValue();
if(!${'domain125_argument'}->isValid()) return ${'domain125_argument'}->getErrorMessage();
if(${'domain125_argument'} !== null) ${'domain125_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_sites`', '`sites`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`domain`',$domain125_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>