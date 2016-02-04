<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAdminReg");
$query->setAction("select");
$query->setPriority("");

${'is_admin1_argument'} = new ConditionArgument('is_admin', $args->is_admin, 'equal');
${'is_admin1_argument'}->checkNotNull();
${'is_admin1_argument'}->createConditionValue();
if(!${'is_admin1_argument'}->isValid()) return ${'is_admin1_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_androidpushapp_gcmregid`', '`gcm`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionSubquery('`member_srl`',new Subquery('`search`', array(
new SelectExpression('`member_srl`', '`mem_srl`')
), 
array(
new Table('`dbigrus_member`', '`m`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`m`.`is_admin`',$is_admin1_argument,"equal")))
),
array(),
array(),
null
),"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>