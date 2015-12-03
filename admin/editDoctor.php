<!DOCTYPE html>

<html>
	<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员-编辑医生信息</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
	
		<body>
			<div id="head_div"> 
				<span>欢迎来到全国统一挂号平台管理中心</span>
				<label>管理信息-编辑医生信息</label>
			</div>
			<center>
			<div id="logo-title">
				<img src="../image/small_logo.jpg" alt="挂号平台logo" id="logo"/>
				<h1>全国统一挂号平台管理中心</h1>				
			</div>
			</center>
			<?php 
			$html_error_a = <<<HTML
			<center>
			<div>
				<font size="5"  color="red">缺少
HTML;
			$html_error_b = <<<HTML
！</font>
			</div>
			<br>
			</center>
HTML;
			$html_error_return = <<<HTML
			<center>
			<div class="normal-btn">
				<a href="javascript:history.back(-1)">返回修改</a>
			</div>
			</center>
HTML;
$html_success = <<<HTML
			<center>
			<div>
				<font size="5"  color="blue">医生信息添加成功！</font>
			</div>
			<br>
			<div class="normal-btn">
				<a href="editDoctor.html">继续工作</a>
			</div>
			</center>
HTML;
			require_once '../database.php';

			$hname=$_POST['doctor_name'];
			$hlevel=$_POST['doctor_level'];
			$hospital=$_POST['hospital_belong'];
			$office=$_POST['office_belong'];
			$hintr=$_POST['doctor_intr'];
			$succeed=true;
			if(strlen($hname)<1)
			{
			echo $html_error_a."医生名字".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hospital)<1)
			{
			echo $html_error_a."所属医院".$html_error_b;	
			$succeed=false;
			}
			if(strlen($office)<1)
			{
			echo $html_error_a."所属科室".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hintr)<1)
			{
			echo $html_error_a."医生介绍".$html_error_b;	
			$succeed=false;
			}
			if($succeed)
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
			else
			{
			echo $html_error_return;
			}
?> 
			
		</body>
		
</html>


