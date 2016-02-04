<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModuleMLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->layout_srl)) {
${'layout_srl3_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl3_argument'}->isValid()) return ${'layout_srl3_argument'}->getErrorMessage();
} else
${'layout_srl3_argument'} = NULL;if(${'layout_srl3_argument'} !== null) ${'layout_srl3_argument'}->setColumnType('number');
if(isset($args->use_mobile)) {
${'use_mobile4_argument'} = new Argument('use_mobile', $args->{'use_mobile'});
if(!${'use_mobile4_argument'}->isValid()) return ${'use_mobile4_argument'}->getErrorMessage();
} else
${'use_mobile4_argument'} = NULL;if(${'use_mobile4_argument'} !== null) ${'use_mobile4_argument'}->setColumnType('char');

${'module_srls5_argument'} = new ConditionArgument('module_srls', $args->module_srls, 'in');
${'module_srls5_argument'}->checkNotNull();
${'module_srls5_argument'}->createConditionValue();
if(!${'module_srls5_argument'}->isValid()) return ${'module_srls5_argument'}->getErrorMessage();
if(${'module_srls5_argument'} !== null) ${'module_srls5_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`mlayout_srl`', ${'layout_srl3_argument'})
,new UpdateExpression('`use_mobile`', ${'use_mobile4_argument'})
));
$query->setTables(array(
new Table('`dbigrus_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srls5_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>