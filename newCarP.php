<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if(isset($_POST['new_car_submit']))
    {
        $model = $edition = $interior_colour = $exterior_colour = $VIN = "";
        $year = 0;

        $purchPrice = 0.0;
        $ExpMile = 0;

        $model = mysqli_real_escape_string($conn, $_POST['ModName']);
        $edition = mysqli_real_escape_string($conn, $_POST['EdName']);
        $interior_colour = mysqli_real_escape_string($conn, $_POST['IntCol']);
        $exterior_colour = mysqli_real_escape_string($conn, $_POST['ExtCol']);
        $VIN = mysqli_real_escape_string($conn, $_POST['VIN']);
        $year = mysqli_real_escape_string($conn, $_POST['Year']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        
        $sql = "INSERT INTO cars  VALUES(NULL, 'NEW', '$model', '$edition', '$year', '$interior_colour', '$exterior_colour', '$VIN')";

        $retval = mysqli_query($conn, $sql);

        $MSRP = mysqli_real_escape_string($conn, $_POST['purchPrice']);
        $ExpMile = mysqli_real_escape_string($conn, $_POST['ExpMiles']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $sql1= "INSERT INTO newcarpurchase VALUES(NULL, (select max(carID) from cars), '$MSRP', '$ExpMile', '$date')";

        $retval1 = mysqli_query($conn, $sql1);

        $url = "http://localhost/3660Project/Index.html";

        if($retval1) {
            header("Location: $url");
            exit;
        } else {
            echo "Error.";
            die();
        }

        mysqli_close($conn);
    }
?>
