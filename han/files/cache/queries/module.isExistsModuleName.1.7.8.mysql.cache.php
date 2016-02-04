<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isExistsModuleName");
$query->setAction("select");
$query->setPriority("");

${'site_srl122_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl122_argument'}->ensureDefaultValue('0');
${'site_srl122_argument'}->checkNotNull();
${'site_srl122_argument'}->createConditionValue();
if(!${'site_srl122_argument'}->isValid()) return ${'site_srl122_argument'}->getErrorMessage();
if(${'site_srl122_argument'} !== null) ${'site_srl122_argument'}->setColumnType('number');

${'mid123_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid123_argument'}->checkNotNull();
${'mid123_argument'}->createConditionValue();
if(!${'mid123_argument'}->isValid()) return ${'mid123_argument'}->getErrorMessage();
if(${'mid123_argument'} !== null) ${'mid123_argument'}->setColumnType('varchar');

${'module_srl124_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'notequal');
${'module_srl124_argument'}->ensureDefaultValue('0');
${'module_srl124_argument'}->checkNotNull();
${'module_srl124_argument'}->createConditionValue();
if(!${'module_srl124_argument'}->isValid()) return ${'module_srl124_argument'}->getErrorMessage();
if(${'module_srl124_argument'} !== null) ${'module_srl124_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl122_argument,"equal")
,new ConditionWithArgument('`mid`',$mid123_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl124_argument,"notequal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>