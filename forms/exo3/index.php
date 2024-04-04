<?php
session_start();
$result = '';
if (isset($_SESSION['cipher_result'])) {
    $result = $_SESSION['cipher_result'];
    unset($_SESSION['cipher_result']); // Efface le résultat de la session pour éviter l'affichage répété
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chiffrement de César</title>
</head>
<body>
<h2>Chiffrement de César</h2>
<form method="post" action="cipher_process.php">
    <label for="message">Entrez votre message :</label>
    <input type="text" id="message" name="message" required>
    <label for="shift">Décalage :</label>
    <input type="number" id="shift" name="shift" required>
    <button type="submit">Chiffrer</button>
</form>

<?php
// Affichage du résultat s'il existe
if (!empty($result)) {
    echo "<p>Message chiffré : " . htmlspecialchars($result) . "</p>";
}
?>


<a href="../../../php">Retour</a>

</body>
</html>
