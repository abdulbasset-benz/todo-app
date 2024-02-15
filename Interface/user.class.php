<?php
    require_once('dbcon.php');

    class user{
        private $fullname;
        private $email;
        private $password;
        private $errors = [];

        public function __construct($fullname, $email, $password, $errors){
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->errors = $errors;
        }

            function validateName($fullname){
                if(empty($fullname)){
                    $this->errors = "name is required!";
                }
                return "";
            }

            function validateEmail($email){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
                    return $sanitizedEmail;
                }else{
                    $this->errors ="Email must be valid!";
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
    }
?>