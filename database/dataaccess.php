<?php


$host='127.0.0.1';
$uname='root';
$password='';
$name1='webtech';

function dbConnection()
{
	global $host;
	global $uname;
	global $password;
	global $name1;

	return mysqli_connect($host,$uname, '', $name1);
}


?>