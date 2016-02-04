<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenu");
$query->setAction("insert");
$query->setPriority("");

${'menu_srl127_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl127_argument'}->checkFilter('number');
${'menu_srl127_argument'}->checkNotNull();
if(!${'menu_srl127_argument'}->isValid()) return ${'menu_srl127_argument'}->getErrorMessage();
if(${'menu_srl127_argument'} !== null) ${'menu_srl127_argument'}->setColumnType('number');

${'site_srl128_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl128_argument'}->checkFilter('number');
${'site_srl128_argument'}->ensureDefaultValue('0');
${'site_srl128_argument'}->checkNotNull();
if(!${'site_srl128_argument'}->isValid()) return ${'site_srl128_argument'}->getErrorMessage();
if(${'site_srl128_argument'} !== null) ${'site_srl128_argument'}->setColumnType('number');

${'title129_argument'} = new Argument('title', $args->{'title'});
${'title129_argument'}->checkNotNull();
if(!${'title129_argument'}->isValid()) return ${'title129_argument'}->getErrorMessage();
if(${'title129_argument'} !== null) ${'title129_argument'}->setColumnType('varchar');

${'listorder130_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder130_argument'}->checkNotNull();
if(!${'listorder130_argument'}->isValid()) return ${'listorder130_argument'}->getErrorMessage();
if(${'listorder130_argument'} !== null) ${'listorder130_argument'}->setColumnType('number');

${'regdate131_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate131_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate131_argument'}->isValid()) return ${'regdate131_argument'}->getErrorMessage();
if(${'regdate131_argument'} !== null) ${'regdate131_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_srl`', ${'menu_srl127_argument'})
,new InsertExpression('`site_srl`', ${'site_srl128_argument'})
,new InsertExpression('`title`', ${'title129_argument'})
,new InsertExpression('`listorder`', ${'listorder130_argument'})
,new InsertExpression('`regdate`', ${'regdate131_argument'})
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>