<?php
class database{
	/*const $table_structs=array(
			'users' => array('id'=>,'name'=>,'password'=>,'email'=>,'role,id_card'=>,'tel'=>,'status'=>)",
			'city' => array('id'=>,'name'=>,'provinces'=>),
			'grade' => array('id'=>,'detail'=>),
			'major' => array('id'=>,'name'=>,'intro'=>),
			'hospital' => array('id'=>,'name'=>,'city'=>,'address'=>,'major_id'=>,'grade_id'=>,'tel'=>,'intro'=>),
			'department' => array('id'=>,'name'=>,'hospital_id'=>,'intro'=>),
			'doctor' => array('id'=>,'name'=>,'department_id'=>,'major_id'=>,'grade_id'=>,'hospital_id'=>,'intro'=>,'calendar_id'=>),
			'calendar' => array('id'=>,'type'=>,'detail'=>,'off_start'=>,'off_end'=>),
			'order_hospital' => array('id'=>,'user_id'=>,'doctor_id'=>,'order_date'=>,'order_time'=>,'order_status'=>)
		);*/
	private $mysql_db,
			$mysql_host,
			$mysql_password,
			$mysql_port,
			$mysql_user,
			$connect;
	public function __construct(){//本地调试使用注释中的值
		$this->mysql_host = SAE_MYSQL_HOST_M;//'localhost';//SAE_MYSQL_HOST_M;
		$this->mysql_db = SAE_MYSQL_DB;//'hospital';//SAE_MYSQL_DB;
		$this->mysql_user = SAE_MYSQL_USER;//'YOURUSERNAME';//SAE_MYSQL_USER;
		$this->mysql_password = SAE_MYSQL_PASS;//'YOURPASSWORD';//SAE_MYSQL_PASS;
		$this->mysql_port = SAE_MYSQL_PORT;	//3306;//SAE_MYSQL_PORT;
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
	//建议使用以下三个函数存取数据
	public function insert_data_into_table($table,$datavalues){//$table为表名，$datavalues是所存数据，类型为关联数组，其中变量命名与下面函数一致
		extract($datavalues);
		switch($table){
			case 'users'			:$this->put_user_in_db($name,$password,$email,$role,$id_card,$tel,$status);break;
			case 'city'				:$this->put_city_in_db($name,$province);break;
			case 'grade'			:$this->put_grade_in_db($detail);break;
			case 'major'			:$this->put_major_in_db($name,$intro);break;
			case 'hospital'			:$this->put_hospital_in_db($name,$city,$address,$major_id,$grade_id,$tel,$intro);break;
			case 'department'		:$this->put_department_in_db($name,$hospital_id,$intro);break;
			case 'doctor'			:$this->put_doctor_in_db($name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id);break;
			case 'calendar'			:$this->put_calendar_in_db($type,$detail,$off_start,$off_end);break;
			case 'order_hospital'	:$this->put_order_hospital_in_db($user_id,$doctor_id,$order_date,$order_time,$order_status);break;
			default					:echo "No Such Table In This Data Base<br />";
		}
	}
	public function get_field_from_table($table,$field,$keys){//表名，待查询字段（需要的结果），查询依据的字段及字段值（为关联数组形式）;返回值为关联数组形式
		$keys_index = array_keys($keys);
		$str = 'WHERE ';
		foreach($keys_index as $index){
			$str = $str."$index = '$keys[$index]' AND ";
		}
		$str = substr($str,0,-4);
		$result = $this->connect->prepare("SELECT $field FROM $table ".$str);
		$result->execute();
		$value = $result->fetchAll(PDO::FETCH_ASSOC);
		return $value;
	}
	public function update_table($table,$column,$value,$key_field,$key){//表名，待更改字段，待更改字段值，查询依据字段，查询依据字段值
		$result = $this->connect->exec("UPDATE $table SET $column='$value' WHERE $key_field='$key'");
	}
	//以下函数不建议直接使用
	public function put_user_in_db($name,$password,$email,$role,$id_card,$tel,$status){
		$this->connect->exec("INSERT INTO users(name,password,email,role,id_card,tel,status) VALUES".
		"('$name','$password','$email','$role','$id_card','$tel','$status')");
	}
	public function put_city_in_db($name,$province){
		$this->connect->exec("INSERT INTO city(name,province) VALUES".
		"('$name','$province')");
	}
	public function put_grade_in_db($detail){
		$this->connect->exec("INSERT INTO grade(detail) VALUES".
		"('$detail')");
	}
	public function put_major_in_db($name,$intro){
		$this->connect->exec( "INSERT INTO major(name,intro) VALUES".
		"('$name','$intro')");
	}
	public function put_hospital_in_db($name,$city,$address,$major_id,$grade_id,$tel,$intro){
		$this->connect->exec( "INSERT INTO hospital(name,city,address,major_id,grade_id,tel,intro) VALUES".
			"('$name','$city','$address','$major_id','$grade_id','$tel','$intro')");	
	}
	public function put_department_in_db($name,$hospital_id,$intro){
		$this->connect->exec( "INSERT INTO department(name,hospital_id,intro) VALUES".
		"('$name','$hospital_id','$intro')");
	}
	public function put_doctor_in_db($name,$department_id,$major_id,$grade_id,$hospital_id,$intro,$calendar_id){
		$this->connect->exec( "INSERT INTO doctor(name,department_id,major_id,grade_id,hospital_id,intro,calendar_id) VALUES".
		"('$name','$department_id','$major_id','$grade_id','$hospital_id','$intro','$calendar_id')");
	}
	public function put_calendar_in_db($type,$detail,$off_start,$off_end){
		$this->connect->exec( "INSERT INTO calendar(type,detail,off_start,off_end) VALUES".
			"('$type','$detail','$off_start','$off_end')");
	}
	public function put_order_hospital_in_db($user_id,$doctor_id,$order_date,$order_time,$order_status){
		$this->connect->exec( "INSERT INTO order_hospital(user_id,doctor_id,order_date,order_time,order_status) VALUES".
			"('$user_id','$doctor_id','$order_date','$order_time','$order_status')");
	}
	
}

?>