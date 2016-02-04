<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertPush");
$query->setAction("insert");
$query->setPriority("");

${'pushid1_argument'} = new Argument('pushid', $args->{'pushid'});
${'pushid1_argument'}->checkNotNull();
if(!${'pushid1_argument'}->isValid()) return ${'pushid1_argument'}->getErrorMessage();
if(${'pushid1_argument'} !== null) ${'pushid1_argument'}->setColumnType('char');

${'type2_argument'} = new Argument('type', $args->{'type'});
${'type2_argument'}->checkNotNull();
if(!${'type2_argument'}->isValid()) return ${'type2_argument'}->getErrorMessage();
if(${'type2_argument'} !== null) ${'type2_argument'}->setColumnType('varchar');
if(isset($args->target_browser)) {
${'target_browser3_argument'} = new Argument('target_browser', $args->{'target_browser'});
if(!${'target_browser3_argument'}->isValid()) return ${'target_browser3_argument'}->getErrorMessage();
} else
${'target_browser3_argument'} = NULL;if(${'target_browser3_argument'} !== null) ${'target_browser3_argument'}->setColumnType('varchar');

${'target_title4_argument'} = new Argument('target_title', $args->{'target_title'});
${'target_title4_argument'}->checkNotNull();
if(!${'target_title4_argument'}->isValid()) return ${'target_title4_argument'}->getErrorMessage();
if(${'target_title4_argument'} !== null) ${'target_title4_argument'}->setColumnType('varchar');
if(isset($args->text)) {
${'text5_argument'} = new Argument('text', $args->{'text'});
if(!${'text5_argument'}->isValid()) return ${'text5_argument'}->getErrorMessage();
} else
${'text5_argument'} = NULL;if(${'text5_argument'} !== null) ${'text5_argument'}->setColumnType('text');

${'target_url6_argument'} = new Argument('target_url', $args->{'target_url'});
${'target_url6_argument'}->checkNotNull();
if(!${'target_url6_argument'}->isValid()) return ${'target_url6_argument'}->getErrorMessage();
if(${'target_url6_argument'} !== null) ${'target_url6_argument'}->setColumnType('varchar');
if(isset($args->push_date)) {
${'push_date7_argument'} = new Argument('push_date', $args->{'push_date'});
if(!${'push_date7_argument'}->isValid()) return ${'push_date7_argument'}->getErrorMessage();
} else
${'push_date7_argument'} = NULL;if(${'push_date7_argument'} !== null) ${'push_date7_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`pushid`', ${'pushid1_argument'})
,new InsertExpression('`type`', ${'type2_argument'})
,new InsertExpression('`target_browser`', ${'target_browser3_argument'})
,new InsertExpression('`target_title`', ${'target_title4_argument'})
,new InsertExpression('`text`', ${'text5_argument'})
,new InsertExpression('`target_url`', ${'target_url6_argument'})
,new InsertExpression('`push_date`', ${'push_date7_argument'})
));
$query->setTables(array(
new Table('`dbigrus_androidpushapp_push`', '`androidpushapp_push`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>