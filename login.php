<html>
<meta charset="utf-8"/>
<?php
//登录

require_once './database.php';
$username = $_POST['user'];
$password = $_POST['password'];

//$_SESSION["userflag"]=false;
$my_db=new database();

//if(isset($_SESSION["userflag"]) && $_SESSION["userflag"] === true)
//{
//    echo"您已经成功登陆";
//}
//else
//{
//    $_SESSION["userflag"] = false;
//    echo"<script type='text/javascript'>alert('请您还没有登录或者登录过期');location='login.html';</script>";
//}

if($username == "")
{
    echo"<script type='text/javascript'>alert('请填写用户名');location='login.html';</script>";
}
elseif($password == "")
{
    echo"<script type='text/javascript'>alert('请填写密码');location='login.html';</script>";
}
else
{
    $key_values=array('name' => $username, 'password'=>$password);
    $key_re=$my_db->get_field_from_table('users','*',$key_values);
    if($key_re[0]['password'] == $password and $key_re[0]['role'] == 1)
    {
        $lifeTime = 120;
        session_set_cookie_params($lifeTime);
        session_start();
        $_SESSION["username"] = $username;
        echo "<script type='text/javascript'>alert('登录成功');location='home.html';</script>";
    }
    else
    {
        echo "$username + $password";
        echo "<script type='text/javascript'>alert('用户名或密码错误');location='login.html';</script>";
    }
}
?>
</html>
