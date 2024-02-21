<?php

class Signup extends dbh {
    protected function checkUser($fullname, $email) {
        $stmt = $this->connect()->prepare("SELECT UserID FROM users WHERE UserID = :UserID AND email = :email;");
        $stmt->bindParam(":UserID", $fullname);
        $stmt->bindParam(":email", $email);

        if (!$stmt->execute($fullname, $email)) {
            $stmt = null;
            header("location:signup.php?error=stmtfailed");
            exit();
        }


        
    }
}