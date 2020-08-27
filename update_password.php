<?php
    // Establishing the connection to the user's database
    require("login_database_connection.php");

    // Getting the variables from the new_password form
    $user_id = $_GET["user_id"];
    $new_password = $_POST["new_password"];
    
    // Hashing the password - so it can fit the format
    $new_password_hash = hash('sha256', $new_password);

    // Building the query
    $query = "
        UPDATE login
        SET password_hash = '" . $new_password_hash . "'
        WHERE user_id = " . $user_id . "
    ";

    // Executing the query
    mysqli_query($connection, $query);

    // Going back to the admin page
    header("Location: http://localhost/music_website/admin.php");
?>
    

