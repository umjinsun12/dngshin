<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("sendMessage");
$query->setAction("insert");
$query->setPriority("");

${'message_srl1_argument'} = new Argument('message_srl', $args->{'message_srl'});
${'message_srl1_argument'}->checkNotNull();
if(!${'message_srl1_argument'}->isValid()) return ${'message_srl1_argument'}->getErrorMessage();
if(${'message_srl1_argument'} !== null) ${'message_srl1_argument'}->setColumnType('number');

${'related_srl2_argument'} = new Argument('related_srl', $args->{'related_srl'});
${'related_srl2_argument'}->ensureDefaultValue('0');
if(!${'related_srl2_argument'}->isValid()) return ${'related_srl2_argument'}->getErrorMessage();
if(${'related_srl2_argument'} !== null) ${'related_srl2_argument'}->setColumnType('number');

${'list_order3_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order3_argument'}->checkNotNull();
if(!${'list_order3_argument'}->isValid()) return ${'list_order3_argument'}->getErrorMessage();
if(${'list_order3_argument'} !== null) ${'list_order3_argument'}->setColumnType('number');

${'sender_srl4_argument'} = new Argument('sender_srl', $args->{'sender_srl'});
${'sender_srl4_argument'}->checkNotNull();
if(!${'sender_srl4_argument'}->isValid()) return ${'sender_srl4_argument'}->getErrorMessage();
if(${'sender_srl4_argument'} !== null) ${'sender_srl4_argument'}->setColumnType('number');

${'receiver_srl5_argument'} = new Argument('receiver_srl', $args->{'receiver_srl'});
${'receiver_srl5_argument'}->checkNotNull();
if(!${'receiver_srl5_argument'}->isValid()) return ${'receiver_srl5_argument'}->getErrorMessage();
if(${'receiver_srl5_argument'} !== null) ${'receiver_srl5_argument'}->setColumnType('number');

${'message_type6_argument'} = new Argument('message_type', $args->{'message_type'});
${'message_type6_argument'}->checkNotNull();
if(!${'message_type6_argument'}->isValid()) return ${'message_type6_argument'}->getErrorMessage();
if(${'message_type6_argument'} !== null) ${'message_type6_argument'}->setColumnType('char');

${'title7_argument'} = new Argument('title', $args->{'title'});
${'title7_argument'}->checkNotNull();
if(!${'title7_argument'}->isValid()) return ${'title7_argument'}->getErrorMessage();
if(${'title7_argument'} !== null) ${'title7_argument'}->setColumnType('varchar');

${'content8_argument'} = new Argument('content', $args->{'content'});
${'content8_argument'}->checkNotNull();
if(!${'content8_argument'}->isValid()) return ${'content8_argument'}->getErrorMessage();
if(${'content8_argument'} !== null) ${'content8_argument'}->setColumnType('text');

${'readed9_argument'} = new Argument('readed', $args->{'readed'});
${'readed9_argument'}->checkNotNull();
if(!${'readed9_argument'}->isValid()) return ${'readed9_argument'}->getErrorMessage();
if(${'readed9_argument'} !== null) ${'readed9_argument'}->setColumnType('char');

${'regdate10_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate10_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate10_argument'}->isValid()) return ${'regdate10_argument'}->getErrorMessage();
if(${'regdate10_argument'} !== null) ${'regdate10_argument'}->setColumnType('date');
if(isset($args->readed_date)) {
${'readed_date11_argument'} = new Argument('readed_date', $args->{'readed_date'});
if(!${'readed_date11_argument'}->isValid()) return ${'readed_date11_argument'}->getErrorMessage();
} else
${'readed_date11_argument'} = NULL;if(${'readed_date11_argument'} !== null) ${'readed_date11_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`message_srl`', ${'message_srl1_argument'})
,new InsertExpression('`related_srl`', ${'related_srl2_argument'})
,new InsertExpression('`list_order`', ${'list_order3_argument'})
,new InsertExpression('`sender_srl`', ${'sender_srl4_argument'})
,new InsertExpression('`receiver_srl`', ${'receiver_srl5_argument'})
,new InsertExpression('`message_type`', ${'message_type6_argument'})
,new InsertExpression('`title`', ${'title7_argument'})
,new InsertExpression('`content`', ${'content8_argument'})
,new InsertExpression('`readed`', ${'readed9_argument'})
,new InsertExpression('`regdate`', ${'regdate10_argument'})
,new InsertExpression('`readed_date`', ${'readed_date11_argument'})
));
$query->setTables(array(
new Table('`dbigrus_member_message`', '`member_message`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>