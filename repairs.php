<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['repair_submit']))
    {
    $problem = "";
    $estCost = $actCost = 0.0;
    
	$problem = mysqli_real_escape_string($conn, $_POST['problem1']);
	$estCost = mysqli_real_escape_string($conn, $_POST['e_Cost1']);
	$actCost = mysqli_real_escape_string($conn, $_POST['a_Cost1']);
    
    if(!$problem == ""){
	$sql = "INSERT INTO repair VALUES((select max(carID) from cars), '$estCost', '$actCost', '$problem', NULL)";
    $retval = mysqli_query($conn, $sql);
    }

    $problem = "";
    $estCost = $actCost = 0.0;
    
	$problem = mysqli_real_escape_string($conn, $_POST['problem2']);
	$estCost = mysqli_real_escape_string($conn, $_POST['e_Cost2']);
	$actCost = mysqli_real_escape_string($conn, $_POST['a_Cost2']);
    
    if(!$problem == ""){
	$sql1 = "INSERT INTO repair VALUES((select max(carID) from cars), '$estCost', '$actCost', '$problem', NULL)";
    $retval1 = mysqli_query($conn, $sql1);
    }

    $problem = "";
    $estCost = $actCost = 0.0;
    
	$problem = mysqli_real_escape_string($conn, $_POST['problem3']);
	$estCost = mysqli_real_escape_string($conn, $_POST['e_Cost3']);
	$actCost = mysqli_real_escape_string($conn, $_POST['a_Cost3']);
    
    if(!$problem == ""){
	$sql2 = "INSERT INTO repair VALUES((select max(carID) from cars), '$estCost', '$actCost', '$problem', NULL)";
    $retval2 = mysqli_query($conn, $sql2);
    }

    $problem = "";
    $estCost = $actCost = 0.0;
    
	$problem = mysqli_real_escape_string($conn, $_POST['problem4']);
	$estCost = mysqli_real_escape_string($conn, $_POST['e_Cost4']);
	$actCost = mysqli_real_escape_string($conn, $_POST['a_Cost4']);
    
    if(!$problem == "") {
	$sql3 = "INSERT INTO repair VALUES((select max(carID) from cars), '$estCost', '$actCost', '$problem', NULL)";
    $retval3 = mysqli_query($conn, $sql3);
    }

    $problem = "";
    $estCost = $actCost = 0.0;
    
	$problem = mysqli_real_escape_string($conn, $_POST['problem5']);
	$estCost = mysqli_real_escape_string($conn, $_POST['e_Cost5']);
	$actCost = mysqli_real_escape_string($conn, $_POST['a_Cost5']);
    
    if(!$problem == ""){
	$sql4 = "INSERT INTO repair VALUES((select max(carID) from cars), '$estCost', '$actCost', '$problem', NULL)";
    $retval4 = mysqli_query($conn, $sql4);
    }
    
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