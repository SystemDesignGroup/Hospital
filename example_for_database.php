<?php
header("Content-type: text/html; charset=utf-8"); 
require_once 'database.php';
$db = new database();
$values=array(
	'name' => "GuanFuHe",
	'password' => "123456"
);
#$db->insert_data_into_table('users',$values);

$key_values=array(
	'province'=>"北京市"
);
$results = $db->get_field_from_table('city','name',$key_values);
print_r($results);
?>