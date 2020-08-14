<?php 
    session_start();
?>

<?php
    // Password validation and redirection to the index page
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collecting the values of the input boxes
        $username_attempt = $_POST["username_attempt"];
        $password_attempt = $_POST["password_attempt"];
        $password_attempt_hash = hash('sha256', $password_attempt);

        // Checking if the inputs are empty
        if (empty($username_attempt)) {}
        elseif (empty($password_attempt)) {}
        else {
            // Continue with the password validation
            require("login_connection.php");

            // Querying the database for the information
            $query = "
                SELECT password_hash FROM login WHERE username ='". $username_attempt . "'
            ";
            $response = mysqli_query($connection, $query);

            // Checking if the username is valid
            if ($response) {
                $real_password_hash = mysqli_fetch_assoc($response)["password_hash"];

                if ($real_password_hash == $password_attempt_hash) {
                    $_SESSION["user_logged_in"] = true;

                    // Special case
                    if ($username_attempt == "Graeme") {
                        $_SESSION["admin_logged_in"] = true;
                    }
                    
                    header("Location: http://localhost/music_website/index.php");  
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("login_connection.php") ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cardboard Cutout Design</title>
</head>
<body>
    <div id="login-container">
        <form action="login.php" method="post">
            <div class="container">
                <label for="username_attempt"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username_attempt" required>
                <label for="password_attempt"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password_attempt" required>
                <button type="submit">Login</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <p>Welcome to the music website</p>
            </div>
        </form>
    </div>
</body>
</html>