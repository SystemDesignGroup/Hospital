<?php
require_once'../database.php';
//链接数据库
$db=new database();
$db->connect_to_db();

//获取相关医院信息
$tab='感染科';//$_GET['tab'];
$leibie=$_GET['leibie'];

$text=array('name'=>$tab);
$hospital_id=$db->get_field_from_table("department","hospital_id",$text);
$hospital_id_s = $hospital_id[0]['hospital_id'];
$keys1 = array('id'=>$hospital_id_s);
$result_hos= $db->get_field_from_table("hospital","id,name,address,tel,intro",$keys1);
//获取相关医生信息
$department_id=$db->get_field_from_table("department","id",$text);
$department_id_s = $department_id[0]['id'];
$keys2 = array('department_id'=>$department_id_s);
$result_doc= $db->get_field_from_table("doctor","id,name,grade_id,intro,tickets",$keys2);

if($leibie=='hos'&&$result_hos!=null){
    echo json_encode($result_hos);
}

if($leibie=='doc'&&$result_doc!=null){
    echo json_encode($result_doc);
}

$test=array('name'=>'外科');
$result=$db->get_field_from_table("department","hospital_id",$test);
echo json_encode($result);

?>