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

	

?>