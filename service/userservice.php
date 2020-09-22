
<?php
	require_once('../database/dataaccess.php');
	//session_start();

	

	

	
	
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

	


		function getpatient($date,$id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from patientreg inner join appoint on patientreg.username=appoint.username where appointdate='{$date}' and doctorid={$id}";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
		}


	
	

		function insertpatient($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$username=$_SESSION['username'];
		$sql = "insert into patientreg values('','{$user['name']}','{$user['email']}','{$user['address']}','{$user['phone']}','{$user['gender']}','{$user['bloodgroup']}','{$username}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
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
				//return $sql2;
				$result2=mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$sql = "insert into appoint values('{$id}','{$username}','{$date}')";
					if(mysqli_query($conn, $sql))
					{
						return "Appointment Sucessful";
					}
					else
					{
						return false;
					}
				/*if($row2['username']!==$username)
				{
					
				}*/	
			}
			else
			{
				return "Select another date";
			}
			
	}


	//count patient
	function countpatient($id,$date)
	{
		$conn = dbConnection();

		if(!$conn)
		{
			echo "DB connection error";
		}
		//$username=$_SESSION['username'] ;
		$sql="select count(*) as 'total' from appoint where doctorid='{$id}' and appointdate='{$date}'";
		$result1=mysqli_query($conn,$sql);
		$row1 = mysqli_fetch_assoc($result1);
		return $row1['total'];
		//var_dump($row1);
		/*$parse1=(int)($row1['total']);
			if ($parse1<=2)
			{
				$sql2="select * from registration where username='{$username}'";
				//return $sql2;
				$result2=mysqli_query($conn,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				$sql = "insert into appoint values('{$id}','{$username}','{$date}')";
					if(mysqli_query($conn, $sql))
					{
						return "Appointment Sucessful";
					}
					else
					{
						return false;
					}
				/*if($row2['username']!==$username)
				{
					
				}	
			}
			else
			{
				return "Select another date";
			}*/
	}

?>