<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if (isset($_POST['emp_history_submit']))
    {
       $employer = $title = $supervisor = $phoneNum = $address = "";
       
       $employer = mysqli_real_escape_string($conn, $_POST['employer1']);
       $title = mysqli_real_escape_string($conn, $_POST['title1']);
       $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor1']);
       $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum1']);
       $address = mysqli_real_escape_string($conn, $_POST['address1']);
       $date = mysqli_real_escape_string($conn, $_POST['sDate1']);

       if(!$employer == "") {
           $sql = "INSERT INTO employerhist VALUES((select max(CustID) from customer), 
                   '$employer', '$title', '$supervisor', '$phoneNum', '$address', '$date', NULL)";
           $retval = mysqli_query($conn, $sql);
       }
       
       $employer = $title = $supervisor = $phoneNum = $address = "";
       
       $employer = mysqli_real_escape_string($conn, $_POST['employer2']);
       $title = mysqli_real_escape_string($conn, $_POST['title2']);
       $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor2']);
       $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum2']);
       $address = mysqli_real_escape_string($conn, $_POST['address2']);
       $date = mysqli_real_escape_string($conn, $_POST['sDate2']);

       if(!$employer == "") {
           $sql1 = "INSERT INTO employerhist VALUES((select max(CustID) from customer), 
                   '$employer', '$title', '$supervisor', '$phoneNum', '$address', '$date', NULL)";
           $retval1 = mysqli_query($conn, $sql1);
       }

       $employer = $title = $supervisor = $phoneNum = $address = "";
       
       $employer = mysqli_real_escape_string($conn, $_POST['employer3']);
       $title = mysqli_real_escape_string($conn, $_POST['title3']);
       $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor3']);
       $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum3']);
       $address = mysqli_real_escape_string($conn, $_POST['address3']);
       $date = mysqli_real_escape_string($conn, $_POST['sDate3']);

       if(!$employer == "") {
           $sql2 = "INSERT INTO employerhist VALUES((select max(CustID) from customer), 
                   '$employer', '$title', '$supervisor', '$phoneNum', '$address', '$date', NULL)";
           $retval2 = mysqli_query($conn, $sql);
       }

       $employer = $title = $supervisor = $phoneNum = $address = "";
       
       $employer = mysqli_real_escape_string($conn, $_POST['employer4']);
       $title = mysqli_real_escape_string($conn, $_POST['title4']);
       $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor4']);
       $phoneNum = mysqli_real_escape_string($conn, $_POST['phoneNum4']);
       $address = mysqli_real_escape_string($conn, $_POST['address4']);
       $date = mysqli_real_escape_string($conn, $_POST['sDate4']);

       if(!$employer == "") {
           $sql3 = "INSERT INTO employerhist VALUES((select max(CustID) from customer), 
                   '$employer', '$title', '$supervisor', '$phoneNum', '$address', '$date', NULL)";
           $retval3 = mysqli_query($conn, $sql);
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