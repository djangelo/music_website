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
                    <th>Albums</th>
                    <th>Songs</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT art.artist, COUNT(a.album_id) AS 'album_count', COUNT(s.song_id) AS 'song_count'
                        FROM songs as s
                        JOIN albums as a ON s.album_id = a.album_id
                        JOIN artists as art ON s.artist_id = art.artist_id
                        JOIN album_to_genre a2g ON a.album_id = a2g.album_id
                        JOIN genres g ON a2g.genre_id = g.genre_id
                        GROUP BY art.artist
                        HAVING COUNT(a.album_id > 0)
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($connection, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td> <?php echo $row["artist"] ?> </td>
                    <td> <?php echo $row["album_count"] ?> </td>
                    <td> <?php echo $row["song_count"] ?> </td>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>