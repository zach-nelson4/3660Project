<html>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

?>

	<head>
		<title>Sell Car</title>
	        <link rel="stylesheet" href="css/main-style.css">
	</head>

<body>
<center><h2>Sell Car</h2></center>
<br>


<form action="carSellingConfirm.php" method="post" style="overflow-x:auto;">
Date Sold: <input type="date" name ="dateSold" ><br>

<?php
	$sql = "SELECT CarID
		FROM CARS";
	$results = mysqli_query($conn, $sql);	
	echo "Car ID To Sell: <select name='CarID' onchange= \"showCarInfo(this.value)\" required>";
	echo "<option value=''>Select Car</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['CarID'] . ">" . $row ['CarID'] . "</option>";
	}
	echo "</select>";
	?>

	<br><br>
	Selling Price: <input type="number" name ="SellingP" ><br>
	Down Payment: <input type="number" name ="DownP"><br>
	Financed Amount: <input type="number" name="FinancedAmt"><br>
	Interest Rate: <input type="number" name="IntRate"><br>
<br>
<input type="submit" name="sellCar_submit">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>
