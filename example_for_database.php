<?php
require_once 'database.php';
$db = new database();
$values=array(
	'name' => "Shanghai",
	'province' => "Shanghai"
);
$var = 0;
$db->insert_data_into_table('city',$values);
if($db->get_field_from_table(&$var,'city','province','name','Shanghi'))
	echo "$var";
?>