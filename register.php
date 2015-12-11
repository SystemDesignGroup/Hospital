<?php
/**
 * Created by PhpStorm.
 * User: wq
 * Date: 12/6/15
 * Time: 1:46 AM
 */

    require_once "database.php";
if(isset($_POST["submit"]) && $_POST["submit"] == "注册") {
    $email = $_POST['email'];
    $username = $_POST['name'];
    $tel = $_POST['tel'];
    $card = $_POST['id_card'];
    $password = $_POST['password'];

    //连接数据库
    $db = new database();
    $db->connect_to_db();

    //insert
    $user_re = $db->get_field_from_table('users', 'id', 'id_card');
    if (count($user_re) != 0) //如果已经存在该用户
    {
        echo "<script>alert('用户名已存在'); history.go(-1);</script>";
    } else //该用户不存在
    {
        $values = array(
            'email' => $email,
            'name' => $username,
            'tel' => $tel,
            'id_card' => $card,
            'password' => $password
        );
        $db->insert_data_into_table('users', $values);
        echo "<script>alert('注册成功！'); history.go(-1);</script>";
    }
}

else {
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}

?>









