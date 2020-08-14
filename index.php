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
                    <th>Title</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Duration</th>
                    <th>Size</th>
                </tr>
                <?php 
                    // Building the query
                    $query = "
                        SELECT s.title, a.album, art.artist, g.genre, GROUP_CONCAT(g.genre SEPARATOR ', ') genre, s.duration, s.size
                        FROM songs s
                        JOIN albums a ON s.album_id = a.album_id
                        JOIN artists art ON s.artist_id = art.artist_id
                        JOIN album_to_genre a2g ON a.album_id = a2g.album_id
                        JOIN genres g ON a2g.genre_id = g.genre_id
                        WHERE 1
                        GROUP BY s.song_id
                        ORDER BY a.album ASC, s.title ASC
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($connection, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td> <?php echo $row["title"]; ?> </td>
                    <td> <?php echo $row["album"]; ?> </td>
                    <td> <?php echo $row["artist"]; ?> </td>
                    <td> <?php echo $row["genre"]; ?> </td>
                    <td> <?php
                        // Formating the time into Hh:Mm:Ss
                        $seconds = round($row["duration"]);
                        echo sprintf('%01d:%02d',($seconds/ 60 % 60), $seconds% 60);
                    ?> </td>
                    <td> <?php echo round($row["size"] / 1024) . " Mb"; ?> </td>
                </tr>
                            <?php
                        }
                    }
                ?>
                <tr>
                    <?php
                        // Building a new query
                        $query = "
                            SELECT COUNT(DISTINCT(s.title)) AS 'song_count', COUNT(DISTINCT(a.album)) AS 'album_count', COUNT(DISTINCT(art.artist)) AS 'artist_count', COUNT(DISTINCT(g.genre)) AS 'genre_count', SUM(s.duration) AS 'total_duration', SUM(s.size) AS 'total_size'
                            FROM songs s
                            JOIN albums a ON s.album_id = a.album_id
                            JOIN artists art ON s.artist_id = art.artist_id
                            JOIN album_to_genre a2g ON a.album_id = a2g.album_id
                            JOIN genres g ON a2g.genre_id = g.genre_id
                        ";
                        // Fetching a single row
                        $response = mysqli_fetch_assoc(mysqli_query($connection, $query));
                    ?>
                    <td> <?php echo $response["song_count"]; ?> </td>
                    <td> <?php echo $response["album_count"]; ?> </td>
                    <td> <?php echo $response["artist_count"]; ?> </td>
                    <td> <?php echo $response["genre_count"]; ?> </td>
                    <td> <?php
                        $seconds = round($response["total_duration"]);
                        echo sprintf('%01d:%02d:%02d', ($seconds / 60 % 60 );
                    ?> </td>
                    <td> <?php echo round($response["total_size"] / 1024) ."Mb"; ?> </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>