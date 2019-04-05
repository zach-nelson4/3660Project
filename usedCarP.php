<?php
    include 'connectdb.php';
    $conn = connect_sql();

    if(isset($_POST['used_car_submit']))
    {
        $model = $edition = $interior_colour = $exterior_colour = $VIN = "";
        $year = 0;

        $BookPrice = $PricePaid = 0.0;
        $mileage = 0;
        $SellerName = $location = "";

        $model = mysqli_real_escape_string($conn, $_POST['ModName']);
        $edition = mysqli_real_escape_string($conn, $_POST['EdName']);
        $interior_colour = mysqli_real_escape_string($conn, $_POST['IntCol']);
        $exterior_colour = mysqli_real_escape_string($conn, $_POST['ExtCol']);
        $VIN = mysqli_real_escape_string($conn, $_POST['VIN']);
        $year = mysqli_real_escape_string($conn, $_POST['Year']);

        $sql = "INSERT INTO cars VALUES(NULL, 'USED', '$model', '$edition', '$year', '$interior_colour', '$exterior_colour', '$VIN')"; 
        
        $retval = mysqli_query($conn, $sql);

        $BookPrice = mysqli_real_escape_string($conn, $_POST['BookPrice']);
        $PricePaid = mysqli_real_escape_string($conn, $_POST['PricePaid']);
        $mileage = mysqli_real_escape_string($conn, $_POST['mileage']);
        $SellerName = mysqli_real_escape_string($conn, $_POST['sellerName']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $sql1 = "INSERT INTO oldcarpurchase VALUES(NULL, (select max(carID) from cars), '$BookPrice', '$PricePaid', '$mileage', '$SellerName', '$location', '$date')";

        $retval1 = mysqli_query($conn, $sql1);

        $url = "http://localhost/3660Project/Repairs.html";

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
