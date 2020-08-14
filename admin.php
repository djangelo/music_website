<?php
    session_start();
    require("login_check.php");
    require("admin_login_check.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("login_connection.php"); ?>
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
                    <th>Password</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT username, password_hash
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
                    <td> <?php echo $row["username"] ?> </td>
                    <td> <?php echo $row["password_hash"];?> </td>
                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>