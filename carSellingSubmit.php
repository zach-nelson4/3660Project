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
	$IntR = mysqli_real_escape_string($conn, $_POST['holdInt']);
	$date = mysqli_real_escape_string($conn, $_POST['holdDate']);
	$commis = mysqli_real_escape_string($conn, $_POST['Commis']);
	$empID = mysqli_real_escape_string($conn, $_POST['empID']);
	$warranty = mysqli_real_escape_string($conn, $_POST['warranty']);
	$deduct = mysqli_real_escape_string($conn, $_POST['Deduct']);
	$durat = mysqli_real_escape_string($conn, $_POST['Durat']);
	$totalC = mysqli_real_escape_string($conn, $_POST['TotalC']);
	$monthC = mysqli_real_escape_string($conn, $_POST['MonthC']);

	$sql = "INSERT INTO salestrans VALUES(NULL, '$carID', '$sellP', '$downP', ('$sellP'-'$downP'), '$IntR', '$date')";
	$retval = mysqli_query($conn, $sql);

	$sql = "DELETE FROM cars WHERE CarID = '$carID'";
	$retval = mysqli_query($conn, $sql);

	$sql = "UPDATE employee SET Commission = Commission + '$commis' WHERE EmpID = '$empID'";
	$retval = mysqli_query($conn, $sql);

	$sql = "SELECT SalesTransID from salestrans WHERE (CarID = '$carID')";
	$retval = mysqli_query($conn, $sql);
	while($row = $retval->fetch_assoc()){
		$salesID = $row['SalesTransID'];
	}

	echo $salesID;
	echo $warranty;
	echo $deduct;
	echo $date;
	echo $carID;
	echo $durat;
	echo $totalC;
	echo $monthC;

	$sql = "INSERT INTO warranty VALUES('$salesID','$warranty','$deduct','$date','$carID','$durat','$totalC','$monthC',NULL)";
	echo $sql;
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
	