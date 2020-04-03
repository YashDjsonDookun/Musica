<?php
    include("assets/src/includes/config.php");
    include("assets/src/includes/classes/Artist.php");
    include("assets/src/includes/classes/Album.php");
    include("assets/src/includes/classes/Song.php");
	
	/* Kill Session */
//	session_destroy();
	if(isset($_SESSION['userLoggedIn']))
	{
		$userLoggedIn = $_SESSION['userLoggedIn'];
        echo "
            <script>userLoggedIn = '$userLoggedIn';</script>
        ";
	}
	else
	{
		header("Location: register.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome To Musica!</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/script.js"></script>
	</head>
	<body>
		<div id="mainContainer">
			<div id="topContainer">
				<?php include "./assets/src/includes/navBarContainer.php"; ?>
				<div id="mainViewContainer">
					<div id="mainContent">