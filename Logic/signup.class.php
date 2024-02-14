<?php
    require_once('dbcon.php');

    class user{
        private $fullname;
        private $email;
        private $password;
        private $password_repeat;

        public function __construct($fullname, $email, $password, $password_repeat){
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->password_repeat = $password_repeat;
        }

            function validateName($fullname){
                if(empty($fullname)){
                    return "name is required!";
                }
                return "";
            }

            function validateEmail($email){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
                    return $sanitizedEmail;
                }else{
                    return "Email must be valid!";
                }
            }

            function validatePassword ($password, $password_repeat){
                $errors = [];
                if(strlen($password) > 8){
                    $errors[] = "Password must be at least 8 characters long";
                }

                if (!preg_match("/^(?=.*[a-z])(?=.*[0-9]).+$/i", $password)) {
                    $errors[] = "Password must contain at least one letter and one number";
                }
                
                if($password !== $password_repeat){
                    $errors[] = "Passwords must match";
                }
                return $errors;
            }

            function createUser($fullname, $email, $password, $password_repeat){
                try {
                    $pdo = require __DIR__ ."/dbcon.php";
                    $hash = password_hash($password, PASSWORD_BCRYPT,['cost' => 12]);

                    $sql1 = "INSERT INTO users (Username,Email) VALUES (? , ?);";
                    $sql2 = "INSERT INTO login (UserID,PasswordHash) VALUES (? , ?);";
                } catch
            }
        

    }
?>