<?php 

class Database
{
	
		private $host = "localhost";
		private $username = "root";
		private $password = "";
		private $database = "php_rest_api";
		private $conn = true;
		private $mysqli = "";
		private $result = array();
		
	public function __construct()
	{
		

		if($this->conn)
		{
			$this->mysqli = new mysqli($this->host,$this->username,$this->password,$this->database);
			
			if($this->mysqli->connect_error)
			{
				array_push($result, $this->mysqli->connect_error);
				return false;
			}
			else{
				//echo "Database Connected..";
				return true;
			}
		}

	}

	//Insert function method

	public function insert($table ,$param = array())
	{
		
		if($this->tableExists($table)){
			//print_r($param);
			$table_colums = implode(', ', array_keys($param));
			$table_value = implode("', '", $param);

			$sql = "INSERT INTO $table ($table_colums) VALUES ('$table_value')";
			echo $sql;
			if($this->mysqli->query($sql))
			{
				array_push($this->result,$this->mysqli->insert_id);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}
		}else{
			return  false;
		}
	}

	//Update function method

	public function update($table,$param=array(),$where = null)
	{
		if($this->tableExists($table))
		{
			$args = array();
			foreach ($param as $key => $value) {
				$args[] = "$key = '$value'";
			}
			$sql = "UPDATE $table SET " .implode(', ',$args);
			if($where !=null)
			{
				$sql .= " WHERE $where";
			}
			//echo $sql;
			if($this->mysqli->query($sql))
			{
					array_push($this->result,$this->mysqli->affected_rows);
					return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}
		}else{
			return false;
		}
	}

	//Delete function method

	public function delete($table , $where = null)
	{
		if($this->tableExists($table))
		{
			$sql = "DELETE FROM $table";
			if($where !=null)
			{
				$sql .= " WHERE $where";
			}
			//echo $sql;
			if($this->mysqli->query($sql))
			{
				array_push($this->result,$this->mysqli->affected_rows);
				return true;
			}else{
				array_push($this->result,$this->mysqli->error);
				return false;
			}
		}else{
			return false;
		}
	}

	//Select function method

	//Raw sql select command

	public function sql ($sql)
	{
		//$this->mysqli - this is object
		$query = $this->mysqli->query($sql);

		if($query)
		{
			$this->result = $query->fetch_all(MYSQLI_ASSOC);
			return true;
		}
		else{
			array_push($this->result,$this->mysqli_error);
			return false;
		}
	}


	//Results method 

	public function get_results()
	{
		$val = $this->result;
		$this->result = array();
		return $val;
	}

	//Check table exist

	private function tableExists($table)
	{
		$sql = "SHOW TABLES FROM $this->database LIKE '$table'";
		$tableInDB = $this->mysqli->query($sql);
		if($tableInDB){
			if($tableInDB->num_rows == 1)
			{
				return true;
			}else{
				array_push($this->result,$table."Does not exits in this database");
				return false;
			}
		}

	}

	public function __destruct()
	{
		if($this->conn)
		{
			if($this->mysqli->close())
			{
				$this->conn = false;
				return true;
			}else{
				return false;
			}
		}
	}




}



?>