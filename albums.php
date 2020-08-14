<?php
    session_start();
    require("login_check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("songs_connection.php"); ?>
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
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Songs</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT a.album, art.artist, COUNT(a.album_id) AS 'songs_count'
                        FROM songs s
                        JOIN albums a ON s.album_id = a.album_id
                        JOIN artists art ON s.artist_id = art.artist_id
                        GROUP BY a.album_id
                        HAVING COUNT(a.album_id) > 0
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($connection, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td> <?php echo $row["album"] ?> </td>
                    <td> <?php echo $row["artist"] ?> </td>
                    <td> <?php echo $row["songs_count"] ?> </td>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>