<head>
        <link rel="stylesheet" href="css/main-style.css">
</head>

<?php
	include 'connectdb.php';
	$conn = connect_sql();
	
	if (isset($_POST['sellCar_Confirm']))
	{

	$carID = $sellP = $downP = $financeAmt = $IntR = $date = "";
	$SalesID = NULL;

	$carID = mysqli_real_escape_string($conn, $_POST['holdCarID']);
	$sellP = mysqli_real_escape_string($conn, $_POST['holdsellP']);
	$downP = mysqli_real_escape_string($conn, $_POST['holdDownP']);
	$financeAmt = mysqli_real_escape_string($conn, $_POST['holdFin']);
	$IntR = mysqli_real_escape_string($conn, $_POST['holdInt']);
	$date = mysqli_real_escape_string($conn, $_POST['holdDate']);

	$sql = "INSERT INTO salestrans VALUES(NULL, '$carID', '$sellP', '$downP', '$financeAmt', '$IntR', '$date')";
	$retval = mysqli_query($conn, $sql);

	$sql = "DELETE FROM cars WHERE CarID = '$carID'";
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
	