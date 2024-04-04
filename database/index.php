<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des utilisateurs</title>
</head>
<body>
<?php
require 'db_connect.php';

// Fonction pour afficher un message
function displayMessage($message) {
    echo "<p>" . htmlspecialchars($message) . "</p>";
}

// Afficher un message s'il y en a un
if (isset($_GET['message'])) {
    displayMessage($_GET['message']);
}
?>

<!-- Création d'un utilisateur -->
<h2>Créer un nouvel utilisateur</h2>
<form action="create_user.php" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="description">Description :</label>
    <textarea id="description" name="description"></textarea><br><br>
    <button type="submit">Créer l'utilisateur</button>
</form>

<!-- Liste des utilisateurs -->
<h2>Liste des utilisateurs</h2>
<table>
    <tr>
        <th>Email</th>
        <th>Pseudo</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php
    // Récupérer tous les utilisateurs
    $stmt = $pdo->query("SELECT id, email, pseudo, description FROM user");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['pseudo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>
                <a href='edit_user.php?id=" . $row['id'] . "'>Modifier</a> | 
                <a href='delete_user.php?id=" . $row['id'] . "'>Supprimer</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
