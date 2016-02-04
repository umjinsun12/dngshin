<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMemberGroups");
$query->setAction("select");
$query->setPriority("");

${'member_srl96_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl96_argument'}->checkFilter('number');
${'member_srl96_argument'}->checkNotNull();
${'member_srl96_argument'}->createConditionValue();
if(!${'member_srl96_argument'}->isValid()) return ${'member_srl96_argument'}->getErrorMessage();
if(${'member_srl96_argument'} !== null) ${'member_srl96_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl97_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl97_argument'}->createConditionValue();
if(!${'site_srl97_argument'}->isValid()) return ${'site_srl97_argument'}->getErrorMessage();
} else
${'site_srl97_argument'} = NULL;if(${'site_srl97_argument'} !== null) ${'site_srl97_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`a`.`title`', '`title`')
,new SelectExpression('`a`.`group_srl`', '`group_srl`')
));
$query->setTables(array(
new Table('`xe_member_group`', '`a`')
,new Table('`xe_member_group_member`', '`b`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`b`.`member_srl`',$member_srl96_argument,"equal")
,new ConditionWithoutArgument('`b`.`group_srl`','`a`.`group_srl`',"equal", 'and')
,new ConditionWithArgument('`a`.`site_srl`',$site_srl97_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>