<?php
//登录
require_once '../database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$errmsg='';
if(!empty($errmsg))  //yan zheng shu ju wei kong
{
    if(empty($username))
        $errmsg="数据输入不完整";
        echo($errmsg);
}
if(empty($errmsg))
{
    $db=new database();
    $db->connect_to_db();
    if(mysqli_connect_errno())
    {
        $errmsg="shu ju ku lian jie shi bai!<br>\n";
        echo($errmsg);
    }
    else
    {
        $realusername=$db->get_field_from_table('users','name','id_card');
        $realpassword=$db->get_field_from_table('users','password','id_card');
        if($username==$realusername && $password==$realpassword)
        {
            $errmsg="deng lu cheng gong";
            echo($errmsg);
            session_start();
            $_SESSION['uid']=$username;
            if(empty($_SESSION['uid']))
            {
                echo"你还没有登录";
            }
        }
        else
        {
            $errmsg="deng lu shi bai!";
            echo($errmsg);
        }
    }
}
?>
