<?php 

require_once '../database.php';

$hname=$_POST['hospital_name'];
if(strlen($hname)<1)
{
    echo "请填写医院名称！<br>";
}
else
{
    $db = new database();
    $values=array(
	'name' => $hname,
	'city' => "1",
	'address'=>"UNKNOWN",
	'major_id'=>"1",
	'grade_id'=>"1",
	'tel'=>"123456789",
	'intro'=>"UNKNOWN"
    );
    $db->insert_data_into_table('hospital',$values);

    echo "医院名称：$hname<br>".'医院信息添加成功！<br>';
}

echo "<br>".date('H:i,jS F Y');
?> 
