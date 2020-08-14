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
                    <th>Artist</th>
                    <th>Songs</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT art.artist, COUNT(s.song_id) AS song_count
                        FROM songs s
                        JOIN artists art ON s.artist_id = art.artist_id
                        GROUP BY art.artist
                        ORDER BY song_count DESC, art.artist ASC
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($connection, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td> <?php echo $row["artist"] ?> </td>
                    <td> <?php echo $row["song_count"] ?> </td>
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