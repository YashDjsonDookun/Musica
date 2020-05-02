<<<<<<< HEAD
<?php
include("./../../config.php");

if (isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    $query = mysqli_query($conn, "UPDATE songs SET plays = plays + 1 WHERE id='$songId'");
=======
<?php
include("./../../config.php");

if (isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    $query = mysqli_query($conn, "UPDATE songs SET plays = plays + 1 WHERE id='$songId'");
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
}