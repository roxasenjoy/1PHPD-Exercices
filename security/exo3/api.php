<?php
// Définir les entêtes pour retourner du JSON
header('Content-Type: application/json');

// Simuler des données que vous pourriez récupérer d'une base de données
$data = [
    'name' => 'John Doe',
    'age' => 30,
    'email' => 'john.doe@example.com'
];

// Encoder les données en JSON et les renvoyer
echo json_encode($data);
