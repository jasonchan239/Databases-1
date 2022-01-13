<!--programmer: 38-->
<!DOCTYPE html>
<html>
    <?php include "connecttodb.php";?>
    <?php include "testsort.php";?>
    <head>
        <title>Bus Trip</title>
        <link rel="stylesheet" type="text/css" href="website.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
    </head>
    
    
    
    <body>
        <script src="museum2.js"></script>
        <h1>Bus trips</h1>
<!--   this loads a table that the user can sort by trip name or country     -->
        <form action="website.php" method="post">
            <div>
                <div>
                    <input type="submit" name="ASC1" id="but1" value="Trip Name Asc">
                    <input type="submit" name="DESC1" id="but2" value="Trip Name Desc">
                    <input type="submit" name="ASC2" id="but3" value="Country Asc">
                    <input type="submit" name="DESC2" id="but4" value="Country Desc">
                </div>
                <table>
                    <tr>
                        <th>TripID</th>
                        <th>TripName</th>
                        <th>StartDate</th>
                        <th>EndDate</th>
                        <th>CountryName</th>
                        <th>LicenceID</th>
                        <th>Urlmage</th>
                    </tr>
                    <!-- populate table from mysql database -->
                    <?php while ($row = mysqli_fetch_array($result)):?>
                    <tr>
                        <td><?php echo $row[0];?></td>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                        <td><?php echo "<img src=$row[6]>";?></td>
                    </tr>
                    <?php endwhile;?>
                </table>
                </form>
            </div>
        <hr class="solid">
        
        
        
        <!--    select a bus trip, and change the trip name, start date or end date and the image URL but NOT allow the user to modify the trip id or the country  -->
        <form action="website.php" method="post">
            <label>Select a trip to change:</label>
            <select name="Trips" id="Trips">
                <option value="0">Trip ID</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT TripID FROM Trip ORDER BY TripID ASC");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row["TripID"].'">'.$row["TripID"].'</option>';
                } ?>
            </select>
        </form>
        <h4> Update a trip</h4>
        <form action="addthetrip.php" method="post" >
            What is the trip id: <input type="number" name="trips"><br>
            What is the new trip name: <input type="text" name="tripName"><br>
            What is the new start date: <input type="text" name="startDate"><br>
            What is the new end date: <input type="text" name="endDate"><br>
            What is the new image url: <input type="text" name="urlImage"><br>
            <br>
            <input type="submit" value="Click here to update the trip">
        </form>
        <hr class="solid">
        <!--select a trip and delete it if there are no bookings. warn before delete, or error-->
        <h4> Delete a trip with no bookings</h4>
        <!--  

