<?php
	include 'connectdb.php';
	$conn = connect_sql();
	
	if (isset($_POST['sellCar_submit']))
	{

<form action="carSellingSubmit.php" method="post" style="overflow-x:auto;">

	$carID = $sellP = $downP = $financeAmt = $IntR = "";
	$SalesID = NULL;

	$carID = mysqli_real_escape_string($conn, $_POST['CarID']);
	$sellP = mysqli_real_escape_string($conn, $_POST['SellingP']);
	$downP = mysqli_real_escape_string($conn, $_POST['DownP']);
	$financeAmt = mysqli_real_escape_string($conn, $_POST['FinancedAmt']);
	$IntR = mysqli_real_escape_string($conn, $_POST['IntRate']);

	//$sql = "INSERT INTO salestrans VALUES('$SalesID','$carID','$sellP','$downP','$financeAmt' 
?>

<html>

<h2>Confirm Sale:</h2>
<br>
Car ID: $carID <br>
Car Model: 
<?php
	$sql = "SELECT CarID from cars WHERE (CarID = '$carID')";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result))
   	 {
		echo $row["CarID"]; 
?><br>
Selling Price: '$sellP' <br>
Down Payment: '$downP' <br>
Finance Amount: '$financeAmt' <br>
Interest Rate: '$IntR' <br><br>

<input type="submit" name="sellCar_Confirm">
</form>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />
</html>
