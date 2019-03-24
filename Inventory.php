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
	
	$sql = "SELECT *
		FROM cars
	$result = mysql_query($sql);

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr>"."<td>" . $row["CarID"] . "</td>" .
			"<td>" . $row["ModName"] . "</td>" .
			"<td>" . $row["Year"] . "</td>" .
			"<td>" . $row["EdName"] . "</td>" .
			"<td>" . $row["ExtCol"] . "</td>" .
			"<td>" . $row["IntCol"] . "</td>" .
			"<td>" . $row["VIN"] . "</td>" .
			"</tr>";
			}
		} else {
			echo "0 Results";
		}
		$conn->close();
    ?>

</table>

<br>
<input type="button" value="Search Cars" onclick="window.location.href='blank.html'" />
<br><br>
<input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

</html>