******* push the button, then press enter on the text field, then refresh :(    *******


-->
        <form method="post" >
            What is the ID of the trip you want to remove? 
            <input type="number" name="trips22">
            <br><br>
            <?php
            $_SESSION['trips22'] = $_POST['trips22'];
            ?>
            <input type="button" onclick="warning()" value="Click here delete the trip">
            <script type="text/javascript">
                function warning() {
                    var txt;
                    var r= window.confirm("Are you sure you want to delete this trip?")
                    if (r) {
                        trip will be removed.
                        remove();
                        return true;
                    }
                }
                function remove(){
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
                    }
                    ?>
                }
            </script>

        </form>
        <br><br>
        <hr class="solid">
        
        
        
        
        <!-- add a new trip w/valid bus  -->
        <h4> Add a new trip</h4>
        <form action="addnewtrip.php" method="post" >
            What is the trip id: <input type="number" name="tripsUP"><br>
            What is the trip name: <input type="text" name="tripNameUP"><br>
            What is the start date: <input type="text" name="startDateUP"><br>
            What is the end date: <input type="text" name="endDateUP"><br>
            What is the country name: <input type="text" name="countryNameUP"><br>
            What is the licence plate: <select name="licenceIDUP" id="licenceIDUP">
            <option value="0">Licence Plate</option>
            <?php 
            $sql = mysqli_query($connection,"SELECT DISTINCT LicenceID FROM Bus");
            while ($row = $sql->fetch_assoc()){
                echo '<option value="'.$row["LicenceID"].'">'.$row["LicenceID"].'</option>';
            } ?>
            </select><br>
            What is the image url: <input type="text" name="urlImageUP"><br>
            <br>
            <input type="submit" value="Click here to add a new trip">
        </form>
        <hr class="solid">
        <!-- Allow the user to select a country and see all the bus trips from that country. -->
        <form method="post">
            <label>Select a country to view the trips:</label>
            <select name="countryTrip" id="countryTrip">
                <option value="0">Country</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT DISTINCT CountryName FROM Trip");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row["CountryName"].'">'.$row["CountryName"].'</option>';
                } ?>
            </select>
        </form>
        <?php
        if (isset($_POST['countryTrip'])) {
            include "gettrips.php";
        }
        ?>
        <hr class="solid">
        
        
        
        
        <!-- Allow the user to create a booking for a trip. The user should be able to pick an existing passenger and an existing trip and then enter the price for that trip -->
        <h4> Create a booking </h4>
        <form action="addpassengertotrip.php" method="post" >
            <select name="passengerBook" id="passengerBook">
                <option value="0">Passenger Name</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT DISTINCT * FROM Passenger");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row["PassengerID"].'">'.$row["FirstName"]." ".$row["LastName"].'</option>';
                } ?>
            </select>
            <select name="passengerTrip" id="passengerTrip">
                <option value="0">Trip</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT TripID, TripName FROM Trip");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row["TripID"].'">'.$row["TripName"].'</option>';
                } ?>
            </select>
            <br>
            What is the price: <input type="text" name="tripPrice"><br>
        </form>
        <hr class="solid">
        
        
        
        <!-- List all the info about the passengers including passport information in order by last name.-->
        <?php include "passengerinfo.php";?>
        <h4> Passenger Info</h4>
        <table>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Passenger ID</th>
                <th>Passport ID</th>
                <th>Country</th>
                <th>Expiry Date</th>
                <th>Birth Date</th>
            </tr>
            <!-- populate table from mysql database -->
            <?php while ($row2 = mysqli_fetch_array($result2)):?>
            <tr>
                <td><?php echo $row2[2];?></td>
                <td><?php echo $row2[1];?></td>
                <td><?php echo $row2[0];?></td>
                <td><?php echo $row2[3];?></td>
                <td><?php echo $row2[4];?></td>
                <td><?php echo $row2[5];?></td>
                <td><?php echo $row2[6];?></td>
            </tr>
            <?php endwhile;?>
        </table>

        <hr class="solid">
        <!-- Select a passenger and see all of his/her bookings.-->
        <h4> View a passenger's bookings</h4>
        <form method="post">
            <label>Select a country to view the trips:</label>
            <select name="passengerInfo" id="passengerInfo">
                <option value="0">Passenger</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT DISTINCT * FROM Passenger");
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row["PassengerID"].'">'.$row["FirstName"]." ".$row["LastName"].'</option>';
                } ?>
            </select>
        </form>
        <?php
        if (isset($_POST['passengerInfo'])) {

            include "getpassengerinfo.php";
        }
        ?>
        <hr class="solid">
        
        
        
        <!-- Allow a user to delete a booking.-->
        <?php include "getTripTable.php";?>
        <form action="" method="post" >
            What is the ID of the trip you want to remove?<br> 
            <table>
                <tr>
                    <th>Trip Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                </tr>
                <!-- populate table from mysql database -->
                <?php while ($row = mysqli_fetch_array($result4)):?>
                <tr>
                    <td><?php echo $row["TripName"];?></td>
                    <td><?php echo $row["FirstName"];?></td>
                    <td><?php echo $row["LastName"];?></td>
                </tr>
                <?php endwhile;?>
            </table>
            <select name="bookingsDrop" id="bookingsDrop">
                <option value="0">Bookings</option>
                <?php 
                $sql = mysqli_query($connection,"SELECT * FROM Books;");
                $counter = 1;
                while ($row = $sql->fetch_assoc()){
                    echo '<option value="'.$counter.'">'.$row["TripID"]." | ".$row["PassengerID"]." ".$row["Price"].'</option>';
                    $counter++;
                } ?>
            </select>
            <br><br>
            <input type="button" onclick="removeBooking()" value="Click here delete the booking">
            <?php
            function removeBooking(){
                //                if (isset($_GET['bookingsDrop'])) {

                include "connecttodb.php";
                $counter=1;
                while (($row4 = mysqli_fetch_array($result))&&($counter!=$_POST['bookingsDrop'])){
                    $counter++;
                }
                $tripid = $_POST['bookingsDrop'][0];
                $passid = $_POST['bookingsDrop'][1];
                $price = $_POST['bookingsDrop'][2];
                
                $query5 = "DELETE FROM Books WHERE Books.PassengerID='$passid'";
                echo $query5;
                if (mysqli_query($connection, $query)) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($connection);
                }
                //                }
            }?>
        </form>
        <hr class="solid">
        
        
        
        
        <!--        list all bus trips w/ no bookings-->
        <h4>Trips with no bookings</h4>
        <?php include "emptytrips.php";?>
        <?php include "connecttodb.php";?>
        <table>
            <tr>
                <th>Trip ID</th>
                <th>Trip Name</th>
            </tr>
            <!-- populate table from mysql database -->
            <?php 
            while ($row3 = mysqli_fetch_array($result3)){
                if($row3[7]==NULL){
                    echo"<tr>";
                    echo"<td>";
                    echo $row3[0];
                    echo"</td>";
                    echo"<td>";
                    echo $row3[1];
                    echo"</td>";
                    echo "</tr>";
                }
            }?>
        </table>
        <hr class="solid">

    </body>
</html>


