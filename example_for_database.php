<?php
require_once 'database.php';
$db = new database();
$values=array(
	'name' => "Shanghai",
	'province' => "Shanghai"
);
$db->insert_data_into_table('city',$values);
$db->get_field_from_table('city','province','name','Shanghi');
echo "Done";
?>