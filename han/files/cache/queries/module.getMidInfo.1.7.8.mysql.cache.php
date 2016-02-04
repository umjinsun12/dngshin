<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMidInfo");
$query->setAction("select");
$query->setPriority("");
if(isset($args->mid)) {
${'mid153_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid153_argument'}->createConditionValue();
if(!${'mid153_argument'}->isValid()) return ${'mid153_argument'}->getErrorMessage();
} else
${'mid153_argument'} = NULL;if(${'mid153_argument'} !== null) ${'mid153_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl154_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl154_argument'}->createConditionValue();
if(!${'module_srl154_argument'}->isValid()) return ${'module_srl154_argument'}->getErrorMessage();
} else
${'module_srl154_argument'} = NULL;if(${'module_srl154_argument'} !== null) ${'module_srl154_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl155_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl155_argument'}->createConditionValue();
if(!${'site_srl155_argument'}->isValid()) return ${'site_srl155_argument'}->getErrorMessage();
} else
${'site_srl155_argument'} = NULL;if(${'site_srl155_argument'} !== null) ${'site_srl155_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`mid`',$mid153_argument,"equal")
,new ConditionWithArgument('`module_srl`',$module_srl154_argument,"equal", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl155_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>