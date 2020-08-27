<?php
    // Establishing the $connection variable
    require("login_database_connection.php");
    
    // Getting the GET variables
    $user_id = $_GET["user_id"];

    // Deleting the user
    $query = "DELETE FROM login WHERE user_id = " . $user_id;

    mysqli_query($connection, $query);
    header("Location: http://localhost/music_website/admin.php")
?>