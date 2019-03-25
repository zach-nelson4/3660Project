<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main-style.css">
	</head>	

<body>
<br><h3>Results</h3><br>

<table id = "Customer Search Results">
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

	$sql = "SELECT FName, LName FROM customer
		where FName = $first_name AND Lname = $last_name";

	$result = mysqli_query($sql);


	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr>"."<td>" . $row["CustID"] . </td>" .
			"<td>" . $row["FName"] . "</td>" .
			"<td>" . $row["LName"] . "</td>" .		
			"<td>" . $row["StreetName"] . "</td>" .
			"<td>" . $row["City"] . "</td>" .
			"<td>" . $row["Province"] . "</td>" .
			"<td>" . $row["postCode"] . "</td>" .
			"<td>" . $row["phone"] . "</td>" .
			"</tr">;
			}
		} else {
			echo "0 Results";
		}

		mysqli_close($conn);
?>

<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

</html>




