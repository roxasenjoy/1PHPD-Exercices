<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

require 'db_connect.php';

$user_id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
$stmt->execute([$user_id]);

unset($_GET['id']); // Déconnexion de l'utilisateur

// Redirection vers index.php avec un message de succès
header("Location: index.php?message=Utilisateur avec l'id $user_id supprimé avec succès");
exit();
?>
