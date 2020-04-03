<?php

    function sanitizeFormUsername($inputText) {
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","", $inputText);
        return $inputText;
    }

    function sanitizeFormString($inputText) {
        $inputText = strip_tags($inputText);
        // $inputText = str_replace(" ","", $inputText);
        // $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    function sanitizeFormPassword($inputText) {
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    if(isset($_POST['registerButton'])){
        // Register button was pressed!

        $username = sanitizeFormUsername($_POST['Username']);
        $firstName = sanitizeFormString($_POST['firstName']);
        $LastName = sanitizeFormString($_POST['LastName']);
        $email = sanitizeFormString($_POST['email']);
        $email2 = sanitizeFormString($_POST['emailConfirm']);
        $password = sanitizeFormPassword($_POST['Password']);
        $password2 = sanitizeFormPassword($_POST['PasswordConfirm']);

        $wasSuccessful = $account->register($username, $firstName, $LastName, $email, $email2, $password, $password2);

        if ($wasSuccessful == true)
        {
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }
    }
?>