<?php
    $user_id = $_GET["user_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("login_database_connection.php") ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cardboard Cutout Design</title>
</head>
<body>
    <div id="login-container">
        <form action="update_password.php?user_id=
            <?php echo $user_id; ?>
        " method="post">
            <div class="container">
                <label for="new_password"><b>New Password</b></label>
                <input type="password" placeholder="Enter Password" name="new_password" required>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>