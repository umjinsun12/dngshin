<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateDocumentExtraKeyIdx");
$query->setAction("update");
$query->setPriority("");

${'new_idx1_argument'} = new Argument('new_idx', $args->{'new_idx'});
${'new_idx1_argument'}->checkNotNull();
if(!${'new_idx1_argument'}->isValid()) return ${'new_idx1_argument'}->getErrorMessage();
if(${'new_idx1_argument'} !== null) ${'new_idx1_argument'}->setColumnType('number');

${'module_srl2_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl2_argument'}->checkFilter('number');
${'module_srl2_argument'}->checkNotNull();
${'module_srl2_argument'}->createConditionValue();
if(!${'module_srl2_argument'}->isValid()) return ${'module_srl2_argument'}->getErrorMessage();
if(${'module_srl2_argument'} !== null) ${'module_srl2_argument'}->setColumnType('number');

${'var_idx3_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx3_argument'}->checkFilter('number');
${'var_idx3_argument'}->checkNotNull();
${'var_idx3_argument'}->createConditionValue();
if(!${'var_idx3_argument'}->isValid()) return ${'var_idx3_argument'}->getErrorMessage();
if(${'var_idx3_argument'} !== null) ${'var_idx3_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`var_idx`', ${'new_idx1_argument'})
));
$query->setTables(array(
new Table('`dbigrus_document_extra_keys`', '`document_extra_keys`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl2_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx3_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>