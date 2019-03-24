<html>
    <head>
        <title> Selecting Data from Table Cars </title>
</head>

<body>
    <h3> Test </h3>
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
        echo "CarID: " . $row["CarID"]. "<br>";
    }

}
else {
    echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>