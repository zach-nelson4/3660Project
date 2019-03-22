<?php
function connect_sql(){
	$conn = new mySql_connect($username,$password,$dbname)
	if ($conn->error){
		die("Error: " . $conn->error);
	}

	return $conn;
}
 ?>
