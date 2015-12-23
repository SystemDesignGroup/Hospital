
<?php
/**
 * Created by PhpStorm.
 * User: whx
 * Date: 2015/12/22
 * Time: 23:30
 */
require_once'../database.php';

$conn = new database();

$key = $_GET['key'];

$array0 = array("hospital.name like"=>"'$key'",'city='=>'city.id','major_id='=>'major.id','grade_id='=>'grade.id');
//查询医院
$result0 = $conn->another_get_field_from_table('hospital,city,major,grade','hospital.name h_name,city.name c_name,address,detail,tel,hospital.intro',$array0,'=');
//var_dump($result0);

//查询科室
$array1 = array('department.name like'=>"'$key'",'hospital_id='=>'hospital.id');
$result1 = $conn->another_get_field_from_table('department,hospital','department.name d_name,hospital.name h_name,department.intro intro',$array1,"=");

//var_dump($result1);
//查询医生
$array2 = array('doctor.name like'=>"'$key'",'doctor.department_id='=>'department.id',
    'doctor.major_id='=>'major.id','doctor.grade_id='=>'grade.id','doctor.hospital_id='=>'hospital.id');
$result2 = $conn->another_get_field_from_table('doctor,department,major,grade,hospital','doctor.name dc_name,department.name dp_name,
detail,hospital.name h_name,doctor.intro intro',$array2,"=");

//var_dump($result2);

$result = array($result0,$result1,$result2);
//var_dump($result);
echo json_encode($result);

?>
