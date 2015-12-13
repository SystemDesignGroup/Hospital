<?php
//登录
require_once '../database.php';
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
$username = $_POST['user'];
$password = $_POST['password'];

session_start();
if($username=="")
{
    echo "请填写用户名<br>";
    echo"<script type='text/javascript'>alert('请填写用户名');location='login.php';</script>";
}
elseif($password=="")
{
    echo "请填写密码<br><a href='login.php'>返回</a>";
    echo"<script type='text/javascript'>alert('请填写密码');location='login.php';</script>";
}
else
{
    $my_db=new database();

        $key_username=array('users.name'=>$username);
        $key_password=array('users.password'=>$username);
        $realuname=$my_db->get_field_from_table('users','users.name',$key_username);
        $realpwd=$my_db->get_field_from_table('users','users.password',$key_password);
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
                echo "登录!";
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
?>
