<?php

    include 'connectdb.php';
    $conn = connect_sql();
    if (isset($_POST['update_emp_submit']))
    {
    $first_name = $last_name = $phone = "";
    $commission = 0.0;
    $empID = 0;

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $empID = mysqli_real_escape_string($conn, $_POST['EmpID']);
    $commission = mysqli_real_escape_string($conn, $_POST['Commission']);
    
    $sql = "UPDATE employee 
            SET fName = '$first_name', lName = '$last_name', Phone = '$phone', Commission = '$commission'
            WHERE (EmpID = '$empID')";

    $retval = mysqli_query($conn, $sql);
	
    $url = "http://localhost/3660Project/Index.html";
    if($retval){
        header("Location: $url");
        exit;
    } else {
        echo "Error.";
        die();
}

mysqli_close($conn);
}

?>

    }