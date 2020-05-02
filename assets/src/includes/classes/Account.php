<<<<<<< HEAD
<?php
    class Account {

        private $conn;
        private $errorArray;

        public function __construct($conn)
        {
            $this->conn = $conn;
            $this->errorArray = array();
        }

        public function login($un, $pw)
        {
            $pw = md5($pw);

            $query = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

            if (mysqli_num_rows($query) == 1)
            {
                return true;
            }
            else
            {
                array_push($this->errorArray, Constants::$loginFailed);
            }
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2)
        {
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateLastname($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if (empty($this->errorArray))
            {
                // Insert into db
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
            }
            else
            {
                return false;
            }
        }

        public function getError($error)
        {
            if(!in_array($error, $this->errorArray))
            {
                $error = "";
            }
            return "<span class='erroMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw)
        {
            $encryptedPassword = md5($pw);
            $profilePic = "./../../../images/profile_pics/head_emerald.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->conn, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPassword', '$date', '$profilePic')");
            return $result;
        }

        private function validateUsername($un)
        {
            if (strlen($un) > 25 || strlen($un) < 5)
            {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            $checkUsernameQuery = mysqli_query($this->conn, "SELECT username FROM users WHERE username='$un'");
            if (mysqli_num_rows($checkUsernameQuery) != 0)
            {
                array_push($this->errorArray, Constants::$usernameTaken);
            }
        }

        private function validateFirstname($fn)
        {
            if (strlen($fn) > 25 || strlen($fn) < 2)
            {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }

        private function validateLastname($ln)
        {
            if (strlen($ln) > 25 || strlen($ln) < 2)
            {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }

        private function validateEmails($em, $em2)
        {
            if ($em != $em2)
            {
                array_push($this->errorArray,Constants::$emailsDoNotMatch);
                return;
            }
            if (!filter_var($em, FILTER_VALIDATE_EMAIL))
            {
                array_push($this->errorArray,Constants::$emailIsInvalid);
                return;
            }

            $checkEmailQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$em'");
            if (mysqli_num_rows($checkEmailQuery) != 0)
            {
                array_push($this->errorArray, Constants::$emailTaken);
            }
        }

        private function validatePasswords($pw, $pw2)
        {
            if ($pw != $pw2)
            {
                array_push($this->errorArray,Constants::$passwordsDoNotMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/',$pw))
            {
                array_push($this->errorArray,Constants::$passwordsNotAlphaNumeric);
                return;
            }

            if (strlen($pw) > 30 || strlen($pw) < 5)
            {
                array_push($this->errorArray, Constants::$passwordsCharacters);
                return;
            }
        }
    }
=======
<?php
    class Account {

        private $conn;
        private $errorArray;

        public function __construct($conn)
        {
            $this->conn = $conn;
            $this->errorArray = array();
        }

        public function login($un, $pw)
        {
            $pw = md5($pw);

            $query = mysqli_query($this->conn, "SELECT * FROM users WHERE username='$un' AND password='$pw'");

            if (mysqli_num_rows($query) == 1)
            {
                return true;
            }
            else
            {
                array_push($this->errorArray, Constants::$loginFailed);
            }
        }

        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2)
        {
            $this->validateUsername($un);
            $this->validateFirstname($fn);
            $this->validateLastname($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if (empty($this->errorArray))
            {
                // Insert into db
                return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
            }
            else
            {
                return false;
            }
        }

        public function getError($error)
        {
            if(!in_array($error, $this->errorArray))
            {
                $error = "";
            }
            return "<span class='erroMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw)
        {
            $encryptedPassword = md5($pw);
            $profilePic = "./../../../images/profile_pics/head_emerald.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->conn, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPassword', '$date', '$profilePic')");
            return $result;
        }

        private function validateUsername($un)
        {
            if (strlen($un) > 25 || strlen($un) < 5)
            {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            $checkUsernameQuery = mysqli_query($this->conn, "SELECT username FROM users WHERE username='$un'");
            if (mysqli_num_rows($checkUsernameQuery) != 0)
            {
                array_push($this->errorArray, Constants::$usernameTaken);
            }
        }

        private function validateFirstname($fn)
        {
            if (strlen($fn) > 25 || strlen($fn) < 2)
            {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }

        private function validateLastname($ln)
        {
            if (strlen($ln) > 25 || strlen($ln) < 2)
            {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }

        private function validateEmails($em, $em2)
        {
            if ($em != $em2)
            {
                array_push($this->errorArray,Constants::$emailsDoNotMatch);
                return;
            }
            if (!filter_var($em, FILTER_VALIDATE_EMAIL))
            {
                array_push($this->errorArray,Constants::$emailIsInvalid);
                return;
            }

            $checkEmailQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email='$em'");
            if (mysqli_num_rows($checkEmailQuery) != 0)
            {
                array_push($this->errorArray, Constants::$emailTaken);
            }
        }

        private function validatePasswords($pw, $pw2)
        {
            if ($pw != $pw2)
            {
                array_push($this->errorArray,Constants::$passwordsDoNotMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/',$pw))
            {
                array_push($this->errorArray,Constants::$passwordsNotAlphaNumeric);
                return;
            }

            if (strlen($pw) > 30 || strlen($pw) < 5)
            {
                array_push($this->errorArray, Constants::$passwordsCharacters);
                return;
            }
        }
    }
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
?>