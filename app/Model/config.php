<?php

// définir les paramètres de connexion
$host     = getenv('DB_HOST');
$dbname   = getenv('DB_NAME');
$user     = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$port     = getenv('DB_PORT') ?: '5432';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // erreur technique
    error_log("Erreur de connexion : " . $e->getMessage());

    // stopper message utilisateur
    die("Désolé, un problème technique empêche l'accès au service.");
}
