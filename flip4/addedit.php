
<?php 
include "connecttodb.php";

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: ";
}

$conn->close();
?>