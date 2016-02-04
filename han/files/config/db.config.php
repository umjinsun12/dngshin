<?php if(!defined("__XE__")) exit();
$db_info = (object)array (
  'master_db' => 
  array (
    'db_type' => 'mysql',
    'db_port' => '3306',
    'db_hostname' => '127.0.0.1',
    'db_userid' => 'root',
    'db_password' => '1234',
    'db_database' => 'dbhan',
    'db_table_prefix' => 'xe_',
  ),
  'slave_db' => 
  array (
    0 => 
    array (
      'db_type' => 'mysql',
      'db_port' => '3306',
      'db_hostname' => '127.0.0.1',
      'db_userid' => 'root',
      'db_password' => '1234',
      'db_database' => 'dbhan',
      'db_table_prefix' => 'xe_',
    ),
  ),
  'default_url' => 'http://165.246.149.135/han/',
  'lang_type' => 'ko',
  'use_mobile_view' => 'Y',
  'use_rewrite' => 'N',
  'time_zone' => '+0900',
);