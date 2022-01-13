<!--this file adds the new trip-->
<?php
include "connecttodb.php";
$tripID=$_POST['trips'];
$tripName = $_POST["tripName"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$urlImage = $_POST["urlImage"];
if(!empty($tripName)){
    //    $query = "UPDATE Trip SET TripName = '$tripName' WHERE TripID = '$tripID'";
    if (mysqli_query($connection, "UPDATE Trip SET TripName = '$tripName' WHERE TripID = '$tripID'")) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
if(!empty($startDate)){
    $query= "UPDATE Trip SET StartDate='$startDate' WHERE TripID='$tripID';";
    if (mysqli_query($connection, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
if(!empty($endDate)){
    $query= "UPDATE Trip SET EndDate='$endDate' WHERE TripID='$tripID';";
    if (mysqli_query($connection, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
if(!empty($urlImage)){
    $query= "UPDATE Trip SET urlmage='$urlImage' WHERE TripID='$tripID';";
    if (mysqli_query($connection, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}


header('Location: website.php'); //send back to museum page once it is done
exit;

?>