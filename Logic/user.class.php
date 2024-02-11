<?php

require_once('dbcon.php');

class signup {
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function registerUser($username, $email, $password){
        global $conn;
        if((empty($this->username)) ||(empty($this->email)) || (empty($this->password))) {
            $salt = bin2hex(random_bytes(32));
            $hashed_password = hash('sha256', $this->password . $salt);

            $sql1 = "INSERT INTO users (Username, Email) VALUES (:username , :email);";
            $sql2 = "INSERT INTO login (PasswordHash) VALUES (:password , :hash);";

            $stmt1 = $conn->prepare($sql1);
            $stmt1->bindParam(':username',$this->username);
            $stmt1->bindParam(':email',$this->email);

            $stmt2 = $conn->prepare($sql2);
            $stmt2->bindParam(':password', $hashed_password);
            $stmt2->bindParam(':salt', $salt);

            $stmt1->execute();
            $stmt2->execute();

            if($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0){
                return "registration successful";
            } else {
                return "registration Failed";
            }
        }
    }

}