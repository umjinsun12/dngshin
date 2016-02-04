<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertDocumentExtraVar");
$query->setAction("insert");
$query->setPriority("");

${'module_srl1_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->checkNotNull();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');

${'document_srl2_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl2_argument'}->checkFilter('number');
${'document_srl2_argument'}->checkNotNull();
if(!${'document_srl2_argument'}->isValid()) return ${'document_srl2_argument'}->getErrorMessage();
if(${'document_srl2_argument'} !== null) ${'document_srl2_argument'}->setColumnType('number');

${'var_idx3_argument'} = new Argument('var_idx', $args->{'var_idx'});
${'var_idx3_argument'}->checkFilter('number');
${'var_idx3_argument'}->checkNotNull();
if(!${'var_idx3_argument'}->isValid()) return ${'var_idx3_argument'}->getErrorMessage();
if(${'var_idx3_argument'} !== null) ${'var_idx3_argument'}->setColumnType('number');

${'value4_argument'} = new Argument('value', $args->{'value'});
${'value4_argument'}->checkNotNull();
if(!${'value4_argument'}->isValid()) return ${'value4_argument'}->getErrorMessage();
if(${'value4_argument'} !== null) ${'value4_argument'}->setColumnType('bigtext');
if(isset($args->lang_code)) {
${'lang_code5_argument'} = new Argument('lang_code', $args->{'lang_code'});
if(!${'lang_code5_argument'}->isValid()) return ${'lang_code5_argument'}->getErrorMessage();
} else
${'lang_code5_argument'} = NULL;if(${'lang_code5_argument'} !== null) ${'lang_code5_argument'}->setColumnType('varchar');

${'eid6_argument'} = new Argument('eid', $args->{'eid'});
${'eid6_argument'}->checkNotNull();
if(!${'eid6_argument'}->isValid()) return ${'eid6_argument'}->getErrorMessage();
if(${'eid6_argument'} !== null) ${'eid6_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl1_argument'})
,new InsertExpression('`document_srl`', ${'document_srl2_argument'})
,new InsertExpression('`var_idx`', ${'var_idx3_argument'})
,new InsertExpression('`value`', ${'value4_argument'})
,new InsertExpression('`lang_code`', ${'lang_code5_argument'})
,new InsertExpression('`eid`', ${'eid6_argument'})
));
$query->setTables(array(
new Table('`dbigrus_document_extra_vars`', '`document_extra_vars`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>