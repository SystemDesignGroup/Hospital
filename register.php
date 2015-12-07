<?php
/**
 * Created by PhpStorm.
 * User: wq
 * Date: 12/6/15
 * Time: 1:46 AM
 */

require_once '../database.php';

$email = $_POST['user_email'];
$username = $_POST['user_name'];
$tel = $_POST['user_tel'];
$card = $_POST['user_card'];
$password = $_POST['user_password'];

$succeed = true;

if($succeed) {
    $db = new database();
    $db->connect_to_db();

    //insert
    $user_re = $db ->get_field_from_table('users','id','id_card',$card);
    if(count($user_re) == 0) {
        $values = array(
            'email' => $email,
            'name' => $username,
            'tel' => $tel,
            'id_card' => $card,
            'password' => $password
        );
        $db->insert_data_into_table('users',$values);
        echo "你的用户";
        echo $username;
        echo "已成功注册！";


    }

    else{
        echo "注册失败！";
    }







}
