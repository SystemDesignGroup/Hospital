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

//获取标签内容

//获取医院信息
$tab = $_GET['tab'];
//$leibie=$_GET['leibie'];

$test = array('name' => $tab);
$hospital_id1 = $db -> get_field_from_table("province", "hospital_id", $test);
$hospital_id2 = $db -> get_field_from_table("city", "hospital_id", $test);
$hospital_id3 = $db -> get_field_from_table("grade", "hospital_id", $test);
$hospital_id4 = $db -> get_field_from_table("major", "hospital_id", $test);

$hospital_id = array_intersect_assoc($hospital_id1, $hospital_id2, $hospital_id3, $hospital_id4);
$hospital_id_s = $hospital_id[0]['hospital_id'];
$keysl = array('hospital_id' => $hospital_id_s);
$result_hospital = $db -> get_field_from_table("hospital", "id, name, address, tel, intro", $keysl);

if($result_hospital != null) {
    echo json_encode($result_hospital);
} else {
    echo "找不到相关医院";
}

?>