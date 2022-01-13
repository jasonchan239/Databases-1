

<?php
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
     echo "<th>TripName</th>";
 while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr>";
     echo "<td>" ."TripName: ". $row["TripName"]."</td>";
     echo "<td>" ."StartDate: ". $row["StartDate"]."</td>";
     echo "<td>" ."EndDate: ". $row["EndDate"]."</td>";
     echo "<td>" ."CountryName: ". $row["CountryName"]."</td>";
     echo "<td>" ."LicenceID: ". $row["LicenceID"]."</td>";
     echo "</tr>";
 }
     echo "</table>";
 mysqli_free_result($result);
?>


