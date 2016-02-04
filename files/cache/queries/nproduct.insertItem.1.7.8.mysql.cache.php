<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertItem");
$query->setAction("insert");
$query->setPriority("");

${'item_srl1_argument'} = new Argument('item_srl', $args->{'item_srl'});
${'item_srl1_argument'}->checkFilter('number');
${'item_srl1_argument'}->checkNotNull();
if(!${'item_srl1_argument'}->isValid()) return ${'item_srl1_argument'}->getErrorMessage();
if(${'item_srl1_argument'} !== null) ${'item_srl1_argument'}->setColumnType('number');

${'item_code2_argument'} = new Argument('item_code', $args->{'item_code'});
${'item_code2_argument'}->checkNotNull();
if(!${'item_code2_argument'}->isValid()) return ${'item_code2_argument'}->getErrorMessage();
if(${'item_code2_argument'} !== null) ${'item_code2_argument'}->setColumnType('varchar');

${'item_name3_argument'} = new Argument('item_name', $args->{'item_name'});
${'item_name3_argument'}->checkNotNull();
if(!${'item_name3_argument'}->isValid()) return ${'item_name3_argument'}->getErrorMessage();
if(${'item_name3_argument'} !== null) ${'item_name3_argument'}->setColumnType('varchar');

${'module_srl4_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl4_argument'}->checkNotNull();
if(!${'module_srl4_argument'}->isValid()) return ${'module_srl4_argument'}->getErrorMessage();
if(${'module_srl4_argument'} !== null) ${'module_srl4_argument'}->setColumnType('number');

${'category_id5_argument'} = new Argument('category_id', $args->{'category_id'});
${'category_id5_argument'}->ensureDefaultValue('0');
if(!${'category_id5_argument'}->isValid()) return ${'category_id5_argument'}->getErrorMessage();
if(${'category_id5_argument'} !== null) ${'category_id5_argument'}->setColumnType('number');

${'proc_module6_argument'} = new Argument('proc_module', $args->{'proc_module'});
${'proc_module6_argument'}->checkNotNull();
if(!${'proc_module6_argument'}->isValid()) return ${'proc_module6_argument'}->getErrorMessage();
if(${'proc_module6_argument'} !== null) ${'proc_module6_argument'}->setColumnType('varchar');
if(isset($args->node_route)) {
${'node_route7_argument'} = new Argument('node_route', $args->{'node_route'});
if(!${'node_route7_argument'}->isValid()) return ${'node_route7_argument'}->getErrorMessage();
} else
${'node_route7_argument'} = NULL;if(${'node_route7_argument'} !== null) ${'node_route7_argument'}->setColumnType('varchar');

${'document_srl8_argument'} = new Argument('document_srl', $args->{'document_srl'});
${'document_srl8_argument'}->checkNotNull();
if(!${'document_srl8_argument'}->isValid()) return ${'document_srl8_argument'}->getErrorMessage();
if(${'document_srl8_argument'} !== null) ${'document_srl8_argument'}->setColumnType('number');
if(isset($args->file_srl)) {
${'file_srl9_argument'} = new Argument('file_srl', $args->{'file_srl'});
if(!${'file_srl9_argument'}->isValid()) return ${'file_srl9_argument'}->getErrorMessage();
} else
${'file_srl9_argument'} = NULL;if(${'file_srl9_argument'} !== null) ${'file_srl9_argument'}->setColumnType('number');
if(isset($args->thumb_file_srl)) {
${'thumb_file_srl10_argument'} = new Argument('thumb_file_srl', $args->{'thumb_file_srl'});
if(!${'thumb_file_srl10_argument'}->isValid()) return ${'thumb_file_srl10_argument'}->getErrorMessage();
} else
${'thumb_file_srl10_argument'} = NULL;if(${'thumb_file_srl10_argument'} !== null) ${'thumb_file_srl10_argument'}->setColumnType('number');

${'price11_argument'} = new Argument('price', $args->{'price'});
${'price11_argument'}->checkNotNull();
if(!${'price11_argument'}->isValid()) return ${'price11_argument'}->getErrorMessage();
if(${'price11_argument'} !== null) ${'price11_argument'}->setColumnType('number');
if(isset($args->discount_amount)) {
${'discount_amount12_argument'} = new Argument('discount_amount', $args->{'discount_amount'});
if(!${'discount_amount12_argument'}->isValid()) return ${'discount_amount12_argument'}->getErrorMessage();
} else
${'discount_amount12_argument'} = NULL;if(${'discount_amount12_argument'} !== null) ${'discount_amount12_argument'}->setColumnType('number');
if(isset($args->discount_info)) {
${'discount_info13_argument'} = new Argument('discount_info', $args->{'discount_info'});
if(!${'discount_info13_argument'}->isValid()) return ${'discount_info13_argument'}->getErrorMessage();
} else
${'discount_info13_argument'} = NULL;if(${'discount_info13_argument'} !== null) ${'discount_info13_argument'}->setColumnType('varchar');

${'taxfree14_argument'} = new Argument('taxfree', $args->{'taxfree'});
${'taxfree14_argument'}->ensureDefaultValue('N');
if(!${'taxfree14_argument'}->isValid()) return ${'taxfree14_argument'}->getErrorMessage();
if(${'taxfree14_argument'} !== null) ${'taxfree14_argument'}->setColumnType('char');

