<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['payment_submit']))
	{
	$cosigner= "";
	$amount = $date = $dueDate = $bankAcct = 0;
	$avgDaysLate = 0;

	$salesTrans = mysqli_real_escape_string($conn, $_POST['SalesTransID']);
	$custID = mysqli_real_escape_string($conn, $_POST['CustID']);
	$amount = mysqli_real_escape_string($conn, $_POST['amount']);
	$date = mysqli_real_escape_string($conn, $_POST['date']);
	$dueDate = mysqli_real_escape_string($conn, $_POST['dueDate']);
	$bankAcct = mysqli_real_escape_string($conn, $_POST['acct']);
	$cosigner = mysqli_real_escape_string($conn, $_POST['cosign']);

	$daysLate = round(abs(strtotime($date) - strtotime($dueDate))/86400); 
	
	$sql = "SELECT AVG(NoDaysLate) AS lateDays FROM payment WHERE (CustID = '$custID')";
	$retval = mysqli_query($conn, $sql);
	while($row = $retval->fetch_assoc()){
		$avgDaysLate = $row['lateDays'];
	}

	if($avgDaysLate == ''){
		$avgDaysLate = 0;
	}

	$sql = "SELECT COUNT(CustID) AS payNum FROM payment WHERE (CustID = '$custID')";
	$retval = mysqli_query($conn, $sql);
	while($row = $retval->fetch_assoc()){
		$payNum = $row['payNum'];
	}

	$sql = "INSERT INTO payment VALUES('$salesTrans', '$custID', '$payNum', '$amount', '$date', '$dueDate', '$daysLate', '$avgDaysLate', '$bankAcct', '$cosigner', NULL)";
	$retval = mysqli_query($conn, $sql);

	$sql = "UPDATE salestrans SET FinancedAmt = FinancedAmt - '$amount' WHERE SalesTransID = '$salesTrans'";
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
	
