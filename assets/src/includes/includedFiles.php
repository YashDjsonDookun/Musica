<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
    {
        include("assets/src/includes/config.php");
        include("assets/src/includes/classes/Artist.php");
        include("assets/src/includes/classes/Album.php");
        include("assets/src/includes/classes/Song.php");
    }
    else
    {
        include("assets/src/includes/header.php");
        include("assets/src/includes/footer.php");

        $url = $_SERVER['REQUEST_URI'];
        echo "<script>openPage('$url')</script>";
        exit();
    }