<!DOCTYPE html>

<html>
	<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员-编辑医院</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
	
		<body>
			<div id="head_div"> 
				<span>欢迎来到全国统一挂号平台</span>
				<label>管理信息-编辑医院</label>
			</div>
			<center>
			<div id="logo-title">
				<img src="../image/small_logo.jpg" alt="挂号平台logo" id="logo"/>
				<h1>全国统一挂号平台</h1>				
			</div>
			</center>
			<?php 
			$html_error_name = <<<HTML
			<center>
			<div>
				<font size="5"  color="red">缺少医院名称！</font>
			</div>
			<br>
			<div class="normal-btn">
				<a href="javascript:history.back(-1)">返回修改</a>
			</div>
			</center>
HTML;
$html_success = <<<HTML
			<center>
			<div>
				<font size="5"  color="blue">医院信息添加成功！</font>
			</div>
			<br>
			<div class="normal-btn">
				<a href="editHospital.html">继续工作</a>
			</div>
			</center>
HTML;
			require_once '../database.php';

			$hname=$_POST['hospital_name'];
			if(strlen($hname)<1)
			{
			echo $html_error_name;			
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
			
			echo $html_success;
			}
?> 
			
		</body>
		
</html>


