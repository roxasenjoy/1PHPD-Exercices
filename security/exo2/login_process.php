<?php
session_start();

// Simule une valeur de hash récupérée depuis une base de données pour l'utilisateur "user"
// Le mot de passe "password" est haché pour cet exemple
// Dans la vraie vie, ce hachage serait stocké en base de données après l'enregistrement de l'utilisateur
$stored_hash = password_hash("password", PASSWORD_DEFAULT); // Hachage du mot de passe

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie si le nom d'utilisateur est "user" et si le mot de passe correspond au hachage stocké
    if ($username === 'user' && password_verify($password, $stored_hash)) {
        $_SESSION['login_message'] = "Connexion réussie !";
    } else {
        $_SESSION['login_message'] = "Identifiants incorrects.";
    }
}

header('Location: index.php');
exit();
