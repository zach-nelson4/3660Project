<?php
function connect_sql(){
	$conn = new mysqli("127.0.0.1", "root", " ", "cpsc3660_carsales");
	if ($conn->error){
		die("Error: " . $conn->error);
	}

	return $conn;
}
 ?>
