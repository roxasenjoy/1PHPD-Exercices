<?php
global $pdo;
require 'db_connect.php';

if (isset($_POST['email'], $_POST['pseudo'], $_POST['password'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $description = isset($_POST['description']) ? $_POST['description'] : ''; // Optionnel

    // Vérifier si l'email ou le pseudo existe déjà
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE email = ? OR pseudo = ?");
    $stmt->execute([$email, $pseudo]);
    $exists = $stmt->fetchColumn() > 0;

    if ($exists) {
        $message = "L'email ou le pseudo existe déjà.";
    } else {
        // Insérer le nouvel utilisateur
        $stmt = $pdo->prepare("INSERT INTO user (email, pseudo, password, description) VALUES (?, ?, ?, ?)");
        try {
            $pdo->beginTransaction();
            $stmt->execute([$email, $pseudo, $password, $description]);
            $pdo->commit();
            $message = "Utilisateur créé avec succès.";
        } catch (Exception $e) {
            $pdo->rollback();
            $message = "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
        }
    }
} else {
    $message = "Toutes les informations requises ne sont pas fournies.";
}

header("Location: index.php?message=" . urlencode($message));
