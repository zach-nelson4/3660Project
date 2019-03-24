<!DOCTYPE html>
<html>
	<head>
	        <link rel="stylesheet" href="css/main-style.css">
	</head>

<center><h3>Inventory</h3></center><br>

<table id = "tables">
	<tr>
		<th>CarID</th>
		<th>Model Name</th>
		<th>Year</th>
		<th>Edition</th>
		<th>Exterior Color</th>
		<th>Interior Color</th>
		<th>VIN #</th>
	</tr>
	<?php
	include 'connectdb.php';
	
	$conn = connect_sql();
	$sql = "SELECT * FROM cars";
	$retval = mysqli_query($conn, $sql);

	if (! $retval) 
	die ('could not get data: ' . mysqli_error($conn));

	if ( mysqli_num_rows($retval) > 0)
	{
    while ($row = mysqli_fetch_assoc($retval))
    {
		echo "<tr>"."<td>" . $row["CarID"] . "</td>" .
		"<td>" . $row["ModName"] . "</td>" .
		"<td>" . $row["Year"] . "</td>" .
		"<td>" . $row["EdName"] . "</td>" .
		"<td>" . $row["ExtCol"] . "</td>" .
		"<td>" . $row["IntCol"] . "</td>" .
		"<td>" . $row["VIN"] . "</td>" .
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
