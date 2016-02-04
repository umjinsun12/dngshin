<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuItems");
$query->setAction("select");
$query->setPriority("");

${'menu_srl182_argument'} = new ConditionArgument('menu_srl', $args->menu_srl, 'equal');
${'menu_srl182_argument'}->checkFilter('number');
${'menu_srl182_argument'}->checkNotNull();
${'menu_srl182_argument'}->createConditionValue();
if(!${'menu_srl182_argument'}->isValid()) return ${'menu_srl182_argument'}->getErrorMessage();
if(${'menu_srl182_argument'} !== null) ${'menu_srl182_argument'}->setColumnType('number');
if(isset($args->parent_srl)) {
${'parent_srl183_argument'} = new ConditionArgument('parent_srl', $args->parent_srl, 'equal');
${'parent_srl183_argument'}->checkFilter('number');
${'parent_srl183_argument'}->createConditionValue();
if(!${'parent_srl183_argument'}->isValid()) return ${'parent_srl183_argument'}->getErrorMessage();
} else
${'parent_srl183_argument'} = NULL;if(${'parent_srl183_argument'} !== null) ${'parent_srl183_argument'}->setColumnType('number');

${'sort_index184_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index184_argument'}->ensureDefaultValue('listorder');
if(!${'sort_index184_argument'}->isValid()) return ${'sort_index184_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_srl`',$menu_srl182_argument,"equal")
,new ConditionWithArgument('`parent_srl`',$parent_srl183_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index184_argument'}, "desc")
));
$query->setLimit();
return $query; ?>