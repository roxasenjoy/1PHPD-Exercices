<?php
session_start();
$uploadDirectory = "uploads/";

// Assurez-vous que le répertoire de téléchargement existe
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

$files = ['file1', 'file2'];
$messages = [];

foreach ($files as $file) {
    if (isset($_FILES[$file]) && $_FILES[$file]['error'] == 0) {
        $originalName = $_FILES[$file]['name'];
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        // Générer un nom de fichier unique pour éviter les écrasements
        $renamedFile = $uploadDirectory . uniqid($file . '_', true) . '.' . $extension;

        if (move_uploaded_file($_FILES[$file]['tmp_name'], $renamedFile)) {
            $messages[] = htmlspecialchars($originalName) . " a été téléchargé et renommé en " . basename($renamedFile);
        } else {
            $messages[] = "Erreur lors du téléchargement de " . htmlspecialchars($originalName);
        }
    }
}

$_SESSION['file_upload_messages'] = $messages;
header('Location: index.php');
