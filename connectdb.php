<?php
function connect_sql(){
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "cpsc3660_carsales";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->error){
		die("Error: " . $conn->error);
	}

	return $conn;
}
 ?>
