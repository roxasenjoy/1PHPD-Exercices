<?php
// Démarrage ou reprise de la session
session_start();

// Vérification si un résultat est stocké en session et sauvegarde dans une variable locale
$result = '';
if (isset($_SESSION['result'])) {
    $result = $_SESSION['result'];
    unset($_SESSION['result']); // Effacement du résultat de la session pour éviter l'affichage répété
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Simple Calculator</title>
</head>
<body>
<form method="post" action="calculator_process.php">
    <label for="numbers">Enter numbers (separated by commas):</label>
    <input type="text" id="numbers" name="numbers" required>
    <select name="operation">
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
    </select>
    <button type="submit">Calculate</button>
</form>

<?php
// Affichage du résultat s'il existe
if (!empty($result)) {
    echo "<p>Result: $result</p>";
}
?>


<a href="../../../php">Retour</a>
</body>
</html>
