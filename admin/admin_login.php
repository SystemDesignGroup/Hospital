<!DOCTYPE html>
<html>
	<?php 
	
	$html_success = <<<HTML
	<meta http-equiv="refresh" content="1; url=editHospital.html"> 
<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员登录</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
		<div id="head_div"> 
			<span>欢迎来到全国统一挂号平台管理中心</span>
		</div>
	<center>
	<div id="logo_div">
		<div id="logo-title">
			<img src="../image/small_logo.jpg" alt="挂号平台logo" id="logo"/>
			<h1>全国统一挂号平台管理中心</h1>				
		</div>
	</div>
	<div>
		<font size="5"  color="gray">登录成功，即将跳转到管理员系统...</font>
	</div>
	</center>
HTML;

	require_once '../database.php';
	$name=$_POST['user'];
	$password=$_POST['password'];
	$db=new database();
	$db->connect_to_db();
	if($name === "")
	{
		echo"<script type='text/javascript'>alert('请填写用户名');location='../login_for_admin.html';
            </script>";
	}
	elseif($password === "")
	{
		echo"<script type='text/javascript'>alert('请填写密码');location='../login_for_admin.html';</script>";
	}
	else
	{
		$hos_values=array(
			'name' => $name,
			'password'=>$password
			);
		$hospital_id=0;
		$hos_re=$db->get_field_from_table('users','role',$hos_values);
		if($hos_re[0][role]==2)
		{
			echo $html_success;
		}
		else
			echo "<script type='text/javascript'>alert('登录失败，您是否选择了错误的登录入口?（普通用户请在首页点击“登录”而不是“管理员登录”）');location='../login_for_admin.html';</script>";
	}
	?>

</html> 
