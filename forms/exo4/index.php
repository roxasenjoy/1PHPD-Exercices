<?php
session_start(); // Assurez-vous que cette ligne est au début du fichier
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Upload d'image</title>
</head>
<body>
<h2>Télécharger une image</h2>
<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Supprime le message de la session après l'affichage
}
?>
<form action="image_process.php" method="post" enctype="multipart/form-data">
    Sélectionnez l'image à télécharger :
    <input type="file" name="uploaded_image" id="uploaded_image" required>
    <button type="submit">Télécharger</button>
</form>

<a href="../../../php">Retour</a>
</body>
</html>
