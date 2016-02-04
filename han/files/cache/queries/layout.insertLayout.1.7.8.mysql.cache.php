<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLayout");
$query->setAction("insert");
$query->setPriority("");

${'layout_srl185_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
${'layout_srl185_argument'}->checkFilter('number');
${'layout_srl185_argument'}->checkNotNull();
if(!${'layout_srl185_argument'}->isValid()) return ${'layout_srl185_argument'}->getErrorMessage();
if(${'layout_srl185_argument'} !== null) ${'layout_srl185_argument'}->setColumnType('number');

${'site_srl186_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl186_argument'}->checkFilter('number');
${'site_srl186_argument'}->ensureDefaultValue('0');
${'site_srl186_argument'}->checkNotNull();
if(!${'site_srl186_argument'}->isValid()) return ${'site_srl186_argument'}->getErrorMessage();
if(${'site_srl186_argument'} !== null) ${'site_srl186_argument'}->setColumnType('number');

${'layout187_argument'} = new Argument('layout', $args->{'layout'});
${'layout187_argument'}->checkNotNull();
if(!${'layout187_argument'}->isValid()) return ${'layout187_argument'}->getErrorMessage();
if(${'layout187_argument'} !== null) ${'layout187_argument'}->setColumnType('varchar');

${'title188_argument'} = new Argument('title', $args->{'title'});
${'title188_argument'}->checkNotNull();
if(!${'title188_argument'}->isValid()) return ${'title188_argument'}->getErrorMessage();
if(${'title188_argument'} !== null) ${'title188_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl189_argument'} = new Argument('module_srl', $args->{'module_srl'});
if(!${'module_srl189_argument'}->isValid()) return ${'module_srl189_argument'}->getErrorMessage();
} else
${'module_srl189_argument'} = NULL;if(${'module_srl189_argument'} !== null) ${'module_srl189_argument'}->setColumnType('number');
if(isset($args->extra_vars)) {
${'extra_vars190_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars190_argument'}->isValid()) return ${'extra_vars190_argument'}->getErrorMessage();
} else
${'extra_vars190_argument'} = NULL;if(${'extra_vars190_argument'} !== null) ${'extra_vars190_argument'}->setColumnType('text');
if(isset($args->layout_path)) {
${'layout_path191_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path191_argument'}->isValid()) return ${'layout_path191_argument'}->getErrorMessage();
} else
${'layout_path191_argument'} = NULL;if(${'layout_path191_argument'} !== null) ${'layout_path191_argument'}->setColumnType('varchar');

${'regdate192_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate192_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate192_argument'}->isValid()) return ${'regdate192_argument'}->getErrorMessage();
if(${'regdate192_argument'} !== null) ${'regdate192_argument'}->setColumnType('date');

${'layout_type193_argument'} = new Argument('layout_type', $args->{'layout_type'});
${'layout_type193_argument'}->ensureDefaultValue('P');
if(!${'layout_type193_argument'}->isValid()) return ${'layout_type193_argument'}->getErrorMessage();
if(${'layout_type193_argument'} !== null) ${'layout_type193_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`layout_srl`', ${'layout_srl185_argument'})
,new InsertExpression('`site_srl`', ${'site_srl186_argument'})
,new InsertExpression('`layout`', ${'layout187_argument'})
,new InsertExpression('`title`', ${'title188_argument'})
,new InsertExpression('`module_srl`', ${'module_srl189_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars190_argument'})
,new InsertExpression('`layout_path`', ${'layout_path191_argument'})
,new InsertExpression('`regdate`', ${'regdate192_argument'})
,new InsertExpression('`layout_type`', ${'layout_type193_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>