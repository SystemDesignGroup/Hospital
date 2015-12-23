<?php
/**
 * Created by PhpStorm.
 * User: lyg11211016
 * Date: 15-12-23
 * Time: 下午12:39
 */

require_once'../database.php';
//链接数据库
$db = new database();
$db -> connect_to_db();

//获取医院信息
$city = $_GET['city'];//'海淀区';
$grade = $_GET['tab'];//'三级甲等';
$major = $_GET['major'];

//$tab3 = $_GET['tab3'];

$array = array('name'=>$city);
$city_id = $db->get_field_from_table('city','id',$array);
$city_id_i = $city_id[0]['id'];

if($city != ''&&$grade == ''&&$major==''){
    $key = array('city'=>$city_id_i);
    $result = $db->get_field_from_table('hospital','name,address,tel,intro',$key);
    echo json_encode($result);
}
if($grade == ''&&$major!=''){
    $array0 = array('name'=>$major);
    $m_result = $db->get_field_from_table('major','id',$array0);

    $key = array('major_id'=>$m_result[0]['id'],'city'=>$city_id_i);
    $result = $db->get_field_from_table('hospital','name,address,tel,intro',$key);

    echo json_encode($result);

}
if($major == ''&&$grade!=''){
    $array0 = array('detail'=>$grade);
    $m_result = $db->get_field_from_table('grade','id',$array0);

    $key = array('major_id'=>$m_result[0]['id'],'city'=>$city_id_i);
    $result = $db->get_field_from_table('hospital','name,address,tel,intro',$key);

    echo json_encode($result);
}

//$test1 = array('name' => $tab1);
//$test2 = array('name' => $tab2);
//$test3 = array('name' => $tab3);
//
//$hospital1 = $db -> get_field_from_table("海淀区", "hospital_id");
//$hospital2 = $db -> get_field_from_table("grade", "hospital_id");
//$hospital3 = $db -> get_field_from_table("major", "hospital_id");
//
//$hospital1 = $db -> get_field_from_table("city", "hospital_id", $test1);
//$hospital2 = $db -> get_field_from_table("grade", "hospital_id", $test2);
//$hospital3 = $db -> get_field_from_table("major", "hospital_id", $test3);
//
//
//$hospital0 = array_intersect_assoc($hospital1, $hospital2, $hospital3);
//$hospital0_s = $hospital0[0]['hospital_id'];
//$keysl = array('hospital_id' => $hospital0_s);
//$result_hospital = $db -> get_field_from_table("hospital", "id, name, address, tel, intro", $keysl);
//
//
//echo json_encode($result_hospital);

?>