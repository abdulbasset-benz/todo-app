<?php

class User {
    private $fullname;
    private $email;
    private $password;
    private $password_repeat;
    private $errors = [];

    public function __construct($fullname, $email, $password, $password_repeat) {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->password_repeat = $password_repeat;
    }

    public function validate() {
        $this->validateName($this->fullname);
        $this->validateEmail($this->email);
        $this->validatePassword($this->password, $this->password_repeat);
    }

    private function validateName($fullname) {
        if(empty($fullname)) {
            $this->errors[] = "Full name cannot be empty";
        }
    }

    private function validateEmail($email) {
        if(empty($email)) {
            $this->errors[] = "Email cannot be empty";
            return;
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Email must be valid";
        }
    }

    private function validatePassword($password, $password_repeat) {
        if(strlen($password) < 8) {
            $this->errors[] = "Password must be at least 8 characters long";
        }

        if (!preg_match("/^(?=.*[a-z])(?=.*[0-9]).+$/i", $password)) {
            $this->errors[] = "Password must contain at least one letter and one number";
        }
        
        if($password !== $password_repeat) {
            $this->errors[] = "Passwords must match";
        }
    }

    public function getErrors() {
        return $this->errors;
    }
}

?>
