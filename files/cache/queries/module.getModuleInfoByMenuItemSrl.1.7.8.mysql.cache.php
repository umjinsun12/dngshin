<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleInfoByMenuItemSrl");
$query->setAction("select");
$query->setPriority("");

${'menu_item_srl201_argument'} = new ConditionArgument('menu_item_srl', $args->menu_item_srl, 'equal');
${'menu_item_srl201_argument'}->checkNotNull();
${'menu_item_srl201_argument'}->createConditionValue();
if(!${'menu_item_srl201_argument'}->isValid()) return ${'menu_item_srl201_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`dbigrus_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionSubquery('`mid`',new Subquery('`getMidByMenuSrl`', array(
new SelectExpression('`url`')
), 
array(
new Table('`dbigrus_menu_item`', '`menu_item`')
),
array(
new ConditionGroup(array(
new ConditionWithArgument('`menu_item`.`menu_item_srl`',$menu_item_srl201_argument,"equal")))
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