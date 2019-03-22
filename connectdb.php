<?php
function connect_sql(){
	$conn = new mySql_connect(root, ,cpsc3660_carsales)
	if ($conn->error){
		die("Error: " . $conn->error);
	}

	return $conn;
}
 ?>
