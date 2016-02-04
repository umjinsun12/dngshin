<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAdminInverseList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->now)) {
${'now3_argument'} = new ConditionArgument('now', $args->now, 'like_prefix');
${'now3_argument'}->createConditionValue();
if(!${'now3_argument'}->isValid()) return ${'now3_argument'}->getErrorMessage();
} else
${'now3_argument'} = NULL;if(${'now3_argument'} !== null) ${'now3_argument'}->setColumnType('varchar');

${'page5_argument'} = new Argument('page', $args->{'page'});
${'page5_argument'}->ensureDefaultValue('1');
if(!${'page5_argument'}->isValid()) return ${'page5_argument'}->getErrorMessage();

${'page_count6_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count6_argument'}->ensureDefaultValue('5');
if(!${'page_count6_argument'}->isValid()) return ${'page_count6_argument'}->getErrorMessage();

${'list_count7_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count7_argument'}->ensureDefaultValue('5');
if(!${'list_count7_argument'}->isValid()) return ${'list_count7_argument'}->getErrorMessage();

${'sort_index4_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index4_argument'}->ensureDefaultValue('attendance.regdate');
if(!${'sort_index4_argument'}->isValid()) return ${'sort_index4_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`attendance`.`attendance_srl`', '`attendance_srl`')
,new SelectExpression('`attendance`.`regdate`', '`regdate`')
,new SelectExpression('`attendance`.`member_srl`', '`member_srl`')
,new SelectExpression('`attendance`.`greetings`', '`greetings`')
,new SelectExpression('`attendance`.`today_point`', '`today_point`')
,new SelectExpression('`attendance`.`today_random`', '`today_random`')
,new SelectExpression('`attendance`.`ipaddress`', '`ipaddress`')
,new SelectExpression('`attendance`.`att_random_set`', '`att_random_set`')
,new SelectExpression('`attendance`.`present_y`', '`present_y`')
));
$query->setTables(array(
new Table('`dbigrus_attendance`', '`attendance`')
,new JoinTable('`dbigrus_member`', '`member`', "left join", array(
new ConditionGroup(array(
new ConditionWithoutArgument('`attendance`.`member_srl`','`member`.`member_srl`',"equal")))
))
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`attendance`.`regdate`',$now3_argument,"like_prefix")
,new ConditionWithoutArgument('`attendance`.`member_srl`','`member`.`member_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index4_argument'}, "desc")
));
$query->setLimit(new Limit(${'list_count7_argument'}, ${'page5_argument'}, ${'page_count6_argument'}));
return $query; ?>