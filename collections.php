<html>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

?>

	<head>
		<title>Send To Collections</title>
	        <link rel="stylesheet" href="css/main-style.css">
	</head>

<body>
<center><h2>Send To Collections</h2></center>
<br>


<form action="collectionsStatus.php" method="post" style="overflow-x:auto;">

<?php
	$sql = "SELECT SalesTransID
		FROM salestrans";
	$results = mysqli_query($conn, $sql);	
	echo "Sales ID of Car: <select name='SalesTransID' onchange= \"showTransInfo(this.value)\" required>";
	echo "<option value=''>Sales ID</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['SalesTransID'] . ">" . $row ['SalesTransID'] . "</option>";
	}
	echo "</select>";
?>
<br>

Car ID: <input type="int" name ="carID" ><br>

<?php
	$sql = "SELECT CustID
		FROM customer";
	$results = mysqli_query($conn, $sql);	
	echo "Customer ID: <select name='CustID' onchange= \"showCustInfo(this.value)\" required>";
	echo "<option value=''>Customer ID</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['CustID'] . ">" . $row ['CustID'] . "</option>";
	}
	echo "</select>";
?>
<br>

<input type="submit" name="collections_submit">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>


