<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getPackageSqlByPath");
$query->setAction("select");
$query->setPriority("");

${'path4_argument'} = new ConditionArgument('path', $args->path, 'equal');
${'path4_argument'}->checkNotNull();
${'path4_argument'}->createConditionValue();
if(!${'path4_argument'}->isValid()) return ${'path4_argument'}->getErrorMessage();
if(${'path4_argument'} !== null) ${'path4_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`package_srl`')
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`path`',$path4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>