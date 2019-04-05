<html>
    <head>
        <title> Update Employee Information </title>
        <link rel="stylesheet" href="css/main-style.css">
    </head>

   <body>
    <center><h2>Update Employee Information</h2></center>
    <br><br>
    Please enter the new information: 
    <br><br>
    <?php
	include 'connectdb.php';
    $conn = connect_sql();
    
	if (isset($_POST['editEmp_submit']))
	{
    $empID = 0;
    $fname = $lname= $phone ="";
    $commission = 0.0;

    $empID = mysqli_real_escape_string($conn, $_POST['EmpID']);

    $sql = "SELECT * FROM employee WHERE (EmpID = '$empID')";

        $result = mysqli_query($conn, $sql);

        if(! $result)
        die('could not get data: ' .mysqli_error($conn));

            while($row = mysqli_fetch_assoc($result))
            {
                $fname = $row['fName'];
                $lname = $row['lName'];
                $phone = $row['Phone'];
                $commission = $row['Commission'];
            } 
    }

	echo "Employee ID: " . $empID; 
    echo "<form action='eUpdateSubmit.php' method='post' style='overflow-x:auot;'>";
    echo "First Name: <input type='string' name='fn' value=$fname><br><br>";
	echo "Last Name: <input type='string' name='ln' value=$lname><br><br>";
	echo "Phone Number: <input type='string' name='phone_num' value=$phone><br><br>";
    echo "<input type='hidden' name='Commission' value= $commission>";
    echo "<input type='hidden' name='EmpID' value= $empID>";
?>   

   <br><br>
   <input type="submit" name="update_emp_submit">
   </form>

   <br><br>
   <input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

   </body>
</html>
