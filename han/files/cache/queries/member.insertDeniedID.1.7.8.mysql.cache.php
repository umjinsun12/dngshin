<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertGroup");
$query->setAction("insert");
$query->setPriority("");

${'user_id103_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id103_argument'}->checkNotNull();
if(!${'user_id103_argument'}->isValid()) return ${'user_id103_argument'}->getErrorMessage();
if(${'user_id103_argument'} !== null) ${'user_id103_argument'}->setColumnType('varchar');

${'regdate104_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate104_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate104_argument'}->isValid()) return ${'regdate104_argument'}->getErrorMessage();
if(${'regdate104_argument'} !== null) ${'regdate104_argument'}->setColumnType('date');

${'description105_argument'} = new Argument('description', $args->{'description'});
${'description105_argument'}->ensureDefaultValue('');
if(!${'description105_argument'}->isValid()) return ${'description105_argument'}->getErrorMessage();
if(${'description105_argument'} !== null) ${'description105_argument'}->setColumnType('text');
if(isset($args->list_order)) {
${'list_order106_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order106_argument'}->isValid()) return ${'list_order106_argument'}->getErrorMessage();
} else
${'list_order106_argument'} = NULL;if(${'list_order106_argument'} !== null) ${'list_order106_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`user_id`', ${'user_id103_argument'})
,new InsertExpression('`regdate`', ${'regdate104_argument'})
,new InsertExpression('`description`', ${'description105_argument'})
,new InsertExpression('`list_order`', ${'list_order106_argument'})
));
$query->setTables(array(
new Table('`xe_member_denied_user_id`', '`member_denied_user_id`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>