<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroupsExtraVars");
$query->setAction("select");
$query->setPriority("");

${'module_srl9_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl9_argument'}->checkFilter('number');
${'module_srl9_argument'}->checkNotNull();
${'module_srl9_argument'}->createConditionValue();
if(!${'module_srl9_argument'}->isValid()) return ${'module_srl9_argument'}->getErrorMessage();
if(${'module_srl9_argument'} !== null) ${'module_srl9_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx10_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'notin');
${'var_idx10_argument'}->checkFilter('number');
${'var_idx10_argument'}->createConditionValue();
if(!${'var_idx10_argument'}->isValid()) return ${'var_idx10_argument'}->getErrorMessage();
} else
${'var_idx10_argument'} = NULL;if(${'var_idx10_argument'} !== null) ${'var_idx10_argument'}->setColumnType('number');
if(isset($args->eid)) {
${'eid11_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid11_argument'}->createConditionValue();
if(!${'eid11_argument'}->isValid()) return ${'eid11_argument'}->getErrorMessage();
} else
${'eid11_argument'} = NULL;if(${'eid11_argument'} !== null) ${'eid11_argument'}->setColumnType('varchar');

${'sort_index12_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index12_argument'}->ensureDefaultValue('var_idx');
if(!${'sort_index12_argument'}->isValid()) return ${'sort_index12_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`module_srl`', '`module_srl`')
,new SelectExpression('`var_idx`', '`idx`')
,new SelectExpression('`eid`', '`eid`')
));
$query->setTables(array(
new Table('`dbigrus_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl9_argument,"equal")
,new ConditionWithArgument('`var_idx`',$var_idx10_argument,"notin", 'and')
,new ConditionWithArgument('`eid`',$eid11_argument,"equal", 'and')))
));
$query->setGroups(array(
'`module_srl`' ,'`var_idx`' ,'`eid`' ));
$query->setOrder(array(
new OrderByColumn(${'sort_index12_argument'}, "asc")
));
$query->setLimit();
return $query; ?>