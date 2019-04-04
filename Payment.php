<html>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

?>

<head>
		<title>Make Payment</title>
	        <link rel="stylesheet" href="css/main-style.css">
</head>


<body>
<center><h2>Make Payment</h2></center>
<br>

<form action="makePayment.php" method="post" style="overflow-x:auto;">

<?php
	$sql = "SELECT SalesTransID
		FROM salestrans";
	$results = mysqli_query($conn, $sql);	
	echo "Sales Transaction ID of Purchase: <select name='SalesTransID' onchange= \"showTransInfo(this.value)\" required>";
	echo "<option value=''>Select Sales Transaction Number</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['SalesTransID'] . ">" . $row ['SalesTransID'] . "</option>";
	}
	echo "</select>";
	?>
<br><br>
<?php
	$sql = "SELECT CustID
		FROM customer";
	$results = mysqli_query($conn, $sql);	
	echo "Customer ID: <select name='CustID' onchange= \"showCustInfo(this.value)\" required>";
	echo "<option value=''>Select Customer ID</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['CustID'] . ">" . $row ['CustID'] . "</option>";
	}
	echo "</select>";
	?>

	<br><br>
	Amount to pay: <input type="number" name ="amount" ><br>
	Date of Payment: <input type="date" name ="date"><br>
	Due Date of Payment: <input type="date" name="dueDate"><br><br>
	Bank Account: <input type="int" name ="acct" ><br><br>
	Cosigner: <input type="string" name ="cosign" ><br>

<br>
<input type="submit" name="payment_submit">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>

