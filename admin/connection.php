<?php

    // Database connection parameters
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "details";

    // Create a connection to the database
    $con = mysqli_connect($host, $username, $password, $dbname);
    
    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>