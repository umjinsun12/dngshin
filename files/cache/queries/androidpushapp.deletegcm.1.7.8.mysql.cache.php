<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deletegcm");
$query->setAction("delete");
$query->setPriority("");

${'reg_id1_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id1_argument'}->checkNotNull();
${'reg_id1_argument'}->createConditionValue();
if(!${'reg_id1_argument'}->isValid()) return ${'reg_id1_argument'}->getErrorMessage();
if(${'reg_id1_argument'} !== null) ${'reg_id1_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`dbigrus_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>