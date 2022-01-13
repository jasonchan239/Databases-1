<!--this file gets the trip information to populate the table-->
<?php
$query = "SELECT * FROM Trip INNER JOIN Books ON Trip.TripID = Books.TripID RIGHT OUTER JOIN Passenger ON Books.PassengerID=Passenger.PassengerID;";
$result4 = executeQuery4($query);

function executeQuery4($query){
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass = "cs3319";
    $dbname = "38_assign2db";
    $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
        die("Database connection failed :" .
            mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    } //end of if statement
    $result4 = mysqli_query($connection, $query);
    return $result4;
}

?>
