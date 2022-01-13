<!--this file adds a new trip to the database-->
<?php
include "connecttodb.php";
$tripID=$_POST['tripsUP'];
$tripName = $_POST["tripNameUP"];
$startDate = $_POST["startDateUP"];
$endDate = $_POST["endDateUP"];
$countryName = $_POST["countryNameUP"];
$licenceID = $_POST["licenceIDUP"];
$urlImage = $_POST["urlImageUP"];
$query = "SELECT * FROM Trip WHERE TripID='$tripID'";
if($urlImage==''){
    $urlImage="";
}
echo $query;
echo "<br>";
echo $tripID;echo "<br>";
echo $tripName;echo "<br>";
echo $startDate;echo "<br>";
echo $endDate;echo "<br>";
echo $countryName;echo "<br>";
echo $licenceID;echo "<br>";
echo $urlImage;echo "<br>";

if (empty(mysqli_query($connection, $query))) {
    echo "Error inserting new trip.";
//    header('Location: website.php'); //send back to museum page once it is done
//    exit;
}else{
    $query = "INSERT INTO Trip VALUES ($tripID,'$tripName','$startDate','$endDate','$countryName','$licenceID','$urlImage');";
    echo $query;
    if (mysqli_query($connection, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

//    header('Location: website.php'); //send back to museum page once it is done
//    exit;
}
?>