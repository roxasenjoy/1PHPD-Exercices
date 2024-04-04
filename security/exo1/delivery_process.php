<?php
session_start();

function validateLatinName($name) {
    return preg_match('/^[a-zA-ZÀ-ÿ\- ]+$/', $name);
}

function validateFrenchAddress($address) {
    // Cette expression régulière est très basique, il est possible d'avoir quelque chos de plus complexe
    return preg_match('/^[0-9a-zA-ZÀ-ÿ\- ,\']+$/', $address);
}

function validatePhone($phone) {
    // Validation basique de numéro de téléphone français
    return preg_match('/^(\+33|0)[1-9](\d{2}){4}$/', $phone);
}

if (isset($_POST['name'], $_POST['address'], $_POST['phone'], $_POST['email'])) {
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    if (!validateLatinName($name)) {
        $_SESSION['message'] = "Le nom doit être en caractères latins uniquement.";
    } elseif (!validateFrenchAddress($address)) {
        $_SESSION['message'] = "L'adresse doit être valide et française.";
    } elseif (!validatePhone($phone)) {
        $_SESSION['message'] = "Le numéro de téléphone n'est pas valide.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "L'adresse email n'est pas valide.";
    } else {
        $_SESSION['message'] = "Toutes les données sont valides. Formulaire soumis avec succès.";
    }
}

header('Location: index.php');
exit();
