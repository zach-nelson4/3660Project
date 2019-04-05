<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['cust_submit']))
	{
	$first_name = $last_name = $address = $city = $province = $phone = $zip = $dob = "";
	$gender = '';
	
	$first_name = mysqli_real_escape_string($conn, $_POST['fName']);
	$last_name = mysqli_real_escape_string($conn, $_POST['lName']);
	$address = mysqli_real_escape_string($conn, $_POST['streetName']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$zip = mysqli_real_escape_string($conn, $_POST['postCode']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	
	$sql = "INSERT INTO customer VALUES(NULL, '$first_name', '$last_name', '$address', '$city', '$province', '$zip', '$phone', '$dob', '$gender')";

	$retval = mysqli_query($conn, $sql);
	
	$url = "http://localhost/3660Project/EmpHistory.html";
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
	
