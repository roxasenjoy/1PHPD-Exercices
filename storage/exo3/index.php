<?php

// Chemin vers le fichier de journal
$logFile = "logs.txt";

// Capturer les en-têtes de la requête
$headers = getallheaders();

// Capturer le corps de la requête
$content = file_get_contents('php://input');

// Obtenir la date et l'heure actuelles
$date = new DateTime();
$dateFormatted = $date->format('Y-m-d H:i:s');

// Structurer les données de la requête pour le journal
$logEntry = "Date: " . $dateFormatted . PHP_EOL;
$logEntry .= "Headers: " . json_encode($headers) . PHP_EOL;
$logEntry .= "Content: " . $content . PHP_EOL;
$logEntry .= "-----------------------------------" . PHP_EOL;

// Écrire dans le fichier de journal
file_put_contents($logFile, $logEntry, FILE_APPEND);

// Votre logique de script habituelle suit ici

echo "Requête enregistrée.";

?>

<a href="../../../php">Retour</a>
