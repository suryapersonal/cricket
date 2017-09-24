<?php
function dbConnection() {
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$db = 'cricket';	
	$con = mysqli_connect($servername, $username, $password, $db);	
	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_errno());
	} 
	return $con;
}
?>