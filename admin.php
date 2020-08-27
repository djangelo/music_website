<?php
    session_start();
    require("login_check.php");
    require("admin_login_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("login_database_connection.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cardboard Cutout Design</title>
</head>
<body>
    <div id="wrapper">
        <?php require_once("navbar.php") ?>
        <div id="body">
            <table id="info-table">
                <tr>
                    <th>Users</th>
                    <th>Password Hash</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT user_id, username, password_hash
                        FROM login
                        WHERE 1
                        ORDER BY username ASC
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($connection, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td>
                        <?php echo $row["username"] ?>
                    </td>
                    <td>
                        <?php echo $row["password_hash"];?>
                    </td>
                    <td> 
                        <a href="
                            <?php echo "delete_user.php?user_id=" . $row["user_id"]?>
                        ">delete</a>
                        <a href="
                            <?php echo "new_password.php?user_id=" . $row["user_id"] ?>
                        ">update</a>
                    </td>
                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <div id="extra-information">
                <a href="new_user.php">add user</a>
            </div>
        </div>
    </div>
</body>
</html>