<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenuItem");
$query->setAction("insert");
$query->setPriority("");

${'menu_item_srl132_argument'} = new Argument('menu_item_srl', $args->{'menu_item_srl'});
${'menu_item_srl132_argument'}->checkFilter('number');
${'menu_item_srl132_argument'}->checkNotNull();
if(!${'menu_item_srl132_argument'}->isValid()) return ${'menu_item_srl132_argument'}->getErrorMessage();
if(${'menu_item_srl132_argument'} !== null) ${'menu_item_srl132_argument'}->setColumnType('number');

${'parent_srl133_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl133_argument'}->checkFilter('number');
${'parent_srl133_argument'}->ensureDefaultValue('0');
if(!${'parent_srl133_argument'}->isValid()) return ${'parent_srl133_argument'}->getErrorMessage();
if(${'parent_srl133_argument'} !== null) ${'parent_srl133_argument'}->setColumnType('number');

${'menu_srl134_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl134_argument'}->checkFilter('number');
${'menu_srl134_argument'}->checkNotNull();
if(!${'menu_srl134_argument'}->isValid()) return ${'menu_srl134_argument'}->getErrorMessage();
if(${'menu_srl134_argument'} !== null) ${'menu_srl134_argument'}->setColumnType('number');

${'name135_argument'} = new Argument('name', $args->{'name'});
${'name135_argument'}->checkNotNull();
if(!${'name135_argument'}->isValid()) return ${'name135_argument'}->getErrorMessage();
if(${'name135_argument'} !== null) ${'name135_argument'}->setColumnType('text');
if(isset($args->url)) {
${'url136_argument'} = new Argument('url', $args->{'url'});
if(!${'url136_argument'}->isValid()) return ${'url136_argument'}->getErrorMessage();
} else
${'url136_argument'} = NULL;if(${'url136_argument'} !== null) ${'url136_argument'}->setColumnType('varchar');

${'is_shortcut137_argument'} = new Argument('is_shortcut', $args->{'is_shortcut'});
${'is_shortcut137_argument'}->ensureDefaultValue('N');
${'is_shortcut137_argument'}->checkNotNull();
if(!${'is_shortcut137_argument'}->isValid()) return ${'is_shortcut137_argument'}->getErrorMessage();
if(${'is_shortcut137_argument'} !== null) ${'is_shortcut137_argument'}->setColumnType('char');
if(isset($args->open_window)) {
${'open_window138_argument'} = new Argument('open_window', $args->{'open_window'});
if(!${'open_window138_argument'}->isValid()) return ${'open_window138_argument'}->getErrorMessage();
} else
${'open_window138_argument'} = NULL;if(${'open_window138_argument'} !== null) ${'open_window138_argument'}->setColumnType('char');
if(isset($args->expand)) {
${'expand139_argument'} = new Argument('expand', $args->{'expand'});
if(!${'expand139_argument'}->isValid()) return ${'expand139_argument'}->getErrorMessage();
} else
${'expand139_argument'} = NULL;if(${'expand139_argument'} !== null) ${'expand139_argument'}->setColumnType('char');
if(isset($args->normal_btn)) {
${'normal_btn140_argument'} = new Argument('normal_btn', $args->{'normal_btn'});
if(!${'normal_btn140_argument'}->isValid()) return ${'normal_btn140_argument'}->getErrorMessage();
} else
${'normal_btn140_argument'} = NULL;if(${'normal_btn140_argument'} !== null) ${'normal_btn140_argument'}->setColumnType('varchar');
if(isset($args->hover_btn)) {
${'hover_btn141_argument'} = new Argument('hover_btn', $args->{'hover_btn'});
if(!${'hover_btn141_argument'}->isValid()) return ${'hover_btn141_argument'}->getErrorMessage();
} else
${'hover_btn141_argument'} = NULL;if(${'hover_btn141_argument'} !== null) ${'hover_btn141_argument'}->setColumnType('varchar');
if(isset($args->active_btn)) {
${'active_btn142_argument'} = new Argument('active_btn', $args->{'active_btn'});
if(!${'active_btn142_argument'}->isValid()) return ${'active_btn142_argument'}->getErrorMessage();
} else
${'active_btn142_argument'} = NULL;if(${'active_btn142_argument'} !== null) ${'active_btn142_argument'}->setColumnType('varchar');
if(isset($args->group_srls)) {
${'group_srls143_argument'} = new Argument('group_srls', $args->{'group_srls'});
if(!${'group_srls143_argument'}->isValid()) return ${'group_srls143_argument'}->getErrorMessage();
} else
${'group_srls143_argument'} = NULL;if(${'group_srls143_argument'} !== null) ${'group_srls143_argument'}->setColumnType('text');

${'listorder144_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder144_argument'}->checkNotNull();
if(!${'listorder144_argument'}->isValid()) return ${'listorder144_argument'}->getErrorMessage();
if(${'listorder144_argument'} !== null) ${'listorder144_argument'}->setColumnType('number');

${'regdate145_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate145_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate145_argument'}->isValid()) return ${'regdate145_argument'}->getErrorMessage();
if(${'regdate145_argument'} !== null) ${'regdate145_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_item_srl`', ${'menu_item_srl132_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl133_argument'})
,new InsertExpression('`menu_srl`', ${'menu_srl134_argument'})
,new InsertExpression('`name`', ${'name135_argument'})
,new InsertExpression('`url`', ${'url136_argument'})
,new InsertExpression('`is_shortcut`', ${'is_shortcut137_argument'})
,new InsertExpression('`open_window`', ${'open_window138_argument'})
,new InsertExpression('`expand`', ${'expand139_argument'})
,new InsertExpression('`normal_btn`', ${'normal_btn140_argument'})
,new InsertExpression('`hover_btn`', ${'hover_btn141_argument'})
,new InsertExpression('`active_btn`', ${'active_btn142_argument'})
,new InsertExpression('`group_srls`', ${'group_srls143_argument'})
,new InsertExpression('`listorder`', ${'listorder144_argument'})
,new InsertExpression('`regdate`', ${'regdate145_argument'})
));
$query->setTables(array(
new Table('`xe_menu_item`', '`menu_item`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>