<?php

class Signup extends Dbh {
    protected function checkUser($fullname, $email) {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE fullname = :fullname AND email = :email");
        $stmt->bindParam(":fullname", $fullname); // Assume proper PDO binding
        $stmt->bindParam(":email", $email);

        $stmt->execute(); // Run the query

        if ($stmt->rowCount() > 0) {
            // User exists
            return true;
        } else {
            // User not found
            return false;
        }
    }
}