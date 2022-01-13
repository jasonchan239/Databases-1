<!--this file checks for trips w/ no bookings-->
<?php
$query = "SELECT * FROM Trip LEFT OUTER JOIN Books ON Trip.TripID=Books.TripID;";
$result3 = executeQuery3($query);

function executeQuery3($query){
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass = "cs3319";
    $dbname = "38_assign2db";
    $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
        die("Database connection failed :" .
            mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    } //end of if statement
    $result3 = mysqli_query($connection, $query);
    return $result3;
}

?>
