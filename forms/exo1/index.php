<?php
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $start = filter_input(INPUT_GET, 'start', FILTER_VALIDATE_INT); // ou $_GET['start']
    $end = filter_input(INPUT_GET, 'end', FILTER_VALIDATE_INT); // ou $_GET['end']

    if ($start > 0 && $end > 0 && $end >= $start) {
        for ($i = $start; $i <= $end; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $result .= "FizzBuzz ";
            } elseif ($i % 3 == 0) {
                $result .= "Fizz ";
            } elseif ($i % 5 == 0) {
                $result .= "Buzz ";
            } else {
                $result .= $i . " ";
            }
        }
    } else {
        $result = "Veuillez entrer des nombres valides (supérieurs à 0, 'fin' >= 'début').";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FizzBuzz Form</title>
</head>
<body>
<form method="get" action="index.php">
    <label for="start">Nombre de début:</label>
    <input type="number" id="start" name="start" min="1" required>
    <label for="end">Nombre de fin:</label>
    <input type="number" id="end" name="end" min="1" required>
    <button type="submit">Exécuter FizzBuzz</button>
</form>




<?php
// Affiche le résultat si disponible
if (!empty($result)) {
    echo "<p>Résultat du FizzBuzz : $result</p>";
}
?>


<a href="../../../php">Retour</a>
</body>
</html>
