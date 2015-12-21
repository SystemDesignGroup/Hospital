<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/9
 * Time: 20:50
 */
require_once"../database.php";

$user_id = $_GET['user_id'];
$doctor_id = $_GET['doctor_id'];
$date = $_GET['date'];
$time = $_GET['time'];

$conn = new database();

//$username = $_SESSION['username'];
$array0 = array('name'=>$user_id);
$result = $conn->get_field_from_table("users","id_card",$array0);

$array1 = array('id'=>$doctor_id);
$tickets = $conn->get_field_from_table('doctor','tickets',$array1);

$a_count = $tickets[0]['tickets']/2;
$p_count = $tickets[0]['tickets']/2;
if($time=='上午'){

    if($a_count<=0){
        echo '该医生上午预约人数已满,请选择其他时间';
    }else{
        $a_count--;
        $array = array("user_id"=>$result[0]['id_card'],"doctor_id"=>$doctor_id,"order_date"=>$date,"order_time"=>"6:00","order_status"=>0);
        $conn->insert_data_into_table("order_hospital",$array);

        $conn->update_table('doctor','tickets',($a_count+$p_count),'id',$doctor_id);

        echo 1;
    }
}else{
    if($p_count<=0){
        echo '该医生下午预约人数已满，请选择其他时间';
    }else{
        $p_count--;
        $array = array("user_id"=>$result[0]['id_card'],"doctor_id"=>$doctor_id,"order_date"=>$date,"order_time"=>"14:00","order_status"=>0);
        $conn->insert_data_into_table("order_hospital",$array);

        $conn->update_table('doctor','tickets',($a_count+$p_count),'id',$doctor_id);

        echo 1;
    }
}



?>
