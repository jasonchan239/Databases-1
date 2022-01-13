<!--this file gets the information for the table containing all trip information-->

<?php
$columns = array('TripID','TripName','StartDate','EndDate','CountryName','LicenceID');
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
 $query = "select * from Trip";
 $result = mysqli_query($connection,$query);
 if (!$result) {
 die("databases query failed.");
 }

     echo "<table>";
     echo "<th>TripID</th>";
     echo "<th>TripName</th>";
     echo "<th>StartDate</th>";
     echo "<th>EndDate</th>";
     echo "<th>CountryName</th>";
     echo "<th>LicenceID</th>";
 while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr>";
     echo "<td>" . $row["TripID"]."</td>";
     echo "<td>" . $row["TripName"]."</td>";
     echo "<td>" . $row["StartDate"]."</td>";
     echo "<td>" . $row["EndDate"]."</td>";
     echo "<td>" . $row["CountryName"]."</td>";
     echo "<td>" . $row["LicenceID"]."</td>";
     echo "</tr>";
 }
     echo "</table>";
 mysqli_free_result($result);
?>


