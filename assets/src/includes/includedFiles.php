<?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
    {
        include("assets/src/includes/config.php");
        include("assets/src/includes/classes/User.php");
        include("assets/src/includes/classes/Artist.php");
        include("assets/src/includes/classes/Album.php");
        include("assets/src/includes/classes/Song.php");
        include("assets/src/includes/classes/Playlist.php");

        if (isset($_GET['userLoggedIn']))
        {
            $userLoggedIn = new User($conn, $_GET['userLoggedIn']);
        }
        else {
            echo "Username variable was not passed into page. Check the openPage JS function";
            exit;
        }
    }
    else
    {
        include("assets/src/includes/header.php");
        include("assets/src/includes/footer.php");

        $url = $_SERVER['REQUEST_URI'];
        echo "<script>openPage('$url')</script>";
        exit();
    }