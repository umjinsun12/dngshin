<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteAdminId");
$query->setAction("delete");
$query->setPriority("");

${'module_srl5_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl5_argument'}->checkFilter('number');
${'module_srl5_argument'}->checkNotNull();
${'module_srl5_argument'}->createConditionValue();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl6_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl6_argument'}->checkFilter('number');
${'member_srl6_argument'}->createConditionValue();
if(!${'member_srl6_argument'}->isValid()) return ${'member_srl6_argument'}->getErrorMessage();
} else
${'member_srl6_argument'} = NULL;if(${'member_srl6_argument'} !== null) ${'member_srl6_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_module_admins`', '`module_admins`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl5_argument,"equal")
,new ConditionWithArgument('`member_srl`',$member_srl6_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>