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
Date Sold: <input type="date" name ="dateSold" required><br>

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
	Selling Price: <input type="number" name ="SellingP" step = 0.01 required><br>
	Down Payment: <input type="number" name ="DownP"  step = 0.01 required><br>
	Interest Rate: <input type="number" name="IntRate" step = 0.01 required><br><br>


	<h3>Employee Information:</h3>
	<br>

<?php
	$sql = "SELECT EmpID FROM employee";
	$results = mysqli_query($conn, $sql);

	echo "Employee ID: <select name='EmpID' onchange= \"showEmployeeInfo(this.value)\" required>";
	echo "<option value=''>Select Employee</option>";

	while($row = $results->fetch_assoc())
	{
		echo "<option value=" .$row['EmpID'] . ">" . $row ['EmpID'] . "</option>";
	}
	echo "</select>";
	?>

	<br>
	Commission Percentage: <input type="number" name ="Commis" required><br>
	<br>

<br>
<input type="submit" name="sellCar_submit">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>
