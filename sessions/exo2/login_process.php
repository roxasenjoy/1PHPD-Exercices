<?php
session_start();

// Simule le hachage d'un mot de passe pour l'utilisateur "user"
$stored_hash = password_hash("password", PASSWORD_DEFAULT);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simule une vérification des identifiants
    if ($username === 'user' && password_verify($password, $stored_hash)) {
        $_SESSION['login_message'] = "Connexion réussie !";
        $_SESSION['failed_attempts'] = 0; // Réinitialise le compteur d'échecs
    } else {
        $_SESSION['login_message'] = "Identifiants incorrects.";
        // Incrémente le compteur d'échecs
        if (isset($_SESSION['failed_attempts'])) {
            $_SESSION['failed_attempts']++;
        } else {
            $_SESSION['failed_attempts'] = 1;
        }
    }
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
