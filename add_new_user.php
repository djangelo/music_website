<?php
    // Establishing the connection to the user's database
    require("login_database_connection.php");

    // Getting the variables from the new_password form
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];
    
    // Hashing the password - so it can fit the format
    $new_password_hash = hash('sha256', $new_password);

    // Building the query
    $query = "
        INSERT INTO login (username, password_hash)
        VALUES ('" . $new_username . "','" . $new_password_hash . "')
    ";

    // Executing the query
    mysqli_query($connection, $query);

    // Going back to the admin page
    header("Location: http://localhost/music_website/admin.php");
?>
    