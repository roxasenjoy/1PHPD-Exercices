<?php
session_start();

// Simuler le hachage d'un mot de passe
$stored_hash = password_hash("password", PASSWORD_DEFAULT);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'user' && password_verify($password, $stored_hash)) {
        // Définir un cookie pour le pseudo qui expire après 1 jour
        setcookie('pseudo', $username, time() + (86400 * 1), "/"); // 86400 = 1 jour

        $_SESSION['login_message'] = "Connexion réussie ! Bonjour, " . htmlspecialchars($username) . ".";
    } else {
        $_SESSION['login_message'] = "Identifiants incorrects.";
    }
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
