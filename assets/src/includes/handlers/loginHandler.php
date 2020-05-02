<<<<<<< HEAD
<?php
    if(isset($_POST['loginButton'])){
        // Login button was pressed!
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        // Login Function
        $result = $account->login($username, $password);

        if ($result == true)
        {
        	$_SESSION['userLoggedIn'] = $username;
        	header("Location: index.php");
        }
    }
=======
<?php
    if(isset($_POST['loginButton'])){
        // Login button was pressed!
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        // Login Function
        $result = $account->login($username, $password);

        if ($result == true)
        {
        	$_SESSION['userLoggedIn'] = $username;
        	header("Location: index.php");
        }
    }
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
?>