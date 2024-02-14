<?php
    require_once('dbcon.php');

    class user{
        private $fullname;
        private $email;
        private $password;
        private $password_repeat;

        public function __construct($fullname, $email, $password, $password_repeat)
        {
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->password_repeat = $password_repeat;
        }

        function validateName($fullname){
            if(empty($name)){
                return "name is required!";
            }
            return "";
        }

        function validateEmail($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return "valid email is required!";
            }
            return "";
        }
    }
?>