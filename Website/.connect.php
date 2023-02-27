<?php

//SQL connect
//Kristine
//connection


$server = 'localhost';
$user = 'readymedi';
$password = 'Duc44Cpuzf';
$database = 'readymedi';

$db = new mysqli($server, $user, $password, $database);

//check if connection fails
if (mysqli_connect_error()) {
	
	die("Database connection failed: " . mysqli_connect_error());
}
/*else{
	
	echo "success";
}*/
?>