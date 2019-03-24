<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['cust_submit']))
	{
	$first_name = $last_name = $address = $city = $province = $phone = "";
	$custid = $zip = 0;

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$phone = mysqli_real_escape_string($conn, $_POST['zip_code']);
	$zip = mysqli_real_escape_string($conn, $_POST['phone_num']);
	$custid = mysqli_real_escape_string($conn, $_POST['CustID']);

	echo $first_name; 

	$sql = "INSERT INTO customer  VALUES('$custid', '$first_name', '$last_name', '$address', '$city', '$province', '$zip', '$phone')";

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
	
