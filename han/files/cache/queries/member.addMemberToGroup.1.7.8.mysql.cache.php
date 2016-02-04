<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("addMemberToGroup");
$query->setAction("insert");
$query->setPriority("");

${'group_srl91_argument'} = new Argument('group_srl', $args->{'group_srl'});
${'group_srl91_argument'}->checkNotNull();
if(!${'group_srl91_argument'}->isValid()) return ${'group_srl91_argument'}->getErrorMessage();
if(${'group_srl91_argument'} !== null) ${'group_srl91_argument'}->setColumnType('number');

${'member_srl92_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl92_argument'}->checkNotNull();
if(!${'member_srl92_argument'}->isValid()) return ${'member_srl92_argument'}->getErrorMessage();
if(${'member_srl92_argument'} !== null) ${'member_srl92_argument'}->setColumnType('number');

${'site_srl93_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl93_argument'}->ensureDefaultValue('0');
if(!${'site_srl93_argument'}->isValid()) return ${'site_srl93_argument'}->getErrorMessage();
if(${'site_srl93_argument'} !== null) ${'site_srl93_argument'}->setColumnType('number');

${'regdate94_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate94_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate94_argument'}->isValid()) return ${'regdate94_argument'}->getErrorMessage();
if(${'regdate94_argument'} !== null) ${'regdate94_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`group_srl`', ${'group_srl91_argument'})
,new InsertExpression('`member_srl`', ${'member_srl92_argument'})
,new InsertExpression('`site_srl`', ${'site_srl93_argument'})
,new InsertExpression('`regdate`', ${'regdate94_argument'})
));
$query->setTables(array(
new Table('`xe_member_group_member`', '`member_group_member`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>