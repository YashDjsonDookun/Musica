<<<<<<< HEAD
<?php
    include("./../../config.php");

    if (isset($_POST['songId'])) {
        $songId = $_POST['songId'];
        $query = mysqli_query($conn, "SELECT * FROM songs WHERE id='$songId'");

        $resultArray = mysqli_fetch_array($query);
        echo json_encode($resultArray);
=======
<?php
    include("./../../config.php");

    if (isset($_POST['songId'])) {
        $songId = $_POST['songId'];
        $query = mysqli_query($conn, "SELECT * FROM songs WHERE id='$songId'");

        $resultArray = mysqli_fetch_array($query);
        echo json_encode($resultArray);
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
    }