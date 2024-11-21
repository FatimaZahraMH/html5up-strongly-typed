<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Variables d'environnement
$dbuser = $_ENV['DB_USER'];
$dbpass = $_ENV['DB_PASSWORD'];
$host = $_ENV['DB_HOST'];
$db = $_ENV['DB_NAME'];

// Connexion avec MySQLi
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion MySQLi : " . $mysqli->connect_error);
}

// Configuration supplémentaire
$log_ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Africa/Casablanca");
?>
