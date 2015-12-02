<?php
require_once 'database.php';
$db = new database();
$values=array(
	'name' => "Shanghai",
	'province' => "Shanghai"
);

$db->insert_data_into_table('city',$values);

?>