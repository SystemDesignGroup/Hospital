<?php
//登录
require_once("database.php");

$connection=new database();
$connection->connect_to_db();
$connection->__construct();
if(!isset($_POST['submit']))
{
    exit('非法访问!');
}
$username = $_POST['username'];
$password = $_POST['password'];

$check_query = mysql_query("select name from users where name='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query))
{
    //登录成功
    $_SESSION['username'] = $username;
    echo $username,' 欢迎你！进入 <a href="home.html">用户中心</a><br />';
    echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
    exit;
} else
{
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
?>
