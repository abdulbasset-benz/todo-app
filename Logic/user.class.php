<?php

require_once('dbcon.php');

class Signup {

    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password) {
        // Validate and sanitize user input (not shown for brevity)
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function registerUser($conn) {
        // Sanitize and validate input again (optional)
        try {
            // Generate a random salt
            $salt = random_bytes(32);

            // Hash password securely
            $hashed_password = password_hash($this->password . $salt, PASSWORD_BCRYPT);

            // Use prepared statements with parameter binding
            $stmt1 = $conn->prepare("INSERT INTO users (Username, Email) VALUES (?, ?)");
            $stmt1->execute([$this->username, $this->email]);

            $stmt2 = $conn->prepare("INSERT INTO login (PasswordHash, Salt) VALUES (?, ?)");
            $stmt2->execute([$hashed_password, $salt]);

            if ($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0) {
                return "Registration successful";
            } else {
                // Handle unsuccessful registration gracefully
                // (log error, provide clear message to user)
                return "Registration failed.";
            }
        } catch (PDOException $e) {
            // Log error and handle gracefully
            throw new Exception("Error registering user: " . $e->getMessage());
        }
    }
}
