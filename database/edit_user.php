<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

require 'db_connect.php';

$user_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT email, pseudo, description FROM user WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit();
}

// Vérifier si les données sont présentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['pseudo'], $_POST['description'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $description = $_POST['description'];

    // Mettre à jour l'utilisateur dans la base de données
    $stmt = $pdo->prepare("UPDATE user SET email = ?, pseudo = ?, description = ? WHERE id = ?");
    try {
        $stmt->execute([$email, $pseudo, $description, $user_id]);
        // Rediriger vers la page de profil de l'utilisateur ou une autre page
        header("Location: index.php?message=Profil mis à jour avec succès");
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur
        echo "Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'utilisateur</title>
</head>
<body>
<h2>Modifier l'utilisateur</h2>
<form action="" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user['pseudo']) ?>" required><br><br>
    <label for="description">Description :</label>
    <textarea id="description" name="description"><?= htmlspecialchars($user['description']) ?></textarea><br><br>
    <button type="submit">Mettre à jour</button>
</form>
</body>
</html>
