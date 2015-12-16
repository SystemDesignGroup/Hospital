<html>
<meta charset="utf-8"/>
<?php
/**
 * Created by PhpStorm.
 * User: wq
 * Date: 12/6/15
 * Time: 1:46 AM
 */

    require_once './database.php';
//if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册") {

    $email = $_POST['email'];
    $username = $_POST['name'];
    $tel = $_POST['tel'];
    $card = $_POST['card'];
    $password = $_POST['password'];

    //连接数据库
    $db = new database();
   // $db->connect_to_db();

    //insert
    $user_values = array('id_card' => $card);
    $user_re = $db->get_field_from_table('users', 'id', $user_values);
    if (count($user_re) != 0) //如果已经存在该用户
    {
        echo "<script>alert('用户名已存在'); history.go(-1);</script>";
    } else //该用户不存在
    {
        $values = array(

            'name' => $username,
            'password' => $password,
            'email' => $email,
            'role'=>1,
            'id_card' => $card,
            'tel' => $tel,
            'status' => 1
        );
        $db->insert_data_into_table('users', $values);
        echo "<script>alert('已提交信息请等待审核！'); location='home.html';</script>";
    }
//}
//else {
    //echo "<script>alert('提交未成功！'); history.go(-1);</script>";
//}
?>
</html>









