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
				<a href="editDoctor.html">继续工作</a>
			</div>
			</center>
HTML;
			require_once '../database.php';

			$hname=$_POST['doctor_name'];
			$hlevel=$_POST['doctor_level'];
			$hospital=$_POST['hospital_belong'];
			$office=$_POST['office_belong'];
			$hmajor=$_POST['doctor_major'];
			$hintr=$_POST['doctor_intr'];
			$succeed=true;
			if(strlen($hname)<1)
			{
			echo $html_error_a."缺少医生名字".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hospital)<1)
			{
			echo $html_error_a."缺少所属医院".$html_error_b;	
			$succeed=false;
			}
			if(strlen($office)<1)
			{
			echo $html_error_a."缺少所属科室".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hintr)<1)
			{
			echo $html_error_a."缺少医生介绍".$html_error_b;	
			$succeed=false;
			}
			if($succeed)
			{
				$db = new database();
				//search grade
				$grade_id=0;
				$grade_re=$db->get_field_from_table('grade','id','detail',$hlevel);
				if(count($grade_re)==0)
				{
					$valuesci=array('detail' => $hlevel);
					$db->insert_data_into_table('grade',$valuesci);
					$grade_re=$db->get_field_from_table('grade','id','detail',$hlevel);
				}
				$grade_id=$grade_re[0]['id'];
				
				//search major
				$major_id=0;
				$major_re=$db->get_field_from_table('major','id','name',$hmajor);
				if(count($major_re)==0)
				{
					$valuesci=array('name' => $hmajor);
					$db->insert_data_into_table('major',$valuesci);
					$major_re=$db->get_field_from_table('major','id','name',$hmajor);
				}
				$major_id=$major_re[0]['id'];
				
				/////////////////////////////////
				$hospital_id=0;
				$hos_re=$db->get_field_from_table('hospital','id','name',$hospital);
				$office_id=0;
				$office_re=$db->get_field_from_table('department','id','name',$office);
				if(count($hos_re)==0)
				{
					echo $html_error_a."未在数据库中发现所属医院信息（请确认信息正确或先添加所属医院信息）".$html_error_b;
					echo $html_error_return;
				}
				else if(count($office_re)==0)
				{
					echo $html_error_a."未在数据库中发现所属科室信息（请确认信息正确或先添加所属医院信息）".$html_error_b;
					echo $html_error_return;
				}
				else
				{
					$calendar_id=0;
					$doid=$hospital."-".$office."-".$hname;
					$date_t=date("Y-m-d");
					$valuesca=array('type'=>1,'detail' => $doid,'off_start'=>$date_t,'off_end'=>$date_t);
					$db->insert_data_into_table('calendar',$valuesca);
					$cal_re=$db->get_field_from_table('calendar','id','detail',$doid);
					$calendar_id=$cal_re[0]['id'];
					$hospital_id=$hos_re[0]['id'];
					$office_id=$office_re[0]['id'];
					$values=array(
					'name' => $hname,
					'major_id' => $major_id,
					'grade_id' => $grade_id,
					'calendar_id' => $calendar_id,
					'hospital_id' => $hospital_id,
					'department_id' => $office_id,
					'intro'=>$hintr
					);
					$db->insert_data_into_table('doctor',$values);
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


