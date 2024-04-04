<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Télécharger et Analyser un Fichier</title>
</head>
<body>
<h2>Télécharger un fichier pour analyse</h2>
<?php
// Afficher le message et les résultats de l'analyse s'ils existent
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}

if (isset($_SESSION['analysisResult'])) {
    echo $_SESSION['analysisResult'];
    unset($_SESSION['analysisResult']);
}

if (isset($_SESSION['fileSize'])) {
    echo "<p>Taille du fichier : " . $_SESSION['fileSize'] . " octets</p>";
    unset($_SESSION['fileSize']);
}
?>
<form action="file_analysis_process.php" method="post" enctype="multipart/form-data">
    Sélectionnez un fichier à analyser :
    <input type="file" name="uploaded_file" required><br><br>
    <button type="submit">Analyser le fichier</button>
</form>

<a href="../../../php">Retour</a>
</body>
</html>
