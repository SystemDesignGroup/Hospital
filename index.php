<?php
require_once 'database.php';
$db = new database();
$values=array(
	'name' => "Shanghai",
	'provinces' => "2"
);
$db->insert_data_into_table('city',$values);
echo "Done";
?>