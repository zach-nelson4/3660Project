<?php
	include 'connectdb.php';
	
	$conn = connect_sql();
	if($conn)
	echo "Connected!";
	else
	echo "Critical Error!";

	mysqli_close($conn);

?>
