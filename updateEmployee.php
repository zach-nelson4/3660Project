<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['...']))
    {
    $first_name = $last_name = $phone = "";

	$first_name = mysqli_real_escape_string($conn, $_POST['fn']);
	$last_name = mysqli_real_escape_string($conn, $_POST['ln']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone_num']);
    
    $sql = "UPDATE employee 
            SET "

    }