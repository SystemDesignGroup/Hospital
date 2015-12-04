<!DOCTYPE html>

<html>
	<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员-编辑医院信息</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
	
		<body>
			<div id="head_div"> 
				<span>欢迎来到全国统一挂号平台管理中心</span>
				<label>管理信息-编辑医院信息</label>
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
				<font size="4"  color="red">缺少
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
				<a href="editHospital.html">继续工作</a>
			</div>
			</center>
HTML;
			require_once '../database.php';

			$hname=$_POST['hospital_name'];
			$hcity=$_POST['hospital_city'];
			$hgrade=$_POST['hospital_level'];
			$hmajor=$_POST['hospital_major'];
			$haddr=$_POST['hospital_address'];
			$htel=$_POST['hospital_telephone'];
			$hintr=$_POST['hospital_intr'];
			$succeed=true;
			if(strlen($hname)<1)
			{
			echo $html_error_a."医院名称".$html_error_b;	
			$succeed=false;
			}
			$nullcity="选择所在市";
			if($hcity===$nullcity)
			{
			echo $html_error_a."医院所在省市".$html_error_b;	
			$succeed=false;
			}
			if(strlen($haddr)<1)
			{
			echo $html_error_a."医院详细地址".$html_error_b;	
			$succeed=false;
			}
			if(strlen($htel)<1)
			{
			echo $html_error_a."医院联系方式".$html_error_b;	
			$succeed=false;
			}
			if(strlen($hintr)<1)
			{
			echo $html_error_a."医院介绍".$html_error_b;	
			$succeed=false;
			}
			if($succeed)
			{
				$db = new database();
				//search city
				$city_id=0;
				$city_re=$db->get_field_from_table('city','id','name',$hcity);
				if(count($city_re)==0)
				{
					$valuesci=array('name' => $hcity);
					$db->insert_data_into_table('city',$valuesci);
					$city_re=$db->get_field_from_table('city','id','name',$hcity);
				}
				$city_id=$city_re[0]['id'];
				
				//search grade
				$grade_id=0;
				$grade_re=$db->get_field_from_table('grade','id','detail',$hgrade);
				if(count($grade_re)==0)
				{
					$valuesci=array('detail' => $hgrade);
					$db->insert_data_into_table('grade',$valuesci);
					$grade_re=$db->get_field_from_table('grade','id','detail',$hgrade);
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
				
				//insert
				$hos_re=$db->get_field_from_table('hospital','id','name',$hname);
				if(count($hos_re)==0)
				{
					$values=array(
					'name' => $hname,
					'city' => $city_id,
					'address'=>$haddr,
					'major_id'=>$major_id,
					'grade_id'=>$grade_id,
					'tel'=>$htel,
					'intro'=>$hintr
					);
					$db->insert_data_into_table('hospital',$values);
					echo $html_successa.$hname."添加成功！".$html_successb;
				}
				else
				{
					$hos_id=$hos_re[0]['id'];
					$db->update_table('hospital','city',$city_id,'id',$hos_id);
					$db->update_table('hospital','address',$haddr,'id',$hos_id);
					$db->update_table('hospital','major_id',$major_id,'id',$hos_id);
					$db->update_table('hospital','grade_id',$grade_id,'id',$hos_id);
					$db->update_table('hospital','tel',$htel,'id',$hos_id);
					$db->update_table('hospital','intro',$hintr,'id',$hos_id);
					echo $html_successa.$hname."修改成功！".$html_successb;
				}
			}
			else
			{
				echo $html_error_return;
			}
?> 
			
		</body>
		
</html>


