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

            // validate user information
            $errors = $user->validate();

            // hash the password for more security
            $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

            // error handling
            if(!empty($errors)){
                return $errors;
            }

            // check if user exists inside the database
            if($this->userExists($fullname, $email)){
                return "User already exists";
            }
            
            // if it doesn't exist , execute this query

            try {
                $stmt = $this->db->connect()->prepare("INSERT INTO users (Username, Email, PasswordHash) VALUES (:fullname, :email, :hash)");

                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':hash', $hash);

                if($stmt->execute()){
                    return "User registered successfully";
                }else{
                    return "Error registering user";
                }

            }catch (PDOException $e){
                return "Error: " . $e->getMessage();
            }
        }

        public function userExists ($fullname, $email){
            $stmt= $this->db->connect()->prepare("SELECT * FROM users WHERE Username = :fullname OR email = :email");

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
