<!DOCTYPE html>
<html>
	<head>
	        <link rel="stylesheet" href="css/main-style.css">
	</head>

<center><h3>All Sales</h3></center><br>

<table id = "tables">
	<tr>
		<th>Transaction Number</th>
		<th>CarID Sold</th>
		<th>Selling Price</th>
		<th>Down Payment</th>
		<th>Financed Amount</th>
		<th>Interest Rate</th>
		<th>Transaction Date</th>
	</tr>
	<?php
	include 'connectdb.php';
	
	$conn = connect_sql();
	$sql = "SELECT * FROM salestrans";
	$retval = mysqli_query($conn, $sql);

	if (! $retval) 
	die ('could not get data: ' . mysqli_error($conn));

	if ( mysqli_num_rows($retval) > 0)
	{
    while ($row = mysqli_fetch_assoc($retval))
    {
		echo "<tr>"."<td>" . $row["SalesTransID"] . "</td>" .
		"<td>" . $row["CarID"] . "</td>" .
		"<td>" . $row["SellingP"] . "</td>" .
		"<td>" . $row["DownPmt"] . "</td>" .
		"<td>" . $row["FinancedAmt"] . "</td>" .
		"<td>" . $row["InterestRate"] . "</td>" .
		"<td>" . $row["transDate"] . "</td>" .
		"</tr>";
    }

	}
else {
    echo "0 results";
}

mysqli_close($conn);
?>
	</table>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

</html>
