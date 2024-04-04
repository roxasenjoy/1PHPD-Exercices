<?php
session_start(); // Démarre une nouvelle session ou reprend une session existante

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['uploaded_image'])) {
    // Configuration
    $targetDirectory = "img/";
    $targetFile = $targetDirectory . basename($_FILES['uploaded_image']['name']);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une image
    $check = getimagesize($_FILES['uploaded_image']['tmp_name']);
    if ($check !== false) {
        $uploadOk = true;
    } else {
        $_SESSION['message'] = "Le fichier n'est pas une image.";
        $uploadOk = false;
    }

    // Vérifie si $uploadOk est défini sur 0 par une erreur
    if ($uploadOk == false) {
        $_SESSION['message'] = "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true); // Crée le dossier s'il n'existe pas
        }
        if (move_uploaded_file($_FILES['uploaded_image']['tmp_name'], $targetFile)) {
            $_SESSION['message'] = "Le fichier " . htmlspecialchars(basename($_FILES['uploaded_image']['name'])) . " a été téléchargé.";
        } else {
            $_SESSION['message'] = "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
    header('Location: index.php'); // Redirige l'utilisateur vers index.php
    exit();
} else {
    $_SESSION['message'] = "Aucun fichier envoyé.";
    header('Location: index.php'); // Redirige l'utilisateur vers index.php
    exit();
}
?>
