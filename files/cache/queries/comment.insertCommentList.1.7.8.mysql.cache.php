<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCommentList");
$query->setAction("insert");
$query->setPriority("");

${'comment_srl1_argument'} = new Argument('comment_srl', $args->{'comment_srl'});
${'comment_srl1_argument'}->checkNotNull();
if(!${'comment_srl1_argument'}->isValid()) return ${'comment_srl1_argument'}->getErrorMessage();
if(${'comment_srl1_argument'} !== null) ${'comment_srl1_argument'}->setColumnType('number');

${'document_srl2_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl2_argument'}->checkFilter('number');
${'document_srl2_argument'}->checkNotNull();
if(!${'document_srl2_argument'}->isValid()) return ${'document_srl2_argument'}->getErrorMessage();
if(${'document_srl2_argument'} !== null) ${'document_srl2_argument'}->setColumnType('number');
if(isset($args->head)) {
${'head3_argument'} = new Argument('head', $args->{'head'});
${'head3_argument'}->checkFilter('number');
if(!${'head3_argument'}->isValid()) return ${'head3_argument'}->getErrorMessage();
} else
${'head3_argument'} = NULL;if(${'head3_argument'} !== null) ${'head3_argument'}->setColumnType('number');
if(isset($args->arrange)) {
${'arrange4_argument'} = new Argument('arrange', $args->{'arrange'});
${'arrange4_argument'}->checkFilter('number');
if(!${'arrange4_argument'}->isValid()) return ${'arrange4_argument'}->getErrorMessage();
} else
${'arrange4_argument'} = NULL;if(${'arrange4_argument'} !== null) ${'arrange4_argument'}->setColumnType('number');

${'module_srl5_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl5_argument'}->checkFilter('number');
${'module_srl5_argument'}->checkNotNull();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');
if(isset($args->regdate)) {
${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
} else
${'regdate6_argument'} = NULL;if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');
if(isset($args->depth)) {
${'depth7_argument'} = new Argument('depth', $args->{'depth'});
${'depth7_argument'}->checkFilter('number');
if(!${'depth7_argument'}->isValid()) return ${'depth7_argument'}->getErrorMessage();
} else
${'depth7_argument'} = NULL;if(${'depth7_argument'} !== null) ${'depth7_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`comment_srl`', ${'comment_srl1_argument'})
,new InsertExpression('`document_srl`', ${'document_srl2_argument'})
,new InsertExpression('`head`', ${'head3_argument'})
,new InsertExpression('`arrange`', ${'arrange4_argument'})
,new InsertExpression('`module_srl`', ${'module_srl5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
,new InsertExpression('`depth`', ${'depth7_argument'})
));
$query->setTables(array(
new Table('`dbigrus_comments_list`', '`comments_list`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>