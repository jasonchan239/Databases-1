<?php
include "connecttodb.php";
$passengerInfo = $_POST['passengerInfo']; //get selected museum value from the form
$query = "SELECT * FROM Books WHERE PassengerID='$passengerInfo'";
echo "Trips to: ";
echo $countryTrip;
$result = mysqli_query($connection, $query); 
if (!$result) {
    die("databases query on Trip pieces failed. ");
}
echo "<ul>"; //put the artwork in an unordered bulleted list
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . " " . $row[TripID]." " . $row[PassengerID] ." "  .$row[Price] . "</li>";
}

echo "</ul>"; //end the bulleted list
mysqli_free_result($result);

?>