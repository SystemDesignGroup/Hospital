<?php
class database{
	private $mysql_db,
			$mysql_host,
			$mysql_password,
			$mysql_port,
			$mysql_user,
			$connect;
	public function __construct(){
		$this->mysql_host = SAE_MYSQL_HOST_M;
		$this->mysql_db = SAE_MYSQL_DB;
		$this->mysql_user = SAE_MYSQL_USER;
		$this->mysql_password = SAE_MYSQL_PASS;
		$this->mysql_port = SAE_MYSQL_PORT;
		$this -> connect_to_db();
	}
	public function __destruct(){
		$this -> connect = NULL;
	}
	public function connect_to_db(){
		$dns = 'mysql:dbname='.$this->mysql_db.";host=".$this->mysql_host.";port=".$mysql_port;
		$this->connect = new PDO($dns, $this->mysql_user,$this->mysql_password);
		if(!$this->connect) die ("Unable to connect to MySQL: ".mysql_error());
	}
	public function operation_fail($query){
		if(!mysql_query($query,$connect)){
			echo "insert into user failed: $query<br />".mysql_error()."<br /><br />";
		}
	}
	public function put_user_in_db($id,$name,$password,$email,$role,$id_card,$tel,$status){
		$connect->exec("INSERT INTO users VALUES".
		"('$id','$name','$password','$email','$role','$id_card','$tel','$status')");
		
	}
	public function put_city_in_db($id,$name,$provinces){
		$query = "INSERT INTO city VALUES"."('$id','$name','$provinces')";
		operation_fail($query);
	}
	public function put_grade_in_db($id,$detail){
		$query = "INSERT INTO grade VALUES"."('$id','$detail')";
		operation_fail($query);
	}
	public function put_major_in_db($id,$name,$intro){
		$query = "INSERT INTO major VALUES"."('$id','$name','$intro')";
		operation_fail($query);
	}
	public function put_hospital_in_db($id,$name,$city,$address,$major_id,$grade_id,$tel,$intro){
		$query = "INSERT INTO hospital VALUES".
			"('$id','$name','$city','$address','$major_id','$grade_id','$tel','$intro')";
			operation_fail($query);
	}
	public function put_department_in_db($id,$name,$hospital_id,$intro){
		$query = "INSERT INTO department VALUES"."('$id','$name','$hospital_id','$intro')";
		operation_fail($query);
	}
	public function put_doctor_in_db($id,$name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id){
		$query = "INSERT INTO department VALUES"."('$id','$name','$department_id','$major_id','$grade_id','$hospital_id','$intro','$calendar_id')";
		operation_fail($query);
	}
	public function put_calendar_in_db($id,$type,$detail,$off_start,$off_end){
		$query = "INSERT INTO calendar VALUES".
			"'$id','$type','$detail','$off_start','$off_end')";
		operation_fail($query);
	}
	public function put_order_hospital_in_db($id,$user_id,$doctor_id,$order_date,$order_time,$order_status){
		$query = "INSERT INTO order_hospital VALUES".
			"'$id','$user_id','$doctor_id','$order_date','$order_time','$order_status')";
		operation_fail($query);
	}
}

?>