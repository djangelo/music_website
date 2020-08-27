<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cardboard Cutout Design</title>
</head>
<body>
    <div id="login-container">
        <form action="add_new_user.php" method="post">
            <div class="container">
                <label for="new_username"><b>New Username</b></label>
                <input type="text" placeholder="Enter Username" name="new_username" required>
                <label for="new_password"><b>New Password</b></label>
                <input type="password" placeholder="Enter Password" name="new_password" required>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>