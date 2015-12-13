<?php
//登录
require_once '../database.php';
$username = $_POST['user'];
$password = $_POST['password'];

session_start();
if(empty($username) or empty($password))
{
    echo "数据输入不完整!";
    header("Location:login.html");
}
else
{
    $db=new database();
    $db->connect_to_db();
    if(mysqli_connect_errno())
    {
        echo"shu ju ku lian jie shi bai!";
    }
    else
    {
        $key_username=array('users.name'=>$username);
        $key_password=array('users.password'=>$username);
        $realuname=$db->get_field_from_table('users','users.name',$key_username);
        $realpwd=$db->get_field_from_table('users','users.password',$key_password);
        if(count($key_username)==0)
        {
            echo"用户不存在!";
        }
        else
        {
            $realusername=$realuname[0]['name'];
            $realpassword=$realpwd[0]['password'];
            if($username==$realusername && $password==$realpassword)
            {
                echo"登录成功!";
                $_SESSION['uid']=$username;
                if(empty($_SESSION['uid']))
                {
                    echo "<script>alert('你还没有登');</script>";
                }
                exit;
            }
            else
            {
                echo"登录失败！";
                exit;
            }
        }
    }
}
?>
