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

$conn = new database();

//$username = $_SESSION['username'];

$array = array("user_id"=>$user_id,"doctor_id"=>$doctor_id,"order_date"=>$date,"order_time"=>null,"order_status"=>1);

$conn->insert_data_into_table("order_hospital",$array);

echo '预约成功';

?>
