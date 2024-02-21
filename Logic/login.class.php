<?php
require_once('database.class.php');
require_once('user.class.php');

class loginUser extends dbh
{
    private $db;

    public function __construct()
    {
        $this->db = new dbh();
    }

    public function login($fullname, $email, $password)
    {
        try {
            $stmt = $this->db->connect()->prepare("SELECT UserID, Username, Email, PasswordHash FROM users WHERE Username = :fullname OR Email = :email"); // Assuming your table is called 'users'

            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

                
                if (password_verify($password, $userRow['PasswordHash'])) {
                    
                    header("location : index.php");
                } else {
                    
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            
            return ['error' => 'Database error: ' . $e->getMessage()];  
        }
    }
}
