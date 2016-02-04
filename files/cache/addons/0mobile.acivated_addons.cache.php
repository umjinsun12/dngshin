<?php if(!defined("__XE__")) exit();
$_m = Context::get('mid');
$before_time = microtime(true);
$rm = 'run_selected';
$ml = array(
'board_vqEn86' => 1,
);
$addon_file = './addons/addon_insert_maplatlng/addon_insert_maplatlng.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6NDp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjE0OiJnb29nbGVfbWFwX2tleSI7czozOToiQUl6YVN5Q2xUYW9CMFVDdkhoSWp3ejVBbTA2T0ppMXBDbktObFFBIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTp7aTowO3M6MTI6ImJvYXJkX3ZxRW44NiI7fX0=')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6NDp7czoxNToieGVfdmFsaWRhdG9yX2lkIjtzOjMxOiJtb2R1bGVzL2FkZG9uL3RwbC9zZXR1cF9hZGRvbi8xIjtzOjE0OiJnb29nbGVfbWFwX2tleSI7czozOToiQUl6YVN5Q2xUYW9CMFVDdkhoSWp3ejVBbTA2T0ppMXBDbktObFFBIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTp7aTowO3M6MTI6ImJvYXJkX3ZxRW44NiI7fX0=')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "addon_insert_maplatlng";
$addon_time_log->called_extension = "addon_insert_maplatlng";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);