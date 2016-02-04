<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteLoginCountByIp");
$query->setAction("delete");
$query->setPriority("");

${'ipaddress2_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress2_argument'}->checkNotNull();
${'ipaddress2_argument'}->createConditionValue();
if(!${'ipaddress2_argument'}->isValid()) return ${'ipaddress2_argument'}->getErrorMessage();
if(${'ipaddress2_argument'} !== null) ${'ipaddress2_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`dbigrus_member_login_count`', '`member_login_count`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`ipaddress`',$ipaddress2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>