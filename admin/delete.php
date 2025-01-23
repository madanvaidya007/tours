<?php
include 'connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the record
    $sqlDelete = "DELETE FROM clients WHERE id = $id";
    if ($con->query($sqlDelete) === TRUE) {
        // Update primary key values to ensure ascending order without gaps
        $sqlUpdate = "SET @count = 0;
                      UPDATE clients SET id = @count:= @count + 1;
                      ALTER TABLE clients AUTO_INCREMENT = 1;";
        if ($con->multi_query($sqlUpdate) === TRUE) {
            // Successfully reorganized primary key values
            header("location:./dash.php");
            exit();
        } else {
            echo "Error updating primary key values: " . $con->error;
        }
    } else {
        echo "Error deleting record: " . $con->error;
    }
}

$con->close();
?>
