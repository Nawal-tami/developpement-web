<?php
// Informations de connexion
$host = "localhost"; // Adresse du serveur (ex: localhost)
$username = "root"; // Nom d'utilisateur MySQL
$password = "Nawal987"; // Mot de passe MySQL
$database = "form"; // Nom de la base de données

try {
    // Création de la connexion avec PDO
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // Gestion des erreurs
    die("Échec de la connexion : " . $e->getMessage());
}
?>