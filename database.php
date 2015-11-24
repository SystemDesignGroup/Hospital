<?php
class database{
	private $mysql_db,
			$mysql_host,
			$mysql_password,
			$mysql_port,
			$mysql_user,
			$connect;
	function __construct(){
		$mysql_host = SAE_MYSQL_HOST_M;
		$mysql_db = SAE_MYSQL_DB;
		$mysql_user = SAE_MYSQL_USER;
		$mysql_password = SAE_MYSQL_PASS;
		$mysql_port = SAE_MYSQL_PORT;
		$this -> connect_to_db();
	}
	function __destruct(){
		$this -> close_connection();
	}
	function connect_to_db(){
		$connect = new PDO('mysql:host=$mysql_host;dbname=$mysql_db',$mysql_user,$mysql_password);
		if(!$connect){ 
			die ("Unable to connect to MySQL: ".mysql_error());
			}
	}
	function close_connection(){
		$connect = NULL;
	}
	function operation_fail($query){
		if(!mysql_query($query,$connect)){
			echo "insert into user failed: $query<br />".mysql_error()."<br /><br />";
		}
	}
	function put_user_in_db($id,$name,$password,$email,$role,$id_card,$tel,$status){
		$connect->$query("INSERT INTO users VALUES".
		"('$id','$name','$password','$email','$role','$id_card','$tel','$status')");
		operation_fail($query);
	}
	function put_city_in_db($id,$name,$provinces){
		$connect->$query("INSERT INTO city VALUES"."('$id','$name','$provinces')");
		operation_fail($query);
	}
	function put_grade_in_db($id,$detail){
		$query = "INSERT INTO grade VALUES"."('$id','$detail')";
		operation_fail($query);
	}
	function put_major_in_db($id,$name,$intro){
		$query = "INSERT INTO major VALUES"."('$id','$name','$intro')";
		operation_fail($query);
	}
	function put_hospital_in_db($id,$name,$city,$address,$major_id,$grade_id,$tel,$intro){
		$query = "INSERT INTO hospital VALUES".
			"('$id','$name','$city','$address','$major_id','$grade_id','$tel','$intro')";
			operation_fail($query);
	}
	function put_department_in_db($id,$name,$hospital_id,$intro){
		$query = "INSERT INTO department VALUES"."('$id','$name','$hospital_id','$intro')";
		operation_fail($query);
	}
	function put_doctor_in_db($id,$name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id){
		$query = "INSERT INTO department VALUES"."('$id','$name','$department_id','$major_id','$grade_id','$hospital_id','$intro','$calendar_id')";
		operation_fail($query);
	}
	function put_calendar_in_db($id,$type,$detail,$off_start,$off_end){
		$query = "INSERT INTO calendar VALUES".
			"'$id','$type','$detail','$off_start','$off_end')";
		operation_fail($query);
	}
	function put_order_hospital_in_db($id,$user_id,$doctor_id,$order_date,$order_time,$order_status){
		$query = "INSERT INTO order_hospital VALUES".
			"'$id','$user_id','$doctor_id','$order_date','$order_time','$order_status')";
		operation_fail($query);
	}
}

?>