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
	//	$conn = new PDO('mysql：host ='$host'; dbname ='$db';charset = UTF8', $user，$pass，array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		//mysqli_query($db,"SET NAMES utf8");
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
			
			$host = "localhost";
			$user = "pos";
	 		$pass = "5fCaRQ5HKDnsYSrR";
	 		$database = "pos";
	 		

			$conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$result = mysqli_query($this->conn,$query);
		$conn->exec($query);

		if ($conn)
		    {
		        return "1";

		    }
			else {return "0"; }


		/*

		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
		*/

	}
	
	function insertQuery($query) {
			$host = "localhost";
			$user = "pos";
	 		$pass = "5fCaRQ5HKDnsYSrR";
	 		$database = "pos";
	 		

			$conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$result = mysqli_query($this->conn,$query);
		$conn->exec($query);

		if ($conn)
		    {
		        return "1";

		    }
			else {return "0"; }


		/*if (!$conn) {
			die('Invalid dquery: ' . mysql_error());
		} else {
			return $result;
		}*/
	}
	
	
}
?>