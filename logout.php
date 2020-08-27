<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/music_website/login.php");
?>