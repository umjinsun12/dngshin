<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLayoutDotList");
$query->setAction("select");
$query->setPriority("");

${'site_srl146_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl146_argument'}->checkFilter('number');
${'site_srl146_argument'}->ensureDefaultValue('0');
${'site_srl146_argument'}->checkNotNull();
${'site_srl146_argument'}->createConditionValue();
if(!${'site_srl146_argument'}->isValid()) return ${'site_srl146_argument'}->getErrorMessage();
if(${'site_srl146_argument'} !== null) ${'site_srl146_argument'}->setColumnType('number');

${'layout_type147_argument'} = new ConditionArgument('layout_type', $args->layout_type, 'equal');
${'layout_type147_argument'}->ensureDefaultValue('P');
${'layout_type147_argument'}->createConditionValue();
if(!${'layout_type147_argument'}->isValid()) return ${'layout_type147_argument'}->getErrorMessage();
if(${'layout_type147_argument'} !== null) ${'layout_type147_argument'}->setColumnType('char');

${'layout148_argument'} = new ConditionArgument('layout', $args->layout, 'like');
${'layout148_argument'}->ensureDefaultValue('.');
${'layout148_argument'}->createConditionValue();
if(!${'layout148_argument'}->isValid()) return ${'layout148_argument'}->getErrorMessage();
if(${'layout148_argument'} !== null) ${'layout148_argument'}->setColumnType('varchar');

${'sort_index149_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index149_argument'}->ensureDefaultValue('layout_srl');
if(!${'sort_index149_argument'}->isValid()) return ${'sort_index149_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl146_argument,"equal")
,new ConditionWithArgument('`layout_type`',$layout_type147_argument,"equal", 'and')
,new ConditionWithArgument('`layout`',$layout148_argument,"like", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index149_argument'}, "desc")
));
$query->setLimit();
return $query; ?>