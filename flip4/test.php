<form action="testsort.php" method="post">
         
            <input type="submit" name="ASC" value="Ascending"><br><br>
            <input type="submit" name="DESC" value="Descending"><br><br>
         
            <table>
                <tr>
                    <th>TripID</th>
                    <th>TripName</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>CountryName</th>
                    <th>LicenceID</th>
                </tr>
                <!-- populate table from mysql database -->
                <?php while ($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>