<!--this file returns the passenger's info-->
<?php
$query = "SELECT * FROM Passenger INNER JOIN Passport ON Passenger.PassengerID=Passport.PassengerID ORDER BY LastName DESC";
$result2 = executeQuery2($query);


function executeQuery2($query){
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass = "cs3319";
    $dbname = "38_assign2db";
    $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
        die("Database connection failed :" .
            mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    } //end of if statement
    $result2 = mysqli_query($connection, $query);
    return $result2;
}

?>