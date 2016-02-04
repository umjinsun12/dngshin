<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLast");
$query->setAction("update");
$query->setPriority("");

${'last_login1_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login1_argument'}->checkNotNull();
if(!${'last_login1_argument'}->isValid()) return ${'last_login1_argument'}->getErrorMessage();
if(${'last_login1_argument'} !== null) ${'last_login1_argument'}->setColumnType('date');

${'reg_id2_argument'} = new ConditionArgument('reg_id', $args->reg_id, 'equal');
${'reg_id2_argument'}->checkNotNull();
${'reg_id2_argument'}->createConditionValue();
if(!${'reg_id2_argument'}->isValid()) return ${'reg_id2_argument'}->getErrorMessage();
if(${'reg_id2_argument'} !== null) ${'reg_id2_argument'}->setColumnType('varchar');

$query->setColumns(array(
new UpdateExpression('`last_login`', ${'last_login1_argument'})
));
$query->setTables(array(
new Table('`dbigrus_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`reg_id`',$reg_id2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>