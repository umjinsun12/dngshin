<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAuthenticationAll");
$query->setAction("select");
$query->setPriority("");
if(isset($args->clue)) {
${'clue1_argument'} = new ConditionArgument('clue', $args->clue, 'equal');
${'clue1_argument'}->createConditionValue();
if(!${'clue1_argument'}->isValid()) return ${'clue1_argument'}->getErrorMessage();
} else
${'clue1_argument'} = NULL;if(${'clue1_argument'} !== null) ${'clue1_argument'}->setColumnType('varchar');
if(isset($args->passed)) {
${'passed2_argument'} = new ConditionArgument('passed', $args->passed, 'equal');
${'passed2_argument'}->createConditionValue();
if(!${'passed2_argument'}->isValid()) return ${'passed2_argument'}->getErrorMessage();
} else
${'passed2_argument'} = NULL;if(${'passed2_argument'} !== null) ${'passed2_argument'}->setColumnType('char');

${'page4_argument'} = new Argument('page', $args->{'page'});
${'page4_argument'}->ensureDefaultValue('1');
if(!${'page4_argument'}->isValid()) return ${'page4_argument'}->getErrorMessage();

${'page_count5_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count5_argument'}->ensureDefaultValue('10');
if(!${'page_count5_argument'}->isValid()) return ${'page_count5_argument'}->getErrorMessage();

${'list_count6_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count6_argument'}->ensureDefaultValue('20');
if(!${'list_count6_argument'}->isValid()) return ${'list_count6_argument'}->getErrorMessage();

${'sort_index3_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index3_argument'}->ensureDefaultValue('regdate');
if(!${'sort_index3_argument'}->isValid()) return ${'sort_index3_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_authentication`', '`authentication`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`clue`',$clue1_argument,"equal", 'and')
,new ConditionWithArgument('`passed`',$passed2_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index3_argument'}, "desc")
));
$query->setLimit(new Limit(${'list_count6_argument'}, ${'page4_argument'}, ${'page_count5_argument'}));
return $query; ?>