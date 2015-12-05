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
    $result = $conn->get_field_from_table("city","name","province",$province);
    echo json_encode($result);
}
if($city!=null&&strcmp($city,"")!= 0){
    $city_id = $conn->get_field_from_table("city","id","name",$city);
    $city_id_s = $city_id[0]['id'];
    $result = $conn->get_field_from_table("hospital","name","city",$city_id_s);
    echo json_encode($result);
}
if($hospital!=null&&strcmp($hospital,"")!= 0){
    $hospital_id = $conn->get_field_from_table("hospital","id","name",$hospital);
    $hospital_id_s = $hospital_id[0]['id'];
    $result = $conn->get_field_from_table("department","name","hospital_id",$hospital_id_s);
    echo json_encode($result);
}