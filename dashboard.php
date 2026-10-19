
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

$username = htmlspecialchars(
    $_SESSION["username"],
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon espace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="login-card">
        <h1>Connexion réussie !</h1>
        <p class="subtitle">
            Bienvenue, <?= $username ?>.
        </p>

        <p>Tu es maintenant dans ton espace personnel de démonstration.</p>

        <form method="POST" action="logout.php">
            <button type="submit">Se déconnecter</button>
        </form>
    </main>
</body>
</html>
