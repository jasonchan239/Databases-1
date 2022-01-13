<!--this file is the real sort file, allowing the sort function for the table-->
<?php
// Ascending Order
if(isset($_POST['ASC1']))
{
    $asc_query = "SELECT * FROM Trip ORDER BY TripName ASC";
    $result = executeQuery($asc_query);
}

// Descending Order
elseif (isset ($_POST['DESC1'])) 
{
    $desc_query = "SELECT * FROM Trip ORDER BY TripName DESC";
    $result = executeQuery($desc_query);
}
elseif(isset($_POST['ASC2']))
{
    $asc_query = "SELECT * FROM Trip ORDER BY CountryName ASC";
    $result = executeQuery($asc_query);
}

// Descending Order
elseif (isset ($_POST['DESC2'])) 
{
    $desc_query = "SELECT * FROM Trip ORDER BY CountryName DESC";
    $result = executeQuery($desc_query);
}

// Default Order
else {
    $default_query = "SELECT * FROM Trip";
    $result = executeQuery($default_query);
}


function executeQuery($query)
{
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass = "cs3319";
    $dbname = "38_assign2db";
    $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()) {
        die("Database connection failed :" .
            mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    } //end of if statement
    $result = mysqli_query($connection, $query);
    return $result;
}

?>