<?php
    if ($_SESSION["admin_logged_in"]) {} else {
        header("Location: http://localhost/music_website/index.php");
    }
?>