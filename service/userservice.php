<?php
	require_once('../database/dataaccess.php');

	/*function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}*/

	function getreceiverdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `plasmareceiverreg` WHERE plasmareceiverdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getalldate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `plasmadonorreg` WHERE plasmadonationdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallplasmadonor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getallplasmareceiver(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmareceiverreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from registration where username='{$user['username']}' and password='{$user['password']}' and usertype='{$user['usertype']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		if(count($user) > 0 ){
			return true;
		}else{
			return false;
		}
	}

	function insert($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into registration values('{$user['name']}','{$user['username']}','{$user['email']}','{$user['password']}','{$user['dateofbirth']}','{$user['gender']}','{$user['bloodgroup']}','{$user['usertype']}' )";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	/*function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}*/
	function checkusername($username)
	{
		$conn = dbConnection();
		$sql = "select * from registration where username='{$username}'";
		if(mysqli_query($conn, $sql)){
			$result=mysqli_query($conn, $sql);
			$user = mysqli_fetch_assoc($result);
			if(empty($user)){
			return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}

	}

	//plasmadonor
	function insertplasmadonor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into plasmadonorreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['plasmadonationdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

		function insertplasmareceiver($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into plasmareceiverreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['plasmareceiverdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
	
	

?>