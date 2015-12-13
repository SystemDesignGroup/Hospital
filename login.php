<?php
//登录
require_once './database.php';
$username = $_POST['user'];
$password = $_POST['password'];

$my_db=new database();
$my_db->connect_to_db();
if($username == "")
{
    echo"<script type='text/javascript'>alert('请填写用户名');location='../login.html';</script>";
}
elseif($password == "")
{
    echo"<script type='text/javascript'>alert('请填写密码');location='../login.html';</script>";
}
else
{
    $key_values=array('name' => $username, 'password'=>$password);
    $key_re=$my_db->get_field_from_table('users','role',$key_values);
    if($key_re[0][role]==1)
    {
        echo $html_success;
    }
    else
    {
        echo "<script type='text/javascript'>alert('登录失');location='../login.html';</script>";
    }
}
?>
