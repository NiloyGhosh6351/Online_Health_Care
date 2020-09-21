<?php
	require_once('../database/dataaccess.php');
	//session_start();

	function getplasmadonorid($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}



	function getcovidtestingdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `covidreg` WHERE covidtestingdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

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

	function getcovidtesting(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from covidreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		}

	function getallpatient(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function getdoctor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from doctorreg inner join registration on doctorreg.username=registration.username";
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

	//doctoradd
	function insertdoctorreg($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into registration values('{$user['name']}','{$user['username']}','{$user['email']}','{$user['password']}','{$user['dateofbirth']}','{$user['gender']}','{$user['bloodgroup']}','Doctor' )";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	//update
	function updateplasmadonor($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update plasmadonorreg set name='{$user['name']}', email='{$user['email']}', address='{$user['address']}', phone='{$user['phone']}', gender='{$user['gender']}', bloodgroup='{$user['bloodgroup']}', plasmadonationdate='{$user['plasmadonationdate']}', time='{$user['time']}' where name='{$user['name']}'";
		$result=mysqli_query($conn, $sql);
		//$user=mysqli_fetch_assoc($result);
		if($result){
			return true;
		}else{
			return false;
		}
	}
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


	function insertcovidtesting($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into covidreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['covidtestingdate']}','{$user['time']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


		function insertpatient($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into patientreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


		function insertdoctor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into doctorreg values('','{$user['address']}','{$user['phone']}','{$user['degree']}','{$user['username']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	//search
	function searchdatab($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmareceiverreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function searchdatacovid($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from covidreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}


	
	function searchdataplasmadonor($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from plasmadonorreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	function searchdatadoctor($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from doctorreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	//count
	function countblood(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT COUNT(bloodgroup) as 'totalblood',bloodgroup FROM plasmareceiverreg GROUP BY bloodgroup";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}
	//appoint
	function appointdoctor($id,$date)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		$username=$_SESSION['username'] ;
		$sql1="select count(*) as 'total' from appoint where doctorid='{$id}' and appointdate='{$date}'";
		$result1=mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$parse1=(int)($row1['total']);
			if ($parse1<=2)
			{
				$sql2="select * from registration where username='{$username}'";
				$result2=mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				if(!$username=$row2)
				{
					$sql = "insert into appoint values('{$id}','{$username}','{$date}')";
					if(mysqli_query($conn, $sql))
					{
						return "Appointment Sucessful";
						return true;
					}
					else
					{
						return false;
					}
				}	
			}
			else
			{
				return "Select another date";
			}
			
	}

?>