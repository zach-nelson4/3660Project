<?php
	include 'connectdb.php';
	
	//$conn = OpenCon();
	
	echo "Connected!";

	$stdid = mysql_parse($conn, "select CarID from cars");
	mysql_execute($stdid, MYSQL_DEFAULT);

	while($res = mysql_fetch_row($stdid)){
		echo "Car ID is" res[0] ".\n";
	}

	mysql_close($conn);
	//CloseCon($conn);

?>
