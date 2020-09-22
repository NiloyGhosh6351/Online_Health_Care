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
function getappointdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `patientreg` WHERE appointdate='{$date}'";

		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
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

    function getbloodreceiverdate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `bloodreceiverreg` WHERE bloodreceiverdate='{$date}'";

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


    function getdonordate($date){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * FROM `blooddonorreg` WHERE blooddonationdate='{$date}'";

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


    function getallblooddonor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from blooddonorreg";
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



	function getallbloodreceiver(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from bloodreceiverreg";
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

			function getdoctor(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from doctorreg";
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


	//blooddonor
	function insertblooddonor($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into blooddonorreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['blooddonationdate']}','{$user['time']}')";
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
    function insertbloodreceiver($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into bloodreceiverreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['bloodreceiverdate']}','{$user['time']}')";
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

		$sql = "insert into patientreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['appointdate']}','{$user['time']}','{$user['doctorname']}')";
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

		$sql = "insert into doctorreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$user['degree']}')";
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


	function receiversearchdata($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from bloodreceiverreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function donorsearchdata($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from blooddonorreg where name like '%{$name}%'";
		$users = [];
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}



	//patient search
	function patientdatab($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg where name like '%{$name}%'";
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
	

?>