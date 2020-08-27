<?php
    // The connection variables
    $database_hostname = "localhost";
    $database_host_username = "root";
    $database_password = "dojustly01";
    $database_name = "music_database";

    // Creating the connection using the variables
    $connection = mysqli_connect($database_hostname, $database_host_username, $database_password, $database_name);

    if (!$connection) {
        echo "Failed to connect to the database!";
        exit;
    }
?>

