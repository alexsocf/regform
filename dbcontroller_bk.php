<?php
class DBController {
	private $host = "localhost";
	private $user = "pos";
	private $password = "5fCaRQ5HKDnsYSrR";
	private $database = "pos";
	private $conn;

	function __construct() {
	    
		$this->conn = $this->connectDB();
	
	}
	



	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$mysqli_query($db,"SET NAMES utf8");
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		mysql_query("set names 'utf8' ");  
		mysql_query("set character_set_client=utf8");  
		mysql_query("set character_set_results=utf8");  
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query - insert: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	
}
?>