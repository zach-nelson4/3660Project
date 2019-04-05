<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main-style.css">
	</head>	

<body>
<br><center><h3>Results</h3></center><br>

<table id = "tables">
	<tr>
		<th>Customer ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Street Name</th>
		<th>City</th>
		<th>Province</th>
		<th>Postal Code</th>
		<th>Phone Number</th>
	</tr>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['customer_search_submit']))
	{
	$first_name = $last_name = "";
	$cust_id = 0;

	$cust_id = mysqli_real_escape_string($conn, $_POST['CustID']);
	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);

	$custIDtoEdit = [];
	$i = 0;

	$sql = "SELECT * FROM customer WHERE((CustID = '$cust_id') OR (fName = '$first_name')
			OR (lName = '$last_name'))";	
			
	$result = mysqli_query($conn, $sql);

	if (! $result) 
	die ('could not get data: ' . mysqli_error($conn));

	if( mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result))
		{
			$custIDtoEdit.push($row['CustID']);
			echo "<form method='post' action='UpdateCustomer.php'>";
			echo "<input type='hidden' name='carID' value= $custIDtoEdit[i]";
			echo "<tr>"."<td>" . $row["CustID"] . "</td>" .
			"<td>" . $row["fName"] . "</td>" .
			"<td>" . $row["lName"] . "</td>" .		
			"<td>" . $row["streetName"] . "</td>" .
			"<td>" . $row["city"] . "</td>" .
			"<td>" . $row["province"] . "</td>" .
			"<td>" . $row["postCode"] . "</td>" .
			"<td>" . $row["phone"] . "</td>" .
			"<td>  <input type='submit' value='Edit' name='editCust_submit'>
</form> </td>";
			"</tr>";
			$i = ($i+1);
			
		}
	 } else {
			echo "0 Results";
		}
	}
		mysqli_close($conn);

?>
</table>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

</html>




