<?php
// Localhost credentials for Laragon
$host = 'localhost';
$db   = 'jakes_coffee';
$user = 'root';
$pass = ''; // Leave blank for Laragon/XAMPP defaults
$port = '3306';

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Local Connection Failed: " . $e->getMessage());
}
?>