${'display15_argument'} = new Argument('display', $args->{'display'});
${'display15_argument'}->checkNotNull();
if(!${'display15_argument'}->isValid()) return ${'display15_argument'}->getErrorMessage();
if(${'display15_argument'} !== null) ${'display15_argument'}->setColumnType('char');
if(isset($args->review_count)) {
${'review_count16_argument'} = new Argument('review_count', $args->{'review_count'});
if(!${'review_count16_argument'}->isValid()) return ${'review_count16_argument'}->getErrorMessage();
} else
${'review_count16_argument'} = NULL;if(${'review_count16_argument'} !== null) ${'review_count16_argument'}->setColumnType('number');
if(isset($args->sales_count)) {
${'sales_count17_argument'} = new Argument('sales_count', $args->{'sales_count'});
if(!${'sales_count17_argument'}->isValid()) return ${'sales_count17_argument'}->getErrorMessage();
} else
${'sales_count17_argument'} = NULL;if(${'sales_count17_argument'} !== null) ${'sales_count17_argument'}->setColumnType('number');
if(isset($args->download_count)) {
${'download_count18_argument'} = new Argument('download_count', $args->{'download_count'});
if(!${'download_count18_argument'}->isValid()) return ${'download_count18_argument'}->getErrorMessage();
} else
${'download_count18_argument'} = NULL;if(${'download_count18_argument'} !== null) ${'download_count18_argument'}->setColumnType('number');
if(isset($args->delivery_info)) {
${'delivery_info19_argument'} = new Argument('delivery_info', $args->{'delivery_info'});
if(!${'delivery_info19_argument'}->isValid()) return ${'delivery_info19_argument'}->getErrorMessage();
} else
${'delivery_info19_argument'} = NULL;if(${'delivery_info19_argument'} !== null) ${'delivery_info19_argument'}->setColumnType('text');
if(isset($args->group_srl_list)) {
${'group_srl_list20_argument'} = new Argument('group_srl_list', $args->{'group_srl_list'});
if(!${'group_srl_list20_argument'}->isValid()) return ${'group_srl_list20_argument'}->getErrorMessage();
} else
${'group_srl_list20_argument'} = NULL;if(${'group_srl_list20_argument'} !== null) ${'group_srl_list20_argument'}->setColumnType('varchar');
if(isset($args->list_order)) {
${'list_order21_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order21_argument'}->isValid()) return ${'list_order21_argument'}->getErrorMessage();
} else
${'list_order21_argument'} = NULL;if(${'list_order21_argument'} !== null) ${'list_order21_argument'}->setColumnType('number');
if(isset($args->extra_vars)) {
${'extra_vars22_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars22_argument'}->isValid()) return ${'extra_vars22_argument'}->getErrorMessage();
} else
${'extra_vars22_argument'} = NULL;if(${'extra_vars22_argument'} !== null) ${'extra_vars22_argument'}->setColumnType('text');

${'updatetime23_argument'} = new Argument('updatetime', $args->{'updatetime'});
${'updatetime23_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'updatetime23_argument'}->isValid()) return ${'updatetime23_argument'}->getErrorMessage();
if(${'updatetime23_argument'} !== null) ${'updatetime23_argument'}->setColumnType('date');

${'regdate24_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate24_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate24_argument'}->isValid()) return ${'regdate24_argument'}->getErrorMessage();
if(${'regdate24_argument'} !== null) ${'regdate24_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`item_srl`', ${'item_srl1_argument'})
,new InsertExpression('`item_code`', ${'item_code2_argument'})
,new InsertExpression('`item_name`', ${'item_name3_argument'})
,new InsertExpression('`module_srl`', ${'module_srl4_argument'})
,new InsertExpression('`category_id`', ${'category_id5_argument'})
,new InsertExpression('`proc_module`', ${'proc_module6_argument'})
,new InsertExpression('`node_route`', ${'node_route7_argument'})
,new InsertExpression('`document_srl`', ${'document_srl8_argument'})
,new InsertExpression('`file_srl`', ${'file_srl9_argument'})
,new InsertExpression('`thumb_file_srl`', ${'thumb_file_srl10_argument'})
,new InsertExpression('`price`', ${'price11_argument'})
,new InsertExpression('`discount_amount`', ${'discount_amount12_argument'})
,new InsertExpression('`discount_info`', ${'discount_info13_argument'})
,new InsertExpression('`taxfree`', ${'taxfree14_argument'})
,new InsertExpression('`display`', ${'display15_argument'})
,new InsertExpression('`review_count`', ${'review_count16_argument'})
,new InsertExpression('`sales_count`', ${'sales_count17_argument'})
,new InsertExpression('`download_count`', ${'download_count18_argument'})
,new InsertExpression('`delivery_info`', ${'delivery_info19_argument'})
,new InsertExpression('`group_srl_list`', ${'group_srl_list20_argument'})
,new InsertExpression('`list_order`', ${'list_order21_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars22_argument'})
,new InsertExpression('`updatetime`', ${'updatetime23_argument'})
,new InsertExpression('`regdate`', ${'regdate24_argument'})
));
$query->setTables(array(
new Table('`dbigrus_nproduct_items`', '`nproduct_items`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>