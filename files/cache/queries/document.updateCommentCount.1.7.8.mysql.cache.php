<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateCommentCount");
$query->setAction("update");
$query->setPriority("");

${'comment_count34_argument'} = new Argument('comment_count', $args->{'comment_count'});
${'comment_count34_argument'}->checkNotNull();
if(!${'comment_count34_argument'}->isValid()) return ${'comment_count34_argument'}->getErrorMessage();
if(${'comment_count34_argument'} !== null) ${'comment_count34_argument'}->setColumnType('number');
if(isset($args->update_order)) {
${'update_order35_argument'} = new Argument('update_order', $args->{'update_order'});
if(!${'update_order35_argument'}->isValid()) return ${'update_order35_argument'}->getErrorMessage();
} else
${'update_order35_argument'} = NULL;if(${'update_order35_argument'} !== null) ${'update_order35_argument'}->setColumnType('number');

${'last_update36_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update36_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update36_argument'}->isValid()) return ${'last_update36_argument'}->getErrorMessage();
if(${'last_update36_argument'} !== null) ${'last_update36_argument'}->setColumnType('date');
if(isset($args->last_updater)) {
${'last_updater37_argument'} = new Argument('last_updater', $args->{'last_updater'});
if(!${'last_updater37_argument'}->isValid()) return ${'last_updater37_argument'}->getErrorMessage();
} else
${'last_updater37_argument'} = NULL;if(${'last_updater37_argument'} !== null) ${'last_updater37_argument'}->setColumnType('varchar');

${'document_srl38_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl38_argument'}->checkFilter('number');
${'document_srl38_argument'}->checkNotNull();
${'document_srl38_argument'}->createConditionValue();
if(!${'document_srl38_argument'}->isValid()) return ${'document_srl38_argument'}->getErrorMessage();
if(${'document_srl38_argument'} !== null) ${'document_srl38_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`comment_count`', ${'comment_count34_argument'})
,new UpdateExpression('`update_order`', ${'update_order35_argument'})
,new UpdateExpression('`last_update`', ${'last_update36_argument'})
,new UpdateExpression('`last_updater`', ${'last_updater37_argument'})
));
$query->setTables(array(
new Table('`dbigrus_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srl38_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>