<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion avec compteur d'échecs</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['login_message'])) {
    echo "<p>" . $_SESSION['login_message'] . "</p>";
    unset($_SESSION['login_message']);
}

if (isset($_SESSION['failed_attempts'])) {
    echo "<p>Nombre de tentatives échouées : " . $_SESSION['failed_attempts'] . "</p>";
}
?>
<form action="login_process.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<a href="../../../php">Retour</a>
</body>
</html>
