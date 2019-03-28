<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['emp_submit']))
	{
	$first_name = $last_name = $phone = $salesID = $empID = "";
	$commis = 0;

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone_num']);
	$empID = mysqli_real_escape_string($conn, $_POST['emp_id']);
	$commis = mysqli_real_escape_string($conn, $_POST['commission']);


	$sql = "INSERT INTO employee VALUES('$empID', '$first_name', '$last_name', '$phone', '$commis')";

	echo $sql;

	$retval = mysqli_query($conn, $sql);
	
	echo $retval;

	$url = "http://localhost/3660Project/index.html";
	if($retval){
		header("Location: $url");
	exit;
	} else {
		echo "Error.";
		die();
	}
	
	mysqli_close($conn);
}
	
?>
	
