<!--this file gets the trips for adding a new trip w/ a valid bus -->

<?php
include "connecttodb.php";
$countryTrip = $_POST['countryTrip']; //get selected museum value from the form
$query = "SELECT * FROM Trip WHERE CountryName='$countryTrip'";
echo "Trips to: ";
echo $countryTrip;
$result = mysqli_query($connection, $query); 
if (!$result) {
    die("databases query on Trip pieces failed. ");
}
echo "<ul>"; //put the artwork in an unordered bulleted list
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . "Trip ID: " . $row[TripID].", Trip Name: " . $row[TripName] .", Start Date:" . $row[StartDate] .", End Date " .$row[EndDate] .", Country: " .$row[CountryName] .", Licence Plate: " .$row[LicenceID] ." " .$row[Urlmage] . "</li>";
}

echo "</ul>"; //end the bulleted list
mysqli_free_result($result);

?>