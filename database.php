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
		$dns = 'mysql:host='.$this->mysql_host.";port=".$this->mysql_port.";dbname=".$this->mysql_db;
		try{
			$this->connect = new PDO($dns, $this->mysql_user,$this->mysql_password);
		}
		catch (PDOException $e) {
    		print "Error!: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
	public function put_user_in_db($id,$name,$password,$email,$role,$id_card,$tel,$status){
		$this->connect->exec("INSERT INTO users VALUES".
		"('$id','$name','$password','$email','$role','$id_card','$tel','$status')");
		
	}
	public function put_city_in_db($id,$name,$provinces){
		$this->connect->exec("INSERT INTO city VALUES"."('$id','$name','$provinces')");
	}
	public function put_grade_in_db($id,$detail){
		$this->connect->exec("INSERT INTO grade VALUES"."('$id','$detail')");
		
	}
	public function put_major_in_db($id,$name,$intro){
		$this->connect->exec( "INSERT INTO major VALUES"."('$id','$name','$intro')");
		
	}
	public function put_hospital_in_db($id,$name,$city,$address,$major_id,$grade_id,$tel,$intro){
		$this->connect->exec( "INSERT INTO hospital VALUES".
			"('$id','$name','$city','$address','$major_id','$grade_id','$tel','$intro')");
			
	}
	public function put_department_in_db($id,$name,$hospital_id,$intro){
		$this->connect->exec( "INSERT INTO department VALUES"."('$id','$name','$hospital_id','$intro')");
		
	}
	public function put_doctor_in_db($id,$name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id){
		$this->connect->exec( "INSERT INTO department VALUES"."('$id','$name','$department_id','$major_id','$grade_id','$hospital_id','$intro','$calendar_id')");
		
	}
	public function put_calendar_in_db($id,$type,$detail,$off_start,$off_end){
		$this->connect->exec( "INSERT INTO calendar VALUES".
			"'$id','$type','$detail','$off_start','$off_end')");
		
	}
	public function put_order_hospital_in_db($id,$user_id,$doctor_id,$order_date,$order_time,$order_status){
		$this->connect->exec( "INSERT INTO order_hospital VALUES".
			"'$id','$user_id','$doctor_id','$order_date','$order_time','$order_status')");
		
	}
}

?>