<?php
$filename = "book.txt"; // Remplacez par le chemin de votre fichier

// Vérifier si le fichier existe
if (!file_exists($filename)) {
    die("Le fichier $filename n'existe pas.");
}

// Lire le contenu du fichier
$content = file_get_contents($filename);

// Supprimer tout ce qui n'est pas une lettre
$cleanedContent = preg_replace("/[^a-zA-Z]/", "", $content);

// Convertir le texte en minuscules pour ignorer la casse
$cleanedContent = strtolower($cleanedContent);

// Initialiser un tableau pour compter les occurrences de chaque lettre
$letterCount = array_fill_keys(range('a', 'z'), 0);

// Compter les occurrences de chaque lettre
foreach (str_split($cleanedContent) as $letter) {
    if (isset($letterCount[$letter])) {
        $letterCount[$letter]++;
    }
}

// Afficher le nombre d'occurrences de chaque lettre
foreach ($letterCount as $letter => $count) {
    echo "Lettre '$letter' : $count fois<br>";
}

?>

<a href="../../../php">Retour</a>
