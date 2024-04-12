<?php
	class MyDb
	{
		var $conn;
		function __construct()
		{
			$this->conn = new mysqli("localhost","root","","db_blood");
			if($this->conn->connect_error)
			{
				die("Connection Failed" . $this->conn->connect_error);
			}
		}
		function registerData($fullname,$email,$password,$blood_group)
		{
			$qry = "INSERT INTO tblregistration(full_name, email,password, blood_group) VALUES(?,?,?,?)";
			$stmt = $this->conn->prepare($qry);
			$stmt->bind_param("ssss",$fullname,$email,$password,$blood_group);
			$cnt = $stmt->execute();
			return $cnt;
		}

		function selectData()
		{
			$qry = "SELECT * FROM tblregistration";
			$stmt = $this->conn->prepare($qry);
			$stmt->execute();
			$resultSet = $stmt->get_result();
			$data = $resultSet->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
	}
 ?>