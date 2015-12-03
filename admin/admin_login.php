<!DOCTYPE html>

<html>
	<?php 
	$html_fail = <<<HTML
	<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员登录</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
		<div id="head_div"> 
			<span>欢迎来到全国统一挂号平台</span>
		</div>
		<center>
		<div id="logo_div">
			<div id="logo-title">
				<img src="../image/small_logo.jpg" alt="挂号平台logo" id="logo"/>
				<h1>全国统一挂号平台</h1>				
			</div>
		</div>	
		<div>
			<font size="5"  color="red">登录失败，您是否选择了错误的登录入口?<br>（普通用户请在首页点击“登录”而不是“管理员登录”）</font>
		</div>
		<br>
		<div class="normal-btn">
			<a href="../home.html">返回首页</a>
		</div>
		</center>
HTML;
	$html_success = <<<HTML
	<meta http-equiv="refresh" content="2; url=editHospital.html"> 
<head>
	 	<meta charset="UTF-8"/>
	 	<title>管理员登录</title>
		 <link type="text/css" rel="stylesheet" href="../css/admin.css"/>
	</head>
		<div id="head_div"> 
			<span>欢迎来到全国统一挂号平台</span>
		</div>
	<center>
	<div id="logo_div">
		<div id="logo-title">
			<img src="../image/small_logo.jpg" alt="挂号平台logo" id="logo"/>
			<h1>全国统一挂号平台</h1>				
		</div>
	</div>
	<div>
		<font size="5"  color="gray">登录成功，即将跳转到管理员系统...</font>
	</div>
	</center>
HTML;
		$hname=$_POST['user'];
		if(strlen($hname)<1)
		{
			echo $html_fail;			
		}
		else
		{
			echo $html_success;
		}
?> 

</html>