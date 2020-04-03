<!DOCTYPE html>
<?php
    include("assets/src/includes/config.php");
    include("assets/src/includes/classes/Account.php");
    include("assets/src/includes/classes/Constants.php");
    $account = new Account($conn);
    include("assets/src/includes/handlers/registerHandler.php");
    include("assets/src/includes/handlers/loginHandler.php");
    function getInputValue($name)
    {
        if (isset($_POST[$name]))
        {
            echo $_POST[$name];
        }
    }
?>
<html>
    <head>
        <title>Welcome to Slotify!</title>
        <link rel="stylesheet" href="assets/css/register.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="assets/js/register.js"></script>
    </head>
    <body>
        <?php
            if(isset($_POST['registerButton'])) {
                echo '<script>
                        $(document).ready(function() {
                            $("#loginForm").hide();
                            $("#registerForm").show();
                        });
                    </script>';
            }
            else {
                echo '<script>
                        $(document).ready(function() {
                            $("#loginForm").show();
                            $("#registerForm").hide();
                        });
                    </script>';
            }
        ?>
        <div id="background">
            <div id="loginContainer">
                <div id="inputContainer">
                    <form id="loginForm" action="register.php" method="POST">
                        <h2>Login to your account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$loginFailed); ?>
                            <label for="loginUsername">Username</label>
                            <input type="text" id="loginUsername" name="loginUsername" placeholder="e.g, DonaldTrump69" required>
                        </p>
                        <p>
                            <label for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
                        </p>
                        <button type="submit" name="loginButton">Log In</button>
                        <div class="hasAccountText">
                            <span id="hideLogin">Don't have an account yet? Signup here.</span>
                        </div>
                    </form>
                    <form id="registerForm" action="register.php" method="POST">
                        <h2>Create your free account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <?php echo $account->getError(Constants::$usernameTaken); ?>
                            <label for="Username">Username</label>
                            <input type="text" id="Username" value="<?php getInputValue('Username') ?>" name="Username" placeholder="e.g, DonaldTrump69" required>
                        </p>
                        <p>
                            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" value="<?php getInputValue('firstName') ?>" name="firstName" placeholder="e.g, Donald" required>
                        </p>
                        <p>
                            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                            <label for="LastName">Last Name</label>
                            <input type="text" id="LastName" name="LastName" value="<?php getInputValue('LastName') ?>" placeholder="e.g, Trump" required>
                        </p>
                        <p>
                            <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                            <?php echo $account->getError(Constants::$emailIsInvalid); ?>
                            <?php echo $account->getError(Constants::$emailTaken); ?>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php getInputValue('email') ?>" placeholder="e.g, Donald.Trump69@gmail.com" required>
                        </p>
                        <p>
                            <label for="emailConfirm">Confirm Email</label>
                            <input type="email" id="emailConfirm" name="emailConfirm" value="<?php getInputValue('emailConfirm') ?>" placeholder="e.g, Donald.Trump69@gmail.com" required>
                        </p>
                        <p>
                            <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                            <?php echo $account->getError(Constants::$passwordsCharacters); ?>
                            <?php echo $account->getError(Constants::$passwordsNotAlphaNumeric); ?>
                            <label for="Password">Password</label>
                            <input type="password" id="Password" name="Password" placeholder="Password" required>
                        </p>
                        <p>
                            <label for="PasswordConfirm">Confirm Password</label>
                            <input type="password" id="PasswordConfirm" name="PasswordConfirm" placeholder="Password" required>
                        </p>
                        <button type="submit" name="registerButton">Sign Up</button>
                        <div class="hasAccountText">
                            <span id="hideRegister">Already have an account? Log in here.</span>
                        </div>
                    </form>
                </div>
                <div id="loginText">
                    <h1>Get great music, right now</h1>
                    <h2>Listen to loads of songs for free</h2>
                    <ul>
                        <li>Discover music you'll fall in love with</li>
                        <li>Create your own playlists</li>
                        <li>Follow artists to keep up to date</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>