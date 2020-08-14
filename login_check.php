<?php
    if ($_SESSION["user_logged_in"]) {} else {
        header("Location: http://localhost/music_website/login.php");
    }
?>