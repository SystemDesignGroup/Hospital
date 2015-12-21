<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" href="../css/user.css" />
<link rel="stylesheet" href="../css/userorder.css" />
</head>

<body>
<div class="user-nav">
     <a class="nav-left">欢迎来到全国统一挂号平台</a>
	 <ul class="nav-right">
     <li><a href="../home.html" class="nav-right-font">返回首页</a></li>
     </ul>
</div>
<!------------------页首---------------------->

<div id="logo_div">
		<div id="logo-title">
			<img src="../image/logo.jpg" alt="挂号平台logo" id="logo"/>
			<h1>全国统一挂号平台</h1>
		</div>
		<div id="search-bar">
		    <span class="icon-search"></span>
		    <input type="text"  placeholder="请输入医院名、科室名或医生名"/>
		<div class="blue-normal-btn" >
				<a id="search-btn" href="javacript:void(0)">查询</a>
		</div>
		</div>
</div>
<!---------------------------LOGO及搜索栏--------------------------------->

<div class="blue-div">
    <label class="blue-div-start">快速预约：</label>
    <a href="../search/search.html" class="blue-div-hosptial">按医院找</a>
    <a href="../search/ksearch.html" class="blue-div-keshi">按科室找</a>
    <a href="../searchindex.html" class="blue-div-search">快速搜索</a>
</div>
<!--------------------------Blue div--------------------------------------->
<div class="menu">
<dropdown>
<input id="toggle1" type="checkbox" checked>
<label for="toggle1" class="animate">欢迎来到个人中心<i class="fa fa-bars float-right"></i></label>
<ul id="menuul" class="animate">
  <li><a href="../user/userorder.php" class="animate">我的预约单</a></li>
  <li><a href="../user/usermessage.php" class="animate">账号信息</a></li>
  <li><a href="../user/userpassword.html" class="animate">更改密码</a> </li>
  <li><a href="../search/quickorder.html" class="animate">快速预约</a></li>
  <li><a href="#" class="animate">预约指南</a></li>
  <li><a href="#" class="animate">公告查看</a></li>
  <li><a href="#" class="animate">意见反馈</a></li>
</ul>
</dropdown>
</div>

<!-------------------------菜单栏----------------------------------------->

<?php
/* search information for user's center */

	require_once("../database.php");
	session_start();
	$username = $_SESSION['username'];
    	$db = new database();
	
	$vuser = array(
			'name' => $username
		);
  	$userinfo = $db->get_field_from_table('users','id_card',$vuser);
	$rid =$userinfo[0]['id_card'];
	
	$vorder = array(
			'user_id' => $rid
		);
	$orderinfo = $db->get_field_from_table('order_hospital','id,order_date,order_time,order_status,doctor_id',$vorder);

echo <<< _END

<div class="page">
    <div>
    <label class="start"><span class="link"></span></label>
    </div>

    <div>
    <img class="set" src="../image/set.jpg" alt="更改密码图片" id="set"/>
    <label class="passwordfont">我的预约单</label>
    </div>

    <div class="change-div">
    </div>

    <div class="mainpart">
       <table width=100% border="0">
            <thead>
			  <tr>
			    <th><div align="center">预约单号</div></th>
			    <th><div align="center">预约时间 </div></th>
			    <th><div align="center">预约人</div></th>
			    <th><div align="center">医生 </div></th>
			    <th><div align="center">预约状态</div></th>
                	<th><div align="center">操作</div></th>
			</tr>
_END;

for($i = 0;$i < count($orderinfo);$i++){
		$oid = $orderinfo[$i]['id'];
		$otime = $orderinfo[$i]['order_date'];
		$ostatus = $orderinfo[$i]['order_status'];
		$odoctor_id = $userinfo[$i]['doctor_id'];		

		$vdoctor = array('id' => $odoctor_id);
		$doctorinfo = $db->get_field_from_table('doctor','name',$vdoctor);
		$odoctor_name = $doctorinfo[0]['name'];
		
echo <<< _FOR
			<form action="userorder.php" method="post">
            <tr>
				<th class="table-first-line"><input align="center" type=hidden name="exitID" id="getId"> $oid </th>
				<th class="table-normal-line"><div align="center"> $otime </div></th>
			        <th class="table-normal-line"><div align="center"> $username </div></th>
			        <th class="table-normal-line"><div align="center"> $odoctor_name </div></th>
			        <th class="table-normal-line"><div align="center"> $ostatus </div></th>
                		<th class="table-last-line">
                        <table align="center">
                        <th><div align="center"><button class="button"  type="submit"><a>取消订单</a> </button></div></th>
                        <th><div align="center"><button class="button2" onclick="pay()"><a>支付</a> </button></div></th>
                        </table>
                        </th>
		        </tr>
                </form>
_FOR;
}


echo <<< _TAIL
            </thead>
          </table>
	<div align="center"><button class="button3" onclick="print()"><a>打印预约单</a> </button></div>
</div>
    </div>
</div>
_TAIL;
?>
  
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$db->delete_index_from_table($order,$_POST['exitID']);	//取消预约
	}
?>
<script>
    function pay() {
        alert("支付成功");
    }

    function print() {
        alert("已打印预约单");
    }
</script>
</body>
</html>
