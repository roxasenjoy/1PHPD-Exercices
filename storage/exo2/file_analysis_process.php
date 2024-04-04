<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['uploaded_file'])) {
    $file = $_FILES['uploaded_file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $filename = $file['tmp_name'];
        $content = file_get_contents($filename);

        // Calculer la taille du fichier et stocker dans la session
        $_SESSION['fileSize'] = filesize($filename);

        // Compter les occurrences de chaque caractère
        $charCount = count_chars($content, 1);
        $analysisResult = "<h3>Occurrence de chaque caractère :</h3>";
        foreach ($charCount as $char => $count) {
            $analysisResult .= "'" . chr($char) . "' : $count fois<br>";
        }
        $_SESSION['analysisResult'] = $analysisResult;
        $_SESSION['message'] = "Analyse terminée.";
    } else {
        $_SESSION['message'] = "Erreur lors du téléchargement du fichier.";
    }
    header('Location: index.php');
    exit();
} else {
    $_SESSION['message'] = "Aucun fichier téléchargé.";
    header('Location: index.php');
    exit();
}
