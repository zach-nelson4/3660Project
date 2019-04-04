<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/main-style.css">
    </head>

    <body>
    <br><center><h3>Results</h3></center><br>

    <table id = "tables">
        <tr>
            <th>Car ID</th>
            <th>New or Used</th>
            <th>Model</th>
            <th>Edition</th>
            <th>Year</th>
            <th>Interior Colour</th>
            <th>Exterior Colour</th>
            <th>VIN</th>
        </tr>

<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['car_search_submit']))
    {
        $carID = $year = 0;
        $new_or_used = $model = $edition = $intCol = $extCol = $VIN = "";

        $carID = mysqli_real_escape_string($conn, $_POST['CarID']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $new_or_used = mysqli_real_escape_string($conn, $_POST['New_or_Used']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $edition = mysqli_real_escape_string($conn, $_POST['edition']);
        $intCol = mysqli_real_escape_string($conn, $_POST['IntCol']);
        $extCol = mysqli_real_escape_string($conn, $_POST['ExtCol']);
        $VIN = mysqli_real_escape_string($conn, $_POST['VIN']);

        $sql = "SELECT * FROM cars WHERE((CarID = '$carID') OR (New_or_Used = '$new_or_used') OR (ModName = '$model') 
                OR (EdName = '$edition') OR (Year = '$year') OR (IntCol = '$intCol') OR (ExtCol = '$extCol') OR (VIN = '$VIN'))";

        $result = mysqli_query($conn, $sql);

        if (!$result)
        die('Could not get data: ' . mysqli_error($conn));

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>"."<td>" . $row["CarID"] . "</td>" . 
                "<td>" . $row["New_or_Used"] . "</td>" . 
                "<td>" . $row["ModName"] . "</td>" . 
                "<td>" . $row["EdName"] . "</td>" . 
                "<td>" . $row["Year"] . "</td>" . 
                "<td>" . $row["IntCol"] . "</td>" . 
                "<td>" . $row["ExtCol"] . "</td>" . 
                "<td>" . $row["VIN"] . "</td>" . 
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