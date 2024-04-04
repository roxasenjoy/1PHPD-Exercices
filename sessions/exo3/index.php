<?php
session_start();

// Simuler une base de données en mémoire
$users = [
    'user' => password_hash('password', PASSWORD_DEFAULT)
];

$message = '';

// Inscription (pour l'exemple, nous utilisons des données fixes)
if (isset($_POST['register'])) {
    // Ici, vous enregistreriez normalement l'utilisateur dans une base de données
    $message = "Utilisateur enregistré (dans cet exemple, les données sont pré-enregistrées).";
}

// Connexion
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['user'] = $username; // Stocker le nom d'utilisateur dans la session

        if (isset($_POST['remember_me'])) {
            // Définir un cookie pour se souvenir de l'utilisateur pendant 30 jours
            setcookie('remember_user', $username, time() + (86400 * 30), "/");
        }

        $message = "Connexion réussie !";
    } else {
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

// Vérifier si l'utilisateur revient avec un cookie valide
if (!isset($_SESSION['user']) && isset($_COOKIE['remember_user'])) {
    $_SESSION['user'] = $_COOKIE['remember_user'];
    $message = "Reconnecté automatiquement grâce au cookie.";
}

// Déconnexion
if (isset($_POST['logout'])) {
    session_destroy();
    setcookie('remember_user', '', time() - 3600, "/"); // Supprimer le cookie
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système d'authentification</title>
</head>
<body>
<h2>Système d'authentification</h2>
<?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<?php if (!isset($_SESSION['user'])): ?>
    <form method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <div>
            <input type="checkbox" name="remember_me" id="remember_me">
            <label for="remember_me">Se souvenir de moi</label>
        </div>
        <button type="submit" name="login">Connexion</button>
        <button type="submit" name="register">Inscription</button>
    </form>
<?php else: ?>
    <p>Bonjour, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
    <form method="post">
        <button type="submit" name="logout">Déconnexion</button>
    </form>
<?php endif; ?>

<a href="../../../php">Retour</a>
</body>
</html>
