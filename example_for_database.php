<?php
require_once 'database.php';
$db = new database();
$values=array(
	'id' => '2',
	'name' => "Shanghai",
	'provinces' => "2"
);
$db->insert_data_into_table('city',$values);
$db->get_field_from_table('city','provinces','name','Shanghi');
echo "Done";
?>