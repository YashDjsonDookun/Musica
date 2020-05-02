<<<<<<< HEAD
<?php
	session_start();
    ob_start();
    $timezone = date_default_timezone_set("Indian/Mauritius");

    $conn = mysqli_connect("localhost", "root", "", "musica");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect". mysqli_connect_errno();
    }
=======
<?php
	session_start();
    ob_start();
    $timezone = date_default_timezone_set("Indian/Mauritius");

    $conn = mysqli_connect("localhost", "root", "", "slotify");

    if (mysqli_connect_errno())
    {
        echo "Failed to connect". mysqli_connect_errno();
    }
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
?>