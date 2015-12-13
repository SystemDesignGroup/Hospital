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
        $key_username=array('name'=>$username);
        $key_password=array('password'=>$username);
        $realuname=$db->get_field_from_table('users','users.name',$key_username);
        $realpwd=$db->get_field_from_table('users','users.password',$key_password);
        if(count($key_username)==0)
        {
            echo "用户不存在";
        }
        else
        {
            $realusername=$realuname[0]['name'];
            $realpassword=$realpwd[0]['password'];
            if($username==$realusername && $password==$realpassword)
            {
                $errmsg="deng lu cheng gong";
                echo($errmsg);
                header("refresh:0;url=home.html");
                session_start();
                $_SESSION['uid']=$username;
                if(empty($_SESSION['uid']))
                {
                    echo"你还没有登录";
                }
                exit;
            }
            else
            {
                $errmsg="deng lu shi bai!";
                echo($errmsg);
                exit;
            }
        }
    }
}
?>
