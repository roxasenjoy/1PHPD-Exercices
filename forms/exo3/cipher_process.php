<?php
session_start();

function cesarCipher($message, $shift) {
    $cipherText = '';
    $length = strlen($message);

    for ($i = 0; $i < $length; $i++) {
        $char = $message[$i];

        if (ctype_alpha($char)) {
            $case = ctype_upper($char) ? 'A' : 'a';
            $cipherText .= chr((ord($char) + $shift - ord($case)) % 26 + ord($case));
        } else {
            $cipherText .= $char; // Ajoute le caractère non alphabétique tel quel
        }
    }

    return $cipherText;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message']) && isset($_POST['shift'])) {
    $message = $_POST['message'];
    $shift = intval($_POST['shift']);
    $_SESSION['cipher_result'] = cesarCipher($message, $shift);
}

header('Location: index.php');
exit();
