<?php
/**
 * Created by PhpStorm.
 * User: lyg11211016
 * Date: 15-12-23
 * Time: 下午12:39
 */

require_once'../database.php';
//链接数据库
$db = new database();
$db -> connect_to_db();

//获取医院信息
$tab1 = $_GET['tab1'];
$tab2 = $_GET['tab2'];
$tab3 = $_GET['tab3'];

$test1 = array('name' => $tab1);
$test2 = array('name' => $tab2);
$test3 = array('name' => $tab3);

$hospital1 = $db -> get_field_from_table("海淀区", "hospital_id");
$hospital2 = $db -> get_field_from_table("grade", "hospital_id");
$hospital3 = $db -> get_field_from_table("major", "hospital_id");

$hospital1 = $db -> get_field_from_table("city", "hospital_id", $test1);
$hospital2 = $db -> get_field_from_table("grade", "hospital_id", $test2);
$hospital3 = $db -> get_field_from_table("major", "hospital_id", $test3);


$hospital0 = array_intersect_assoc($hospital1, $hospital2, $hospital3);
$hospital0_s = $hospital0[0]['hospital_id'];
$keysl = array('hospital_id' => $hospital0_s);
$result_hospital = $db -> get_field_from_table("hospital", "id, name, address, tel, intro", $keysl);


echo json_encode($result_hospital);

?>