<div id="sidebar">
    <h1 class="title">Music</h1>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="albums.php">Albums</a></li>
        <li><a href="artists.php">Artists</a></li>
        <?php
            if (isset($_SESSION["admin_logged_in"]) and ($_SESSION["admin_logged_in"])) {
                ?>
        <li><a href="admin.php">Admin</a></li>
                <?php
            }
        ?>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>