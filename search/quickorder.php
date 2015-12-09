<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/5
 * Time: 10:40
 */
require_once"../database.php";

$province = $_GET['province'];
$city = $_GET['city'];
$hospital = $_GET['hospital'];
//$keshi = $_GET['keshi'];

$conn = new database();
if($province!=null&&strcmp($province,"")!= 0){
    $keys = array("province"=>$province);
    $result = $conn->get_field_from_table("city","name",$keys);
    echo json_encode($result);
}
if($city!=null&&strcmp($city,"")!= 0){
    $keys = array('name'=>$city);
    $city_id = $conn->get_field_from_table("city","id",$keys);
    $city_id_s = $city_id[0]['id'];
    $keys1 = array('city'=>$city_id_s);
    $result = $conn->get_field_from_table("hospital","name",$keys1);
    echo json_encode($result);
}
if($hospital!=null&&strcmp($hospital,"")!= 0){
    $keys = array('name'=>$hospital);
    $hospital_id = $conn->get_field_from_table("hospital","id",$keys);
    $hospital_id_s = $hospital_id[0]['id'];
    $keys1 = array('hospital_id'=>$hospital_id_s);
    $result = $conn->get_field_from_table("department","name",$keys1);
    echo json_encode($result);
}