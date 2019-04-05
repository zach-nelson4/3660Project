<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "css/main-style.css">
    </head> 

    <body>
        <br><center><h3> Results </h3></center><br>

        <table id = "tables">
            <tr>
                <th> Employee ID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Phone Number </th>
                <th> Commission </th>
                <th> Update Information</th>
            </tr>
<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['employee_search_submit']))
    {
        $empID = 0;
        $first_name = $last_name = "";

        $empID = mysqli_real_escape_string($conn, $_POST['empID']);
        $first_name = mysqli_real_escape_string($conn, $_POST['fName']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lName']);

        $sql = "SELECT * FROM employee WHERE ((EmpID = '$empID') OR (fName = '$first_name')
                OR (lName = '$last_name'))";

        $result = mysqli_query($conn, $sql);

        if(! $result)
        die('could not get data: ' .mysqli_error($conn));

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result))
            {
                $i = 0;
                $empIDtoEdit[$i] = ($row['EmpID']);
                echo "<form method='post' action='UpdateEmployee.php'>";
                echo "<input type='hidden' name='EmpID' value=$empIDtoEdit[$i]>";
                echo "<tr>"."<td>" . $row["EmpID"]. "</td>". 
                "<td>" . $row["fName"] . "</td>" . 
                "<td>" . $row["lName"] . "</td>" . 
                "<td>" . $row["Phone"] . "</td>" . 
                "<td>" . $row["Commission"] . "</td>" . 
                "<td>" . "<input type='submit' value='Edit' name='editEmp_submit'>" . "</form>" . "</td>" . 
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
<input type = "button" value = "Return Home" onclick = "window.location.href = 'Index.html'"/>

</html>


