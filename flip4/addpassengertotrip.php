<!--this file loads a passenger into a trip-->
<?php
include "connecttodb.php";
$passID=$_POST["passengerBook"];
$tripID = $_POST["passengerTrip"];
$tripPrice = $_POST["tripPrice"];
$query = "SELECT * FROM Trip WHERE TripID='$tripID'";
if($urlImage==''){
    $urlImage="";
}

$query = "INSERT INTO Books VALUES ($tripID,'$passID','$tripPrice');";
echo $query;
if (mysqli_query($connection, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($connection);
}

//    header('Location: website.php'); //send back to museum page once it is done
//    exit;

?>