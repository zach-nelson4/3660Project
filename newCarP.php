<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if(isset($_POST['new_car_submit']))
    {
        $model = $edition = $interior_colour = $exterior_colour = $VIN = "";
        $CarID = $year = 0;

        $model = mysqli_real_escape_string($conn, $_POST['ModName']);
        $edition = mysqli_real_escape_string($conn, $_POST['EdName']);
        $interior_colour = mysqli_real_escape_string($conn, $_POST['IntCol']);
        $exterior_colour = mysqli_real_escape_string($conn, $_POST['ExtCol']);
        $VIN = mysqli_real_escape_string($conn, $_POST['VIN']);
        $year = mysqli_real_escape_string($conn, $_POST['Year']);
        $CarID = mysqli_real_escape_string($conn, $_POST['CarID']);

        $sql = "INSERT INTO cars  VALUES('$CarID', '$model', '$edition', '$year', '$interior_colour', '$exterior_colour', '$VIN')";

        $retval = mysqli_query($conn, $sql);

        $url = "http://localhost/3660Project/Index.html";

        if($retval) {
            header("Location: $url");
            exit;
        } else {
            echo "Error." ;
            die();
        }

        mysqli_close($conn);

    }
?>