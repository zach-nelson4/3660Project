<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['emp_submit']))
	{
	$first_name = $last_name = $phone = "";
	$commis = 0.0;

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone_num']);
	
	$sql = "INSERT INTO employee VALUES(NULL, '$first_name', '$last_name', '$phone', '$commis')";

	$retval = mysqli_query($conn, $sql);
	
	$url = "http://localhost/3660Project/Index.html";
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
	
