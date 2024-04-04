<?php
session_start();
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de livraison</title>
</head>
<body>
<h2>Formulaire de livraison</h2>
<?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
<form action="delivery_process.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="address">Adresse :</label>
    <input type="text" id="address" name="address" required><br><br>

    <label for="phone">Téléphone :</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <button type="submit">Envoyer</button>
</form>

<a href="../../../php">Retour</a>
</body>
</html>
