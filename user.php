<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" href="css/user.css" />
</head>

<body>
<div class="page">
<header> 
<div class="headl">     
    <hgroup>
    <div id="head_div"> 
    <h1>个人中心</h1>
	</div>
    </hgroup>
</div>
</header>
<!--标题-->

<?php
/* search information for user's center */

	require_once("database.php");
	$username = $_SESSION['username'];
    $db = new database();
	
	$vuser = array(
			'name' => $username
		);
	$rid = $db->get_field_from_table('users','id',$vuser);
	$rname = $db->get_field_from_table('users','name',$vuser);
	$remail = $db->get_field_from_table('users','email',$vuser);
	$rtel = $db->get_field_from_table('users','tel',$vuser);
	$rid_card = $db->get_field_from_table('users','id_card',$vuser);

	
echo <<< _END
	<div class="one-col separator">
		<div class="col">
			<h2>个人信息</h2>
			<p>姓名：<?php echo $rname ?> <span id="name"></span></p>
            <p>邮箱：<?php echo $remail ?><span id=email></span></p>
            <p>手机号：<?php echo $rtel ?><span id=tel></span></p>
			<p>身份证号:<?php echo $rid_card ?><span id=id></span></p>
		</div>
	</div>
		<!-- 个人信息 -->
		
_END;
?>
		
		
		
		<!--我的预约单-->
			<div class="col">
			  <h2 class="page">我的预约单</h2> 
			</div>

            <form id="checkOrder" action="" name="order">
			<input type="hidden" name="pageNo" value="1">
			<label>
					按状态筛选：
			</label>
				<select name="orderState">
						<option value="0">全部</option>
						<option value="2">待就诊</option>
						<option value="3">待确认</option>
						<option value="1">待支付</option>
				</select> 		 
			<label>
				预约时间：
			</label>
				<span>
				<input type="text" id="startTime" name="shiftDateBegin" class="text hasDatepicker" value="2010-01-01" readonly>
				</span>
			    <span>-</span>
				<span>
				<input type="text" id="endTime" name="shiftDateEnd" class="text hasDatepicker" value="2015-12-07" readonly>
				</span>
				<input type="submit" name="button2" id="button2" value="查询">

<?php
/* search information for user's center */

	require_once("database.php");
	$username = $_SESSION['username'];
    $db = new database();	
	$vorder = array(
			'user_id' => $rid
		);
	$roder_id = $db->get_field_from_table('order_hospital','id',$vorder);
	$roder_time = $db->get_field_from_table('order_hospital','order_date,order_time',$vorder);
	$rstatus = $db->get_field_from_table('order_hospital','status',$vorder);
	$rorder_doctor_id = $db->get_field_from_table('order_hospital','doctor_id',$vorder);
	$vdoctor = array('doctor_id' => $rorder_doctor_id);	
	$rdoctor_name = $db->get_field_from_table('doctor','name',$vdoctor);
echo <<< _END
	</form>
				  
           <table width="100%" border="0">
            <thead>
			  <tr>
			    <th scope="col"><div align="center">预约单号<?php echo $roder_id ?></div></th>
			    <th scope="col"><div align="center">预约时间 <?php echo $roder_time ?></div></th>
			    <th scope="col"><div align="center">预约人<?php echo $rname ?></div></th>
			    <th scope="col"><div align="center">医生<?php echo $rdoctor_name ?></div></th>
			    <th scope="col"><div align="center">预约状态<?php echo $rstatus ?></div></th>
                <th scope="col"><div align="center">操作</div></th>
		      </tr>
              <script type="text/javascript">
              <>
              </script>
            </thead>
          </table>
_END;
?>
</body>
</html>
