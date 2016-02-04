<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertDevice");
$query->setAction("insert");
$query->setPriority("");

${'reg_id2_argument'} = new Argument('reg_id', $args->{'reg_id'});
${'reg_id2_argument'}->checkNotNull();
if(!${'reg_id2_argument'}->isValid()) return ${'reg_id2_argument'}->getErrorMessage();
if(${'reg_id2_argument'} !== null) ${'reg_id2_argument'}->setColumnType('varchar');

${'sort3_argument'} = new Argument('sort', $args->{'sort'});
${'sort3_argument'}->checkNotNull();
if(!${'sort3_argument'}->isValid()) return ${'sort3_argument'}->getErrorMessage();
if(${'sort3_argument'} !== null) ${'sort3_argument'}->setColumnType('char');

${'setting4_argument'} = new Argument('setting', $args->{'setting'});
${'setting4_argument'}->checkNotNull();
if(!${'setting4_argument'}->isValid()) return ${'setting4_argument'}->getErrorMessage();
if(${'setting4_argument'} !== null) ${'setting4_argument'}->setColumnType('text');

${'regdate5_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate5_argument'}->checkNotNull();
if(!${'regdate5_argument'}->isValid()) return ${'regdate5_argument'}->getErrorMessage();
if(${'regdate5_argument'} !== null) ${'regdate5_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`reg_id`', ${'reg_id2_argument'})
,new InsertExpression('`sort`', ${'sort3_argument'})
,new InsertExpression('`setting`', ${'setting4_argument'})
,new InsertExpression('`regdate`', ${'regdate5_argument'})
));
$query->setTables(array(
new Table('`dbigrus_androidpushapp_gcmregid`', '`androidpushapp_gcmregid`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>