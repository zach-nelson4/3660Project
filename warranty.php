<?php
    include 'connectdb.php';
    $conn = connect_sql();
    $retval = true;
    if (isset($_POST['warranty_submit']))
    {
       $warranty = "";
       $deduct = $totalC = $monthC = 0.0;
       $durat = 0;
       
       $warranty = mysqli_real_escape_string($conn, $_POST['Warranty1']);
       $deduct = mysqli_real_escape_string($conn, $_POST['Deduct1']);
       $durat = mysqli_real_escape_string($conn, $_POST['Durat1']);
       $totalC = mysqli_real_escape_string($conn, $_POST['TotalC1']);
       $monthC = mysqli_real_escape_string($conn, $_POST['MonthC1']);
   

       if(!$warranty == "") {
           $sql = "INSERT INTO warranty VALUES((select max(SalesTransID) from salestrans), 
                   '$warranty', '$deduct', (select transDate from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))), (select CarID from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))) , '$durat', '$totalC', '$monthC', NULL)";
           $retval = mysqli_query($conn, $sql);
       }

       $warranty = "";
       $deduct = $totalC = $monthC = 0.0;
       $durat = 0;
       
       $warranty = mysqli_real_escape_string($conn, $_POST['Warranty2']);
       $deduct = mysqli_real_escape_string($conn, $_POST['Deduct2']);
       $durat = mysqli_real_escape_string($conn, $_POST['Durat2']);
       $totalC = mysqli_real_escape_string($conn, $_POST['TotalC2']);
       $monthC = mysqli_real_escape_string($conn, $_POST['MonthC2']);
   

       if(!$warranty == "") {
           $sql1 = "INSERT INTO warranty VALUES((select max(SalesTransID) from salestrans), 
                   '$warranty', '$deduct', (select transDate from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))), (select CarID from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))) , '$durat', '$totalC', '$monthC', NULL)";
           $retval1 = mysqli_query($conn, $sql1);
       }

       $warranty = "";
       $deduct = $totalC = $monthC = 0.0;
       $durat = 0;
       
       $warranty = mysqli_real_escape_string($conn, $_POST['Warranty3']);
       $deduct = mysqli_real_escape_string($conn, $_POST['Deduct3']);
       $durat = mysqli_real_escape_string($conn, $_POST['Durat3']);
       $totalC = mysqli_real_escape_string($conn, $_POST['TotalC3']);
       $monthC = mysqli_real_escape_string($conn, $_POST['MonthC3']);
   

       if(!$warranty == "") {
           $sql2 = "INSERT INTO warranty VALUES((select max(SalesTransID) from salestrans), 
                   '$warranty', '$deduct', (select transDate from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))), (select CarID from salestrans where(SalesTransID = (select max(SalesTransID) from salestrans))) , '$durat', '$totalC', '$monthC', NULL)";
           $retval2 = mysqli_query($conn, $sql2);
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