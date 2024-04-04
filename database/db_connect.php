<?php
$host = 'localhost'; // ou l'adresse IP du serveur de base de données
$dbname = 'php'; // Nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur pour la base de données
$password = ''; // Remplacez par votre mot de passe pour la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
}
?>
