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
$grade = $_GET['grade'];
$date = $_GET['date'];

$keys = array('name'=>$hospital);
$hospital_id = $conn->get_field_from_table("hospital","id",$keys);
$hospital_id_s = $hospital_id[0]['id'];

$keys1 = array('name'=>$department);
$department_id = $conn->get_field_from_table("department","id",$keys1);
$department_id_s = $department_id[0]['id'];

if($grade==""&&$date==''){
    $keys2 = array('hospital_id'=>$hospital_id_s,'department_id'=>$department_id_s);
    $doctor = $conn->get_field_from_table("doctor","id,name,grade_id,intro,tickets",$keys2);
    echo json_encode($doctor);
}else if($grade!=''&&$date=='请选择日期'){

    $keys2= array('detail'=>$grade);
    $grade_id = $conn->get_field_from_table('grade','id',$keys2);
    $grade_id_s = $grade_id[0]['id'];

    $keys3 = array('hospital_id'=>$hospital_id_s,'department_id'=>$department_id_s,'grade_id'=>$grade_id_s);
    $doctor = $conn->get_field_from_table("doctor","id,name,grade_id,intro,tickets",$keys3);

    echo json_encode($doctor);
}else if($grade=='全部'&&$date!='请选择日期'){
//    $keys2= array('detail'=>$grade);
//    $grade_id = $conn->get_field_from_table('grade','id',$keys2);
//    $grade_id_s = $grade_id[0]['id'];

    $keys3 = array('hospital_id'=>$hospital_id_s,'department_id'=>$department_id_s,
        'calendar_id'=>'calendar.id','off_start<'=>$date,'off_end>'=>$date);
    $doctor = $conn->another_get_field_from_table("doctor,calendar","doctor.id,name,grade_id,intro,tickets,off_start,off_end",$keys3,'=');

    echo json_encode($doctor);
}else if($grade!='全部'&&$date!='请选择日期'){
    $keys2= array('detail'=>$grade);
    $grade_id = $conn->get_field_from_table('grade','id',$keys2);
    $grade_id_s = $grade_id[0]['id'];

    $keys3 = array('hospital_id'=>$hospital_id_s,'department_id'=>$department_id_s,'grade_id'=>$grade_id_s,
        'calendar_id'=>'calendar.id','off_start<'=>$date,'off_end>'=>$date);
    $doctor = $conn->another_get_field_from_table("doctor,calendar","doctor.id,name,grade_id,intro,tickets,off_start,off_end",$keys3,'=');

    echo json_encode($doctor);
}


//echo $doctor[0]['name'];