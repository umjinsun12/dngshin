<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCartItem");
$query->setAction("insert");
$query->setPriority("");

${'cart_srl10_argument'} = new Argument('cart_srl', $args->{'cart_srl'});
${'cart_srl10_argument'}->checkFilter('number');
${'cart_srl10_argument'}->checkNotNull();
if(!${'cart_srl10_argument'}->isValid()) return ${'cart_srl10_argument'}->getErrorMessage();
if(${'cart_srl10_argument'} !== null) ${'cart_srl10_argument'}->setColumnType('number');

${'module11_argument'} = new Argument('module', $args->{'module'});
${'module11_argument'}->checkNotNull();
if(!${'module11_argument'}->isValid()) return ${'module11_argument'}->getErrorMessage();
if(${'module11_argument'} !== null) ${'module11_argument'}->setColumnType('varchar');

${'item_srl12_argument'} = new Argument('item_srl', $args->{'item_srl'});
${'item_srl12_argument'}->checkNotNull();
if(!${'item_srl12_argument'}->isValid()) return ${'item_srl12_argument'}->getErrorMessage();
if(${'item_srl12_argument'} !== null) ${'item_srl12_argument'}->setColumnType('number');

${'item_name13_argument'} = new Argument('item_name', $args->{'item_name'});
${'item_name13_argument'}->checkNotNull();
if(!${'item_name13_argument'}->isValid()) return ${'item_name13_argument'}->getErrorMessage();
if(${'item_name13_argument'} !== null) ${'item_name13_argument'}->setColumnType('varchar');

${'item_code14_argument'} = new Argument('item_code', $args->{'item_code'});
${'item_code14_argument'}->checkNotNull();
if(!${'item_code14_argument'}->isValid()) return ${'item_code14_argument'}->getErrorMessage();
if(${'item_code14_argument'} !== null) ${'item_code14_argument'}->setColumnType('varchar');

${'document_srl15_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl15_argument'}->checkNotNull();
if(!${'document_srl15_argument'}->isValid()) return ${'document_srl15_argument'}->getErrorMessage();
if(${'document_srl15_argument'} !== null) ${'document_srl15_argument'}->setColumnType('number');
if(isset($args->file_srl)) {
${'file_srl16_argument'} = new Argument('file_srl', $args->{'file_srl'});
if(!${'file_srl16_argument'}->isValid()) return ${'file_srl16_argument'}->getErrorMessage();
} else
${'file_srl16_argument'} = NULL;if(${'file_srl16_argument'} !== null) ${'file_srl16_argument'}->setColumnType('number');
if(isset($args->thumb_file_srl)) {
${'thumb_file_srl17_argument'} = new Argument('thumb_file_srl', $args->{'thumb_file_srl'});
if(!${'thumb_file_srl17_argument'}->isValid()) return ${'thumb_file_srl17_argument'}->getErrorMessage();
} else
${'thumb_file_srl17_argument'} = NULL;if(${'thumb_file_srl17_argument'} !== null) ${'thumb_file_srl17_argument'}->setColumnType('number');

${'member_srl18_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl18_argument'}->checkNotNull();
if(!${'member_srl18_argument'}->isValid()) return ${'member_srl18_argument'}->getErrorMessage();
if(${'member_srl18_argument'} !== null) ${'member_srl18_argument'}->setColumnType('number');

${'module_srl19_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl19_argument'}->checkNotNull();
if(!${'module_srl19_argument'}->isValid()) return ${'module_srl19_argument'}->getErrorMessage();
if(${'module_srl19_argument'} !== null) ${'module_srl19_argument'}->setColumnType('number');

${'quantity20_argument'} = new Argument('quantity', $args->{'quantity'});
${'quantity20_argument'}->checkNotNull();
if(!${'quantity20_argument'}->isValid()) return ${'quantity20_argument'}->getErrorMessage();
if(${'quantity20_argument'} !== null) ${'quantity20_argument'}->setColumnType('number');

${'price21_argument'} = new Argument('price', $args->{'price'});
${'price21_argument'}->checkNotNull();
if(!${'price21_argument'}->isValid()) return ${'price21_argument'}->getErrorMessage();
if(${'price21_argument'} !== null) ${'price21_argument'}->setColumnType('number');

${'taxfree22_argument'} = new Argument('taxfree', $args->{'taxfree'});
${'taxfree22_argument'}->checkNotNull();
if(!${'taxfree22_argument'}->isValid()) return ${'taxfree22_argument'}->getErrorMessage();
if(${'taxfree22_argument'} !== null) ${'taxfree22_argument'}->setColumnType('char');
if(isset($args->discount_amount)) {
${'discount_amount23_argument'} = new Argument('discount_amount', $args->{'discount_amount'});
if(!${'discount_amount23_argument'}->isValid()) return ${'discount_amount23_argument'}->getErrorMessage();
} else
${'discount_amount23_argument'} = NULL;if(${'discount_amount23_argument'} !== null) ${'discount_amount23_argument'}->setColumnType('number');
if(isset($args->discount_info)) {
${'discount_info24_argument'} = new Argument('discount_info', $args->{'discount_info'});
if(!${'discount_info24_argument'}->isValid()) return ${'discount_info24_argument'}->getErrorMessage();
} else
${'discount_info24_argument'} = NULL;if(${'discount_info24_argument'} !== null) ${'discount_info24_argument'}->setColumnType('varchar');
if(isset($args->discounted_price)) {
${'discounted_price25_argument'} = new Argument('discounted_price', $args->{'discounted_price'});
if(!${'discounted_price25_argument'}->isValid()) return ${'discounted_price25_argument'}->getErrorMessage();
} else
${'discounted_price25_argument'} = NULL;if(${'discounted_price25_argument'} !== null) ${'discounted_price25_argument'}->setColumnType('number');
if(isset($args->express_id)) {
${'express_id26_argument'} = new Argument('express_id', $args->{'express_id'});
if(!${'express_id26_argument'}->isValid()) return ${'express_id26_argument'}->getErrorMessage();
} else
${'express_id26_argument'} = NULL;
${'option_srl27_argument'} = new Argument('option_srl', $args->{'option_srl'});
${'option_srl27_argument'}->ensureDefaultValue('0');
if(!${'option_srl27_argument'}->isValid()) return ${'option_srl27_argument'}->getErrorMessage();
if(${'option_srl27_argument'} !== null) ${'option_srl27_argument'}->setColumnType('number');

${'option_price28_argument'} = new Argument('option_price', $args->{'option_price'});
${'option_price28_argument'}->ensureDefaultValue('0');
if(!${'option_price28_argument'}->isValid()) return ${'option_price28_argument'}->getErrorMessage();
if(${'option_price28_argument'} !== null) ${'option_price28_argument'}->setColumnType('number');

${'option_title29_argument'} = new Argument('option_title', $args->{'option_title'});
${'option_title29_argument'}->ensureDefaultValue('');
if(!${'option_title29_argument'}->isValid()) return ${'option_title29_argument'}->getErrorMessage();
if(${'option_title29_argument'} !== null) ${'option_title29_argument'}->setColumnType('varchar');

${'purdate30_argument'} = new Argument('purdate', $args->{'purdate'});
${'purdate30_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'purdate30_argument'}->isValid()) return ${'purdate30_argument'}->getErrorMessage();
if(${'purdate30_argument'} !== null) ${'purdate30_argument'}->setColumnType('date');

${'regdate31_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate31_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate31_argument'}->isValid()) return ${'regdate31_argument'}->getErrorMessage();
if(${'regdate31_argument'} !== null) ${'regdate31_argument'}->setColumnType('date');
if(isset($args->non_key)) {
${'non_key32_argument'} = new Argument('non_key', $args->{'non_key'});
if(!${'non_key32_argument'}->isValid()) return ${'non_key32_argument'}->getErrorMessage();
} else
${'non_key32_argument'} = NULL;if(${'non_key32_argument'} !== null) ${'non_key32_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`cart_srl`', ${'cart_srl10_argument'})
,new InsertExpression('`module`', ${'module11_argument'})
,new InsertExpression('`item_srl`', ${'item_srl12_argument'})
,new InsertExpression('`item_name`', ${'item_name13_argument'})
,new InsertExpression('`item_code`', ${'item_code14_argument'})
,new InsertExpression('`document_srl`', ${'document_srl15_argument'})
,new InsertExpression('`file_srl`', ${'file_srl16_argument'})
,new InsertExpression('`thumb_file_srl`', ${'thumb_file_srl17_argument'})
,new InsertExpression('`member_srl`', ${'member_srl18_argument'})
,new InsertExpression('`module_srl`', ${'module_srl19_argument'})
,new InsertExpression('`quantity`', ${'quantity20_argument'})
,new InsertExpression('`price`', ${'price21_argument'})
,new InsertExpression('`taxfree`', ${'taxfree22_argument'})
,new InsertExpression('`discount_amount`', ${'discount_amount23_argument'})
,new InsertExpression('`discount_info`', ${'discount_info24_argument'})
,new InsertExpression('`discounted_price`', ${'discounted_price25_argument'})
,new InsertExpression('`express_id`', ${'express_id26_argument'})
,new InsertExpression('`option_srl`', ${'option_srl27_argument'})
,new InsertExpression('`option_price`', ${'option_price28_argument'})
,new InsertExpression('`option_title`', ${'option_title29_argument'})
,new InsertExpression('`purdate`', ${'purdate30_argument'})
,new InsertExpression('`regdate`', ${'regdate31_argument'})
,new InsertExpression('`non_key`', ${'non_key32_argument'})
));
$query->setTables(array(
new Table('`dbigrus_ncart`', '`ncart`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>