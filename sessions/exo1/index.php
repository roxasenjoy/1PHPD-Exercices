<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<?php
if (isset($_COOKIE['pseudo'])) {
    echo "<p>Bonjour, " . htmlspecialchars($_COOKIE['pseudo']) . "! Vous êtes déjà connecté.</p>";
} else {
    echo '<h2>Connexion</h2>
    <form action="login_process.php" method="post">
        <label for="username">Nom d\'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>';
}
?>

<a href="../../../php">Retour</a>
</body>
</html>
