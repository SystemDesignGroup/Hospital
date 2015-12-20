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
				<a href="../home.html" style="float:right;"><font color=blue>退出登录</font></a>
			</div>
				<div id="btn-div">
					<div class="normal-btn" style="margin-left:100px">
							<a id="fast-reserve-btn" href="editHospital.html">编辑医院信息</a>
					</div>	
					<div class="normal-btn">
							<a id="fast-reserve-btn" href="editOffice.html">编辑科室信息</a>
					</div>	
					<div class="normal-btn">
							<a id="fast-reserve-btn" href="editDoctor.html">编辑医生信息</a>
					</div>	
					<div class="normal-btn">
							<a id="fast-reserve-btn" href="user_check.php">用户审核</a>
					</div>	
					<div class="normal-btn">
							<a id="fast-reserve-btn" href="user_level.html">设定用户等级</a>
					</div>	
				</div>
				</div>
				<form name='form1' action='check.php' method='post'>
				<?php 
				$html_table_a = <<<HTML
				<center>
				<table border="1"  WIDTH=1100>
				<tr>
				<th WIDTH=17% HEIGHT=50>用户名</th>
				<th WIDTH=25% HEIGHT=50>身份证号</th>
				<th WIDTH=25% HEIGHT=50>邮箱</th>
				<th WIDTH=18% HEIGHT=50>电话</th>
				<th WIDTH=15% HEIGHT=50>操作</th>
				</tr>
HTML;
				$html_table_b = <<<HTML
				</table>
				</center>
HTML;
				require_once '../database.php';
				$db = new database();
				$chk_values=array(
					'status' => 0,
					);
				$hos_re=$db->get_field_from_table('users','name,email,id_card,tel',$chk_values);
				$count=count($hos_re);
				echo "<p align=\"right\"><font size=\"2\"  color=\"blue\">当前待审核用户</font><font size=\"3\"  color=\"red\">".$count."</font><font size=\"2\"  color=\"blue\">位</font></p>\n";
				if($count!=0)
				{
					echo $html_table_a;
					if($count>10)
					{$count=10;}
					for($i=0;$i<$count;$i++)
					{
						echo "<tr><td HEIGHT=36>".$hos_re[$i]['name']."</td><td>".$hos_re[$i]['id_card']."</td><td>".$hos_re[$i]['email']."</td><td>".$hos_re[$i]['tel']."</td><td><div class=\"switch demo3\"><input type=\"checkbox\" name=\"boxes[]\" value=\"".$hos_re[$i]['id_card']."\"><label></label></div></td></tr>\n";
						echo "<input type=\"hidden\" name=\"hids[]\" value=\"".$hos_re[$i]['id_card']."\"></div></td></tr>\n";
					}
					echo $html_table_b;
				}
?> 
					<div id="complete-div" class="block">
							<div class="normal-btn" id="save" style="margin-left:300px">
									<a id="fast-reserve-btn" class="edit" href='javascript:document.form1.submit();'>提交修改</a>
							</div>	
							<div class="normal-btn" id="cancel">
									<a id="fast-reserve-btn" class="edit" href="javascript:history.go(0)">取消此编辑</a>
							</div>	
					</div>
			</div>
			</form>
		</body>
		
</html>