<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/9
 * Time: 20:25
 */
require_once"../database.php";

$conn = new database();

session_start();
$username = $_SESSION['username'];

echo $username;

?>
