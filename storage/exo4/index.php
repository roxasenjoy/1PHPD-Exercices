<?php

// Définir le chemin vers le fichier source et le fichier de destination
$sourceFile = "original_book.txt"; // Assurez-vous que ce fichier existe dans votre répertoire
$destinationFile = "capitalized_book.txt";

// Vérifier si le fichier source existe
if (!file_exists($sourceFile)) {
    die("Le fichier source n'existe pas.");
}

// Lire le contenu du fichier source
$content = file_get_contents($sourceFile);

// Capitaliser chaque mot du contenu
$capitalizedContent = ucwords($content);

// Écrire le contenu modifié dans le fichier de destination
if (file_put_contents($destinationFile, $capitalizedContent)) {
    echo "Le fichier a été créé avec succès et le contenu modifié a été enregistré dans '$destinationFile'.";
} else {
    echo "Une erreur est survenue lors de l'écriture dans le fichier de destination.";
}


?>

<a href="../../../php">Retour</a>
