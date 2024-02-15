<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "todo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Connexion réussie
    echo "con";
  } catch (PDOException $e) {
    // Erreur de connexion
    echo "Échec de la connexion : " . $e->getMessage();
  }
  