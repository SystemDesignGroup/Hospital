<?php
class database{
	/*const $table_structs=array(
			'users' => "users(id,name,password,email,role,id_card,tel,status)",
			'city' => "city(id,name,provinces)",
			'grade' => "grade(id,detail)",
			'major' => "major(id,name,intro)",
			'hospital' => "hospital(id,name,city,address,major_id,grade_id,tel,intro)",
			'department' => "department(id,name,hospital_id,intro)",
			'doctor' => "doctor(id,name,department_id,major_id,grade_id,hospital_id,intro,calendar_id)",
			'calendar' => "calendar(id,type,detail,off_start,off_end)",
			'order_hospital' => "order_hospital(id,user_id,doctor_id,order_date,order_time,order_status)"
		);*/
	private $mysql_db,
			$mysql_host,
			$mysql_password,
			$mysql_port,
			$mysql_user,
			$connect;
	public function __construct(){//本地调试使用注释中的值
		$this->mysql_host = SAE_MYSQL_HOST_M;//'localhost'
		$this->mysql_db = SAE_MYSQL_DB;//'hospital'
		$this->mysql_user = SAE_MYSQL_USER;//'root'
		$this->mysql_password = SAE_MYSQL_PASS;//''
		$this->mysql_port = SAE_MYSQL_PORT;	//3306
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
	//建议使用以下两个函数存取数据
	public function insert_data_into_table($table,$datavalues){//$table为表名，$datavalues是所存数据，类型为关联数组，其中变量命名与下面函数一致
		extract($datavalues);
		switch($table){
			case 'users':$this->put_user_in_db($id,$name,$password,$email,$role,$id_card,$tel,$status);break;
			case 'city':$this->put_city_in_db($id,$name,$provinces);break;
			case 'grade':$this->put_grade_in_db($id,$detail);break;
			case 'major':$this->put_major_in_db($id,$name,$intro);break;
			case 'hospital':$this->put_hospital_in_db($id,$name,$city,$address,$major_id,$grade_id,$tel,$intro);break;
			case 'department':$this->put_department_in_db($id,$name,$hospital_id,$intro);break;
			case 'doctor':$this->put_doctor_in_db($id,$name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id);break;
			case 'calendar':$this->put_calendar_in_db($id,$type,$detail,$off_start,$off_end);break;
			case 'order_hospital':$this->put_order_hospital_in_db($id,$user_id,$doctor_id,$order_date,$order_time,$order_status);break;
			default: echo "No Such Table In This Data Base<br />";
		}
	}
	public function get_field_from_table($table,$field,$key_field,$key){//表名，待查询字段（需要的结果），查询依据的字段，查询所依据字段值
		$result = $this->connect->query("SELECT $field FROM $table WHERE $key_field='$key'");
		$var = $result->fetchColumn();
		return $var;
	}
	
	//以下函数不建议直接使用
	public function put_user_in_db($id,$name,$password,$email,$role,$id_card,$tel,$status){
		$this->connect->exec("INSERT INTO users(id,name,password,email,role,id_card,tel,status) VALUES".
		"('$id','$name','$password','$email','$role','$id_card','$tel','$status')");
	}
	public function put_city_in_db($id,$name,$provinces){
		$this->connect->exec("INSERT INTO city(id,name,provinces) VALUES".
		"('$id','$name','$provinces')");
	}
	public function put_grade_in_db($id,$detail){
		$this->connect->exec("INSERT INTO grade(id,detail) VALUES".
		"('$id','$detail')");
	}
	public function put_major_in_db($id,$name,$intro){
		$this->connect->exec( "INSERT INTO major(id,name,intro) VALUES".
		"('$id','$name','$intro')");
	}
	public function put_hospital_in_db($id,$name,$city,$address,$major_id,$grade_id,$tel,$intro){
		$this->connect->exec( "INSERT INTO hospital(id,name,city,address,major_id,grade_id,tel,intro) VALUES".
			"('$id','$name','$city','$address','$major_id','$grade_id','$tel','$intro')");	
	}
	public function put_department_in_db($id,$name,$hospital_id,$intro){
		$this->connect->exec( "INSERT INTO department(id,name,hospital_id,intro) VALUES".
		"('$id','$name','$hospital_id','$intro')");
	}
	public function put_doctor_in_db($id,$name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id){
		$this->connect->exec( "INSERT INTO doctor(id,name,department_id,major_id,grade_id,hospital_id,intro,calendar_id) VALUES".
		"('$id','$name','$department_id','$major_id','$grade_id','$hospital_id','$intro','$calendar_id')");
	}
	public function put_calendar_in_db($id,$type,$detail,$off_start,$off_end){
		$this->connect->exec( "INSERT INTO calendar(id,type,detail,off_start,off_end) VALUES".
			"'$id','$type','$detail','$off_start','$off_end')");
	}
	public function put_order_hospital_in_db($id,$user_id,$doctor_id,$order_date,$order_time,$order_status){
		$this->connect->exec( "INSERT INTO order_hospital(id,user_id,doctor_id,order_date,order_time,order_status) VALUES".
			"'$id','$user_id','$doctor_id','$order_date','$order_time','$order_status')");
	}
	
}

?>