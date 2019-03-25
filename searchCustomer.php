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

	if (isset($_POST['search_submit']))
	{
	$first_name = $last_name = "";

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_String($conn, $_POST['ln']);

	$sql = "SELECT * FROM customer WHERE (fName = '$first_name')
			AND (lName = '$last_name')";		

	$result = mysqli_query($conn, $sql);

	if (! $result) 
	die ('could not get data: ' . mysqli_error($conn));

	if( mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>"."<td>" . $row["custID"] . "</td>" .
			"<td>" . $row["fName"] . "</td>" .
			"<td>" . $row["lName"] . "</td>" .		
			"<td>" . $row["streetName"] . "</td>" .
			"<td>" . $row["city"] . "</td>" .
			"<td>" . $row["province"] . "</td>" .
			"<td>" . $row["postCode"] . "</td>" .
			"<td>" . $row["phone"] . "</td>" .
			"</tr>";
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




