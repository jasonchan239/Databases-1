<?php
include "connecttodb.php";
$tripID=$_SESSION['trips22'];
$result = mysqli_query($connection, "SELECT * FROM Books WHERE TripID = '$tripID'");
$rows = mysqli_num_rows($result);
echo $_SESSION['trips22'];
if ($rows == 0){
    $query = "DELETE FROM Trip WHERE TripID='$tripID'";
    if (mysqli_query($connection, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
    //    }else{
    //        echo "cancelled...";
    //    }

}


//header('Location: website.php'); //send back to museum page once it is done
//exit;
?>