<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLoginCountByIp");
$query->setAction("select");
$query->setPriority("");
if(isset($args->ipaddress)) {
${'ipaddress98_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress98_argument'}->createConditionValue();
if(!${'ipaddress98_argument'}->isValid()) return ${'ipaddress98_argument'}->getErrorMessage();
} else
${'ipaddress98_argument'} = NULL;if(${'ipaddress98_argument'} !== null) ${'ipaddress98_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_login_count`', '`member_login_count`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`ipaddress`',$ipaddress98_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>