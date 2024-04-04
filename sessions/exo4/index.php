<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Téléchargement de documents</title>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['file_upload_messages'])) {
    foreach ($_SESSION['file_upload_messages'] as $message) {
        echo "<p>$message</p>";
    }
    unset($_SESSION['file_upload_messages']);
}
?>


<h2>Télécharger deux documents</h2>
<form action="file_upload_process.php" method="post" enctype="multipart/form-data">
    Sélectionnez le premier document :
    <input type="file" name="file1" required><br><br>
    Sélectionnez le second document :
    <input type="file" name="file2" required><br><br>
    <button type="submit">Télécharger les documents</button>
</form>
</body>
</html>
