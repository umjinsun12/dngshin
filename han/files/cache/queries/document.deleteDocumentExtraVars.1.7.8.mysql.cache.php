<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteDocumentExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl46_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl46_argument'}->checkFilter('number');
${'module_srl46_argument'}->checkNotNull();
${'module_srl46_argument'}->createConditionValue();
if(!${'module_srl46_argument'}->isValid()) return ${'module_srl46_argument'}->getErrorMessage();
if(${'module_srl46_argument'} !== null) ${'module_srl46_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl47_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl47_argument'}->checkFilter('number');
${'document_srl47_argument'}->createConditionValue();
if(!${'document_srl47_argument'}->isValid()) return ${'document_srl47_argument'}->getErrorMessage();
} else
${'document_srl47_argument'} = NULL;if(${'document_srl47_argument'} !== null) ${'document_srl47_argument'}->setColumnType('number');
if(isset($args->var_idx)) {
${'var_idx48_argument'} = new ConditionArgument('var_idx', $args->var_idx, 'equal');
${'var_idx48_argument'}->checkFilter('number');
${'var_idx48_argument'}->createConditionValue();
if(!${'var_idx48_argument'}->isValid()) return ${'var_idx48_argument'}->getErrorMessage();
} else
${'var_idx48_argument'} = NULL;if(${'var_idx48_argument'} !== null) ${'var_idx48_argument'}->setColumnType('number');
if(isset($args->lang_code)) {
${'lang_code49_argument'} = new ConditionArgument('lang_code', $args->lang_code, 'equal');
${'lang_code49_argument'}->createConditionValue();
if(!${'lang_code49_argument'}->isValid()) return ${'lang_code49_argument'}->getErrorMessage();
} else
${'lang_code49_argument'} = NULL;if(${'lang_code49_argument'} !== null) ${'lang_code49_argument'}->setColumnType('varchar');
if(isset($args->eid)) {
${'eid50_argument'} = new ConditionArgument('eid', $args->eid, 'equal');
${'eid50_argument'}->createConditionValue();
if(!${'eid50_argument'}->isValid()) return ${'eid50_argument'}->getErrorMessage();
} else
${'eid50_argument'} = NULL;if(${'eid50_argument'} !== null) ${'eid50_argument'}->setColumnType('varchar');

$query->setTables(array(
new Table('`xe_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl46_argument,"equal")
,new ConditionWithArgument('`document_srl`',$document_srl47_argument,"equal", 'and')
,new ConditionWithArgument('`var_idx`',$var_idx48_argument,"equal", 'and')
,new ConditionWithArgument('`lang_code`',$lang_code49_argument,"equal", 'and')
,new ConditionWithArgument('`eid`',$eid50_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>