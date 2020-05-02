<<<<<<< HEAD
<?php

include("./../../config.php");

if (isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];
    $query = mysqli_query($conn, "SELECT * FROM albums WHERE id='$albumId'");

    $resultArray = mysqli_fetch_array($query);
    echo json_encode($resultArray);
=======
<?php

include("./../../config.php");

if (isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];
    $query = mysqli_query($conn, "SELECT * FROM albums WHERE id='$albumId'");

    $resultArray = mysqli_fetch_array($query);
    echo json_encode($resultArray);
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
}