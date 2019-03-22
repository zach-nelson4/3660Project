<?php
	include 'connectdb.php';
	
	$conn = OpenCon();
	
	echo "Connected!";

	CloseCon($conn);

?>
