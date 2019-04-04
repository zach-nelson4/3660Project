<!DOCTYPE html>
<html>
	<head>
	        <link rel="stylesheet" href="css/main-style.css">
	</head>

<center><h3>All Payments</h3></center><br>

<table id = "tables">
	<tr>
		<th>Transaction Number</th>
		<th>Customer ID</th>
		<th>Payment Number</th>
		<th>Amount Paid</th>
		<th>Date of Payment</th>
		<th>Due Date</th>
		<th>Number of days late</th>
		<th>Average days late</th>
		<th>Bank Account #</th>
		<th>Cosigner</th>
		<th>Payment ID</th>
	</tr>
	<?php
	include 'connectdb.php';
	
	$conn = connect_sql();
	$sql = "SELECT * FROM payment";
	$retval = mysqli_query($conn, $sql);

	if (! $retval) 
	die ('could not get data: ' . mysqli_error($conn));

	if ( mysqli_num_rows($retval) > 0)
	{
    while ($row = mysqli_fetch_assoc($retval))
    {
		echo "<tr>"."<td>" . $row["SalesTransID"] . "</td>" .
		"<td>" . $row["CustID"] . "</td>" .
		"<td>" . $row["NumPmt"] . "</td>" .
		"<td>" . $row["Amount"] . "</td>" .
		"<td>" . $row["StartDate"] . "</td>" .
		"<td>" . $row["DueDate"] . "</td>" .
		"<td>" . $row["NoDaysLate"] . "</td>" .
		"<td>" . $row["AvgDaysLate"] . "</td>" .
		"<td>" . $row["BankAcct"] . "</td>" .
		"<td>" . $row["Cosigner"] . "</td>" .
		"<td>" . $row["PmtID"] . "</td>" .
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
