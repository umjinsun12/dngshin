<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->title)) {
${'title194_argument'} = new Argument('title', $args->{'title'});
if(!${'title194_argument'}->isValid()) return ${'title194_argument'}->getErrorMessage();
} else
${'title194_argument'} = NULL;if(${'title194_argument'} !== null) ${'title194_argument'}->setColumnType('varchar');
if(isset($args->extra_vars)) {
${'extra_vars195_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars195_argument'}->isValid()) return ${'extra_vars195_argument'}->getErrorMessage();
} else
${'extra_vars195_argument'} = NULL;if(${'extra_vars195_argument'} !== null) ${'extra_vars195_argument'}->setColumnType('text');
if(isset($args->layout)) {
${'layout196_argument'} = new Argument('layout', $args->{'layout'});
if(!${'layout196_argument'}->isValid()) return ${'layout196_argument'}->getErrorMessage();
} else
${'layout196_argument'} = NULL;if(${'layout196_argument'} !== null) ${'layout196_argument'}->setColumnType('varchar');
if(isset($args->layout_path)) {
${'layout_path197_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path197_argument'}->isValid()) return ${'layout_path197_argument'}->getErrorMessage();
} else
${'layout_path197_argument'} = NULL;if(${'layout_path197_argument'} !== null) ${'layout_path197_argument'}->setColumnType('varchar');

${'layout_srl198_argument'} = new ConditionArgument('layout_srl', $args->layout_srl, 'equal');
${'layout_srl198_argument'}->checkFilter('number');
${'layout_srl198_argument'}->checkNotNull();
${'layout_srl198_argument'}->createConditionValue();
if(!${'layout_srl198_argument'}->isValid()) return ${'layout_srl198_argument'}->getErrorMessage();
if(${'layout_srl198_argument'} !== null) ${'layout_srl198_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title194_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars195_argument'})
,new UpdateExpression('`layout`', ${'layout196_argument'})
,new UpdateExpression('`layout_path`', ${'layout_path197_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`layout_srl`',$layout_srl198_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>