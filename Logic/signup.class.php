<?php
    require_once ('user.class.php');
    require_once ('database.class.php');
    class userRegister extends dbh{
        public $db;

        public function __construct()
        {
            $this->db = new dbh();
        }

        public function registerUser($fullname, $email, $password, $password_repeat){
            $user = new user($fullname, $email, $password, $password_repeat);

            $errors = $user->validate();

            if(!empty($errors)){
                return $errors;
            }

            if($this->userExists($fullname, $email)){
                return "User already exists";
            }
        }

        public function userExists ($fullname, $email){
            $stmt= $this->db->connect()->prepare("SELECT * FROM users WHERE fullname = :fullname || email = :email");

            $stmt-> bindParam(':fullname', $fullname);
            $stmt-> bindParam(':email', $email);

            if($stmt->execute()){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if($user !== false){
                    return "User exists already";
                }else{
                    return null;
                }
            }else{
                "error executing the query";
            }
        }
    }
