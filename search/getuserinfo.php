<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/9
 * Time: 20:25
 */
require_once"../database.php";

$conn = new database();

$username = $_SESSION['username'];

$array = array("name"=>$username);

$result = $conn->get_field_from_table("users","id",$array);

echo $result[0]['id'];

?>
