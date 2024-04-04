<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fetch Data Example</title>
</head>
<body>
<h2>Utilisateur</h2>
<div id="userData">Chargement des données...</div>

<script>
    // Utiliser Fetch pour obtenir les données de data_fetcher.php
    fetch('api.php')
        .then(response => response.json()) // Parse la réponse en JSON
        .then(data => {
            // Utiliser les données JSON pour mettre à jour le DOM
            document.getElementById('userData').innerHTML = `
                Nom : ${data.name}<br>
                Âge : ${data.age}<br>
                Email : ${data.email}
            `;
        })
        .catch(error => console.error('Erreur :', error));
</script>
</body>
</html>
