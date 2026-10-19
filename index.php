
<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Identifiants de démonstration uniquement
    if ($username === "utilisateur" && $password === "Demo-2026!") {
        session_regenerate_id(true);
        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit;
    }

    $message = "Identifiants incorrects.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | Mon application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="login-card">
        <h1>Bienvenue</h1>
        <p class="subtitle">Connectez-vous à votre espace</p>

        <?php if ($message !== ""): ?>
            <p class="error">
                <?= htmlspecialchars($message, ENT_QUOTES, "UTF-8") ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <label for="username">Nom d'utilisateur</label>
            <input
                type="text"
                id="username"
                name="username"
                autocomplete="username"
                required
            >

            <label for="password">Mot de passe</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >

            <button type="submit">Se connecter</button>
        </form>

        <p class="note">Application de démonstration locale</p>
    </main>
</body>
</html>
