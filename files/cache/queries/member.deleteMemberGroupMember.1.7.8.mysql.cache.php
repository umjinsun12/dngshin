<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteMemberGroupMember");
$query->setAction("delete");
$query->setPriority("");

${'member_srl2_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl2_argument'}->checkFilter('number');
${'member_srl2_argument'}->checkNotNull();
${'member_srl2_argument'}->createConditionValue();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');
if(isset($args->group_srl)) {
${'group_srl3_argument'} = new ConditionArgument('group_srl', $args->group_srl, 'equal');
${'group_srl3_argument'}->checkFilter('number');
${'group_srl3_argument'}->createConditionValue();
if(!${'group_srl3_argument'}->isValid()) return ${'group_srl3_argument'}->getErrorMessage();
} else
${'group_srl3_argument'} = NULL;if(${'group_srl3_argument'} !== null) ${'group_srl3_argument'}->setColumnType('number');
if(isset($args->site_srl)) {
${'site_srl4_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl4_argument'}->checkFilter('number');
${'site_srl4_argument'}->createConditionValue();
if(!${'site_srl4_argument'}->isValid()) return ${'site_srl4_argument'}->getErrorMessage();
} else
${'site_srl4_argument'} = NULL;if(${'site_srl4_argument'} !== null) ${'site_srl4_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`dbigrus_member_group_member`', '`member_group_member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl2_argument,"equal")
,new ConditionWithArgument('`group_srl`',$group_srl3_argument,"equal", 'and')
,new ConditionWithArgument('`site_srl`',$site_srl4_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>