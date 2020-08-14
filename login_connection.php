<?php
    // The connection variables
    $database_hostname = "localhost";
    $database_host_username = "root";
    $database_password = "dojustly01";
    $database_name = "login";

    // Creating the connection using the variables
    $connection = mysqli_connect($database_hostname, $database_host_username, $database_password, $database_name);

    // Responding with an error if a connection cannot be made
    if (mysqli_connect_errno($connection)) {
        echo "Failed to connect to the database " . mysqli_connect_error();
    }
?>