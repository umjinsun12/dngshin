<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateDocumentExtraVarIdxOrder");
$query->setAction("update");
$query->setPriority("");

${'var_idx4_argument'} = new Argument('var_idx', NULL);
${'var_idx4_argument'}->setColumnOperation('-');
${'var_idx4_argument'}->ensureDefaultValue(1);
if(!${'var_idx4_argument'}->isValid()) return ${'var_idx4_argument'}->getErrorMessage();
if(${'var_idx4_argument'} !== null) ${'var_idx4_argument'}->setColumnType('number');

${'module_srl5_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl5_argument'}->checkFilter('number');
${'module_srl5_argument'}->checkNotNull();
${'module_srl5_argument'}->createConditionValue();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');

${'var_idx6_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'excess');
${'var_idx6_argument'}->checkFilter('number');
${'var_idx6_argument'}->checkNotNull();
${'var_idx6_argument'}->createConditionValue();
if(!${'var_idx6_argument'}->isValid()) return ${'var_idx6_argument'}->getErrorMessage();
if(${'var_idx6_argument'} !== null) ${'var_idx6_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`var_idx`', ${'var_idx4_argument'})
));
$query->setTables(array(
new Table('`dbigrus_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl5_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx6_argument,"excess", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>