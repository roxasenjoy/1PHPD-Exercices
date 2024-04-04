<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<?php
session_start();
if (isset($_SESSION['login_message'])) {
    echo "<p>" . $_SESSION['login_message'] . "</p>";
    unset($_SESSION['login_message']);
}
?>

<p>Utilisateur : user</p>
<p>Mot de passe : password</p>


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
