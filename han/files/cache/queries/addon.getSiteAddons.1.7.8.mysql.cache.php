<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddons");
$query->setAction("select");
$query->setPriority("");

${'site_srl113_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl113_argument'}->checkNotNull();
${'site_srl113_argument'}->createConditionValue();
if(!${'site_srl113_argument'}->isValid()) return ${'site_srl113_argument'}->getErrorMessage();
if(${'site_srl113_argument'} !== null) ${'site_srl113_argument'}->setColumnType('number');

${'list_order114_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order114_argument'}->ensureDefaultValue('addon');
if(!${'list_order114_argument'}->isValid()) return ${'list_order114_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl113_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order114_argument'}, "asc")
));
$query->setLimit();
return $query; ?>