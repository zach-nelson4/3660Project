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
        




    }