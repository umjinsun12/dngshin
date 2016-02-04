<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertComponent");
$query->setAction("insert");
$query->setPriority("");

${'component_name116_argument'} = new Argument('component_name', $args->{'component_name'});
${'component_name116_argument'}->checkNotNull();
if(!${'component_name116_argument'}->isValid()) return ${'component_name116_argument'}->getErrorMessage();
if(${'component_name116_argument'} !== null) ${'component_name116_argument'}->setColumnType('varchar');

${'enabled117_argument'} = new Argument('enabled', $args->{'enabled'});
${'enabled117_argument'}->ensureDefaultValue('N');
if(!${'enabled117_argument'}->isValid()) return ${'enabled117_argument'}->getErrorMessage();
if(${'enabled117_argument'} !== null) ${'enabled117_argument'}->setColumnType('char');

${'list_order118_argument'} = new Argument('list_order', $args->{'list_order'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'list_order118_argument'}->ensureDefaultValue($sequence);
if(!${'list_order118_argument'}->isValid()) return ${'list_order118_argument'}->getErrorMessage();
if(${'list_order118_argument'} !== null) ${'list_order118_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`component_name`', ${'component_name116_argument'})
,new InsertExpression('`enabled`', ${'enabled117_argument'})
,new InsertExpression('`list_order`', ${'list_order118_argument'})
));
$query->setTables(array(
new Table('`xe_editor_components`', '`editor_components`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>