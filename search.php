<?php
/**
 * Created by PhpStorm.
 * User: xjf13211016
 * Date: 12/4/15
 * Time: 11:48 PM
 */
require_once"database.php";

set_time_limit(600);

$key=$_GET['key'];

if($key=""){
    echo"搜索的内容不能为空";
    exit;
}

function searchhospital($table,$field,$key,$keyfield,&$array){
    $conn=new database();
    $keyl=array("\'$keyfield\'"=>$key);
    $hospital_id=$conn->get_field_from_table("$table","$field",$keyl);
    $hospital_id_s = $hospital_id[0]['hospital_id'];
    $keys1 = array('id'=>$hospital_id_s);
    $array= $conn->get_field_from_table("hospital","name",$keys1);

}
//定义数组
$array=array();
//执行函数
if($array!=null) {//当array不为空时
    foreach ($array as $value) {//拆分并输出
        list($filedir, $title) = preg_split("[]", $value, 2);
        echo "<a href=$filedir target=_blank>$title</a>" . "<br>";
    }
    }
    else{
        echo "<script type='text/javascript'>alert('无搜索结果');location='search.html';</script>";
}
?>