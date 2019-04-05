<html>
    <head>
        <title> Update Customer Information </title>
        <link rel="stylesheet" href="css/main-style.css">
    </head>

<?php
	include 'connectdb.php';
	$conn = connect_sql();

	if (isset($_POST['editCust_submit']))
	{
	$custID = 0;
	$fName = $lName = $Dob = $gender = $add = $city = $prov = $postCode = $phone = "";

	$custID = mysqli_real_escape_string($conn, $_POST['CustID']);

    	$sql = "SELECT * FROM customer WHERE (CustID = '$custID')";
        $result = mysqli_query($conn, $sql);
        if(! $result)
        die('could not get data: ' .mysqli_error($conn));
            while($row = mysqli_fetch_assoc($result))
            {
                $fName = $row['fName'];
                $lName = $row['lName'];
     		$Dob = $row['DOB'];
                $gender = $row['gender'];
     		$add = $row['streetName'];
                $city = $row['city'];
     		$prov = $row['province'];
                $postCode = $row['postCode'];
   		$phone = $row['phone'];

            } 
    	

	

   echo "<body>";
   echo "<center><h2>Update Customer Information</h2></center>";
   echo "<br><br>";
   echo "Please enter the new information: ";
   echo "<br><br>";
	echo "Customer ID: " . $custID;
    echo "<form action='cUpdateSubmit.php' method='post' style='overflow-x:auto;'>";
    echo "First Name: <input type='string' name='fName' value=$fName ><br><br>";
    echo    "Last Name: <input type='string' name='lName' value = $lName><br><br>";
    echo    "Date of birth: <input type='string' name='dob' value=$Dob><br><br>";
    echo    "Gender: <input type ='string' name = 'gender' maxlength = '1' value=$gender> <br><br>";
    echo    "Address: <input type='string' name='streetName'value=$add ><br><br>";
    echo    "City: <input type='string' name='city' value=$city ><br><br>";
    echo    "Province: <input type='string' name='province' value=$prov ><br><br>";
    echo    "Postal Code: <input type='string' name='postCode' value=$postCode><br><br>";
    echo   "Phone Number: <input type='string' name='phone' value=$phone ><br><br>";
	echo	"<input type='hidden' name='custID' value= $custID>";
        }
?>
        <br><br>
        <input type="submit" name="update_cust_submit">
        </form>

        <br><br>
        <input type="button" value="Return Home" onclick="window.location.href='Index.html'" />

    </body>
</html>



</html>
