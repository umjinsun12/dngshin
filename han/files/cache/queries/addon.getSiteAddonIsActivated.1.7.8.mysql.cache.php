<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddonIsActivated");
$query->setAction("select");
$query->setPriority("");

${'site_srl34_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl34_argument'}->checkNotNull();
${'site_srl34_argument'}->createConditionValue();
if(!${'site_srl34_argument'}->isValid()) return ${'site_srl34_argument'}->getErrorMessage();
if(${'site_srl34_argument'} !== null) ${'site_srl34_argument'}->setColumnType('number');

${'addon35_argument'} = new ConditionArgument('addon', $args->addon, 'equal');
${'addon35_argument'}->checkNotNull();
${'addon35_argument'}->createConditionValue();
if(!${'addon35_argument'}->isValid()) return ${'addon35_argument'}->getErrorMessage();
if(${'addon35_argument'} !== null) ${'addon35_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl34_argument,"equal")
,new ConditionWithArgument('`addon`',$addon35_argument,"equal", 'and')
,new ConditionWithoutArgument('`is_used`',"'Y'","equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>