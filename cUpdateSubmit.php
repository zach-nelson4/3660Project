<?php
    include 'connectdb.php';
    $conn = connect_sql();
    if (isset($_POST['update_cust_submit']))
    {
    $first_name = $last_name = $Dob = $gender = $address = $city = $province = $postalCode = $phone = "";
	$custID = 0;

	$custID = mysqli_real_escape_string($conn, $_POST['custID']);
	$first_name = mysqli_real_escape_string($conn, $_POST['fName']);
	$last_name = mysqli_real_escape_string($conn, $_POST['lName']);
	$Dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$address = mysqli_real_escape_string($conn, $_POST['streetName']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$postalCode = mysqli_real_escape_string($conn, $_POST['postCode']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);

    
    	$sql = "UPDATE customer 
            SET fName = '$first_name', lName = '$last_name', streetName = '$address', city = '$city', province = '$province', postCode = '$postalCode', phone = '$phone', DOB = '$Dob', gender = '$gender'  WHERE (CustID = '$custID')";
	$retval = mysqli_query($conn, $sql);

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
	
   
>>>>>>> 9092e5993983e4fb16a16580b9ea2c4180c20d3a
