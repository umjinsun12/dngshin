<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberInfoByEmailAddress");
$query->setAction("select");
$query->setPriority("");

${'email_address95_argument'} = new ConditionArgument('email_address', $args->email_address, 'equal');
${'email_address95_argument'}->checkNotNull();
${'email_address95_argument'}->createConditionValue();
if(!${'email_address95_argument'}->isValid()) return ${'email_address95_argument'}->getErrorMessage();
if(${'email_address95_argument'} !== null) ${'email_address95_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`email_address`',$email_address95_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>