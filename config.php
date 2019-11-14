<?php 
class Database
{	
	public $host = "localhost";
	public $user = "root";
	public $pw = "";
	public $db = "denis";
	public $connect;
	# $connect = mysqli_connect($host, $user, $pw, $db);
	public function connect(){
		$this->connect = mysqli_connect($this->host,$this->user,$this->pw,$this->db);
		if (!$this->connect) {
			echo "Error in Connecting ".mysqli_connect_error();
		}
	}
	# $sql = "INSERT INTO $table (first_name, last_name) VALUES ($values)";
	# mysqli_query($conn , $sql);
	# insert("users",array("first_name","last_name"),array($fname,$lname))
	public function insert($table, $fields, $values) {
		$this->connect();
		$fields = is_array($fields) ? implode(", ", $fields) : $fields; # is_array it will check if the variable is array or not 
		# array("first_name","last_name"); "first_name, last_name"
		//$values = implode("','", $values);
		$sql = '';
		# $sql = ' "$fname", "$lname" ';
		# array($fname,$lname)
		if(is_array($values)){
			foreach ($values as $value) {
			if ($sql !=''){
				$sql .=", ";
			}
			if(is_numeric($value)){
				$sql .= " ".$value." ";
			}else {
				$sql .= "'".mysqli_real_escape_string($this->connect,$value)."'";
			}
			# 'asd', 2
		}
	}else {
		if(is_numeric($values)){
			$sql = $values;
		}else {
			$sql = "'".$values."'";
		}
		
	}
		
		$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$sql.");";
		# $sql = "INSERT INTO users (first_name, last_name) VALUES ("$fname", "$lname")"
		# insert("users",array(first_name, last_name),array($fname,$lname))
		$this->connect->query($sql);
		mysqli_close($this->connect);
	} 
	# ID,name,age 
	# SELECT fields FROM tableName JOINS WHERE ORDER"
	#fetch_data("users",array("ID","name","age"));
	public function fetch_data_NOT_BUILDIN($table,$fields='*',$join='',$orderby=''){
		$this->connect();
		$fields = is_array($fields) ? implode(",", $fields) : $fields;
		# array("INNER JOIN 1","INNER JOIN 2")
		# "INNER JOIN 1 INNER JOIN 2"
		$join = is_array($join) ? implode(" ", $join) : $join;
		$orderby = is_array($orderby) ? implode(" ", $orderby) : $orderby;
		$sql = "SELECT ".$fields." FROM ".$table." ".$join." ".$orderby." ;";
		$result = $this->connect->query($sql);

		if($result->num_rows == 0){
			$result = "No result";
		}elseif($result->num_rows == 1){
			$result = $result->fetch_assoc(); 
		}else {
			$result = $result->fetch_all(MYSQLI_ASSOC);
		}

		mysqli_close($this->connect);
		return $result;
	}
	public function getData($table,$fields='*',$condition) {
		$this->connect();
		$sql='';
		$fields = is_array($fields) ? implode(",", $fields) : $fields;
		#WHERE user_id = 1 AND city = 'vienna'
		# array("ID"=>1,"name"=>"serri")
		# $sql = "ID=1 AND name='serri'"
		foreach ($condition as $key => $value) {
			if($sql != ''){
   				$sql .=" AND ";
  			}
  			if(is_numeric($value)){
  				$sql .= $key . "=" . $value ;
  			}else{
  				$sql .= $key . "='" . $value . "'";
  			}
 			
 		}
		$sql="SELECT ".$fields." FROM ".$table." WHERE ".$sql;
		$result = $this->connect->query($sql);

		if($result->num_rows == 0){
			echo "No result";
		}elseif($result->num_rows == 1){
			$result = $result->fetch_assoc(); 
		}else {
			$result = $result->fetch_all(MYSQLI_ASSOC);
		}
		mysqli_close($this->connect);
		return $result;
	}
	# UPDATE tableName SET ID = 2, name = "ghiath" WHERE ID = 2";
	# $set = array("name"=>'serri',"age"=>30)
	# " name ='serri',age=30  "
	public function update($table,$set,$condition) {
		$this->connect();
		$sql = '';
		$where= '';
		foreach ($set as $key => $value) {
			if($sql != ''){
   				$sql .=", ";
  			}
  			if(is_numeric($value)){
  				$sql .= $key . "=".$value." ";
  			}else {
  				$sql .= $key . "='".$value."' ";
  			}
		}
		foreach ($condition as $key => $value) {
			if($where != ''){
   				$where .=" AND ";
  			}
 			$where .= $key . "='" . $value . "'";
 		}
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$where.";";
		$this->connect->query($sql);
		mysqli_close($this->connect);
	}
	public function delete($table,$condition) {
		$this->connect();
		$sql='';
		foreach ($condition as $key => $value) {
			if($sql != ''){
   				$sql .=" AND ";
  			}
 			$sql .= $key . "='" . $value . "'";
 		}
		$sql="DELETE FROM ".$table." WHERE ".$sql;
		$result = $this->connect->query($sql);
		mysqli_close($this->connect);
	}
	public static function mediafields(){
		return array("id","title","img","author_id","ISBN","short_desc","publish_date","publisher_id","type","status");
	}
	public static function authorfields(){
		return array("id","name","surname");
	}
	public static function publisherfields(){
		return array("id","name","adress","size");
	}
}


$test = new Database;

$myName= "Acilio";
#$test->insert("example","name",$myName);
$rows = $test->fetch_data_NOT_BUILDIN("branch");

print_r($rows);

echo '<table border="1"><tr>';
foreach ($rows[0] as $key => $value) {
	echo '<th>'.$key."</th>";
}
echo '</tr>';
foreach ($rows as $value) {
	echo '<tr>';
	foreach ($value as $val) {
		echo "<td>".$val."</td>";
	}
	echo '</tr>';
}
echo '</table>';
// class name{
// 	public $name = "serri";
// 	public $age = 30;

// 	public function printName(){
// 		echo 'Hello, my name is '.$this->name .' and i am '.$this->age.' years old'; #this.name
// 	}	
// }

// $test = new name();
// echo $test->name."<br>";
// $test->printName();

$name = "serri";
if($name == "serri"){
	$status = "admin";
}else {
	$status = "user";
}
$status = ($name == "serri") ? "admin" : "user";
?>
