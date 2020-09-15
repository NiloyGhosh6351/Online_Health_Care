<?php
	require_once('../php/sessionheader.php');
	require_once('../service/userservice.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Plasma Donor</title>
	<link rel="stylesheet" href="../css/plasmadonor.css">

	<script type="text/javascript" src="../js/plasmadonor.js"></script>
</head>
<body>
	<nav class="nav">
		
		<ul class="menu">
			<li class="menu_item"><a href="plasmadonorhome.php">Home</a></li>
			
			<li class="menu_item"><a href="plasmadonor.php">Plasma Donor</a></li>
		
			<li class="menu_item"><a href="#">Conversation</a></li>
		</ul>
	</nav>

<br><br>

<input type="text" name="">
<input type="button" name="" value="Search"><br><br>

<h3>Plasma Donor list</h3><br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Address</td>
			<td>Phone</td>
			<td>Gender</td>
			<td>Blood Group</td>
			<td>Plasmadonation Date</td>
			<td>Time</td>
		</tr>

		<?php  
			$users = getallplasmadonor();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['address']?></td>
			<td><?=$users[$i]['phone']?></td>
			<td><?=$users[$i]['gender']?></td>
			<td><?=$users[$i]['bloodgroup']?></td>
			<td><?=$users[$i]['plasmadonationdate']?></td>
			<td><?=$users[$i]['time']?></td>
			<!--<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>-->
		</tr>

		<?php } ?>
		
	</table>
		
</body>
</html>