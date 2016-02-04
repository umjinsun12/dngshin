<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuByTitle");
$query->setAction("select");
$query->setPriority("");

${'title150_argument'} = new ConditionArgument('title', $args->title, 'in');
${'title150_argument'}->checkNotNull();
${'title150_argument'}->createConditionValue();
if(!${'title150_argument'}->isValid()) return ${'title150_argument'}->getErrorMessage();
if(${'title150_argument'} !== null) ${'title150_argument'}->setColumnType('varchar');

${'site_srl151_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl151_argument'}->ensureDefaultValue('0');
${'site_srl151_argument'}->createConditionValue();
if(!${'site_srl151_argument'}->isValid()) return ${'site_srl151_argument'}->getErrorMessage();
if(${'site_srl151_argument'} !== null) ${'site_srl151_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`title`',$title150_argument,"in")
,new ConditionWithArgument('`site_srl`',$site_srl151_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>