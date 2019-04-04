<head>
        <link rel="stylesheet" href="css/main-style.css">
</head>

<?php
	include 'connectdb.php';
	$conn = connect_sql();
	
	if (isset($_POST['collections_submit']))
	{

	
	$SalesID = $carID = $custID = NULL;
	$avgDaysLate = 0;

	$SalesTransID = mysqli_real_escape_string($conn, $_POST['SalesTransID']);
	$CarID = mysqli_real_escape_string($conn, $_POST['carID']);
	$CustID = mysqli_real_escape_string($conn, $_POST['CustID']);

	$sql = "SELECT MAX(AvgDaysLate) AS lateDays FROM payment WHERE (SalesTransID = '$SalesTransID')"
	while($row = $retval->fetch_assoc()){
		$avgDaysLate = $row['lateDays'];
	}

	if($avgDaysLate <= 30){
		echo 'Customer has an average of ' . $avgDaysLate . ' days late. Customer must have an average of 30 days late before we can send to collections.'; 
	}
	else if($avgDaysLate > 30){
		echo 'Customer has an average of ' . $avgDaysLate . ' days late. Due to this average amount of days late, we are sending to collections now';

	$sql = "UPDATE financedAmt SET FinancedAmt = 0 WHERE SalesTransID = '$SalesTransID'";
	$retval = mysqli_query($conn, $sql);

	}

	
	
	mysqli_close($conn);
}
	
?>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>


	
