<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/8
 * Time: 23:36
 */
require_once"../database.php";

$conn = new database();

$hospital =$_GET['hospital']; //"北京大学第三医院";
$department =$_GET['department'];//"骨科";

$keys = array('name'=>$hospital);
$hospital_id = $conn->get_field_from_table("hospital","id",$keys);
$hospital_id_s = $hospital_id[0]['id'];

$keys1 = array('name'=>$department);
$department_id = $conn->get_field_from_table("department","id",$keys1);
$department_id_s = $department_id[0]['id'];

$keys2 = array('hospital_id'=>$hospital_id_s,'department_id'=>$department_id_s);
$doctor = $conn->get_field_from_table("doctor","*",$keys2);
echo json_encode($doctor);
//echo $doctor[0]['name'];