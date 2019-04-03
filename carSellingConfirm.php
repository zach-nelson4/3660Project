<head>
        <link rel="stylesheet" href="css/main-style.css">
</head>

<?php
	include 'connectdb.php';
	$conn = connect_sql();
	
	if (isset($_POST['sellCar_submit']))
	{

	$carID = $sellP = $downP = $financeAmt = $IntR = $date = "";
	$SalesID = NULL;

	$carID = mysqli_real_escape_string($conn, $_POST['CarID']);
	$sellP = mysqli_real_escape_string($conn, $_POST['SellingP']);
	$downP = mysqli_real_escape_string($conn, $_POST['DownP']);
	$financeAmt = mysqli_real_escape_string($conn, $_POST['FinancedAmt']);
	$IntR = mysqli_real_escape_string($conn, $_POST['IntRate']);
	$date = mysqli_real_escape_string($conn, $_POST['dateSold']);
	
	}

echo "<h2>Confirm Sale:</h2>";
echo "<br>";

echo "Car ID: " . $carID . "<br>";
echo "Car Model: "; 

	$sql = "SELECT ModName from cars WHERE (CarID = '$carID')";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)){
		echo $row['ModName']; 
		}

echo "<br>";
echo "Selling Price: " . $sellP . "<br>";
echo "Down Payment: " . $downP . "<br>";
echo "Finance Amount: " . $financeAmt . "<br>";
echo "Interest Rate: " . $IntR . "<br><br>";

mysqli_close($conn);

?>

<form method="post" action="carSellingSubmit.php">
<input type="hidden" name="holdDate" value="<?php echo "$date"?>">
<input type="hidden" name="holdCarID" value="<?php echo "$carID"?>">
<input type="hidden" name="holdsellP" value="<?php echo "$sellP"?>">
<input type="hidden" name="holdDownP" value="<?php echo "$downP"?>">
<input type="hidden" name="holdFin" value="<?php echo "$financeAmt"?>">
<input type="hidden" name="holdInt" value="<?php echo "$IntR"?>">

<input type="submit" value="Confirm" name="sellCar_Confirm">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'"/>
</html>