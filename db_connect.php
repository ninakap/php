<?php
$host = "db"; // Gebruik de service-naam uit docker-compose.yml
$user = "user"; // Uit docker-compose.yml
$pass = "password"; // Uit docker-compose.yml
$dbname = "mydatabase"; // Uit docker-compose.yml

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>
