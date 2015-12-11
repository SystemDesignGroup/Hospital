<!DOCTYPE html>

<html>
	<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员-编辑科室信息</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
	
		<body>
			<div id="head_div"> 
				<span>欢迎来到全国统一挂号平台管理中心</span>
				<label>管理信息-编辑科室信息</label>
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
				<font size="4"  color="red">
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
$html_successa = <<<HTML
			<center>
			<div>
				<font size="4"  color="blue">
HTML;
$html_successb = <<<HTML
			</font>
			</div>
			<br>
			<div class="normal-btn">
				<a href="editOffice.html">继续工作</a>
			</div>
			</center>
HTML;
			require_once '../database.php';

			$hname=$_POST['office_name'];
			$hbelong=$_POST['office_belong'];
			$hcity=$_POST['hospital_city'];
			$hpro=$_POST['hospital_pro'];
			$hintr=$_POST['office_intr'];
			$succeed=true;
			if(strlen($hname)<1)
			{
			echo $html_error_a."缺少科室名称".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hbelong)<1)
			{
			echo $html_error_a."缺少科室所属医院".$html_error_b;	
			$succeed=false;
			}
			$nullcity="选择所在市";
			if($hcity===$nullcity)
			{
			echo $html_error_a."缺少医院所在省市".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hintr)<1)
			{
			echo $html_error_a."缺少科室介绍".$html_error_b;	
			$succeed=false;
			}
			if($succeed)
			{
				$db = new database();
				//search hospital
				$hos_values=array(
					'hospital.name' => $hbelong,
					'city.name'=>$hcity
					);
				$hospital_id=0;
				$hos_re=$db->get_field_from_table('hospital,city','hospital.id',$hos_values);
				if(count($hos_re)==0)
				{
					echo $html_error_a."未在数据库中发现所属医院信息（请确认信息正确或先添加所属医院信息）".$html_error_b;
					echo $html_error_return;
				}
				else
				{
					$hospital_id=$hos_re[0]['id'];
					$values=array(
					'name' => $hname,
					'hospital_id'=>$hospital_id,
					'intro'=>$hintr
					);
					$db->insert_data_into_table('department',$values);
					echo $html_successa.$hname."添加成功！".$html_successb;
				}
			}
			else
			{
				echo $html_error_return;
			}
?> 
		</body>
		
</html>


