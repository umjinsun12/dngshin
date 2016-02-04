<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertSiteAddon");
$query->setAction("insert");
$query->setPriority("");

${'site_srl107_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl107_argument'}->checkNotNull();
if(!${'site_srl107_argument'}->isValid()) return ${'site_srl107_argument'}->getErrorMessage();
if(${'site_srl107_argument'} !== null) ${'site_srl107_argument'}->setColumnType('number');

${'addon108_argument'} = new Argument('addon', $args->{'addon'});
${'addon108_argument'}->checkNotNull();
if(!${'addon108_argument'}->isValid()) return ${'addon108_argument'}->getErrorMessage();
if(${'addon108_argument'} !== null) ${'addon108_argument'}->setColumnType('varchar');

${'is_used109_argument'} = new Argument('is_used', $args->{'is_used'});
${'is_used109_argument'}->ensureDefaultValue('N');
${'is_used109_argument'}->checkNotNull();
if(!${'is_used109_argument'}->isValid()) return ${'is_used109_argument'}->getErrorMessage();
if(${'is_used109_argument'} !== null) ${'is_used109_argument'}->setColumnType('char');

${'is_used_m110_argument'} = new Argument('is_used_m', $args->{'is_used_m'});
${'is_used_m110_argument'}->ensureDefaultValue('N');
if(!${'is_used_m110_argument'}->isValid()) return ${'is_used_m110_argument'}->getErrorMessage();
if(${'is_used_m110_argument'} !== null) ${'is_used_m110_argument'}->setColumnType('char');
if(isset($args->extra_vars)) {
${'extra_vars111_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars111_argument'}->isValid()) return ${'extra_vars111_argument'}->getErrorMessage();
} else
${'extra_vars111_argument'} = NULL;if(${'extra_vars111_argument'} !== null) ${'extra_vars111_argument'}->setColumnType('text');

${'regdate112_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate112_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate112_argument'}->isValid()) return ${'regdate112_argument'}->getErrorMessage();
if(${'regdate112_argument'} !== null) ${'regdate112_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl107_argument'})
,new InsertExpression('`addon`', ${'addon108_argument'})
,new InsertExpression('`is_used`', ${'is_used109_argument'})
,new InsertExpression('`is_used_m`', ${'is_used_m110_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars111_argument'})
,new InsertExpression('`regdate`', ${'regdate112_argument'})
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>