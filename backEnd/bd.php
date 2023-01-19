<?php
require_once './configConnection.php';
try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}