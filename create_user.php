
<?php
require __DIR__ . '/config.php';

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

$username = trim(readline("Nom d'utilisateur : "));

if (!preg_match('/^[a-zA-Z0-9_.-]{3,50}$/', $username)) {
    exit("Nom invalide : utilise 3 à 50 lettres, chiffres, points, tirets ou underscores.\n");
}

$password = readline("Mot de passe (saisie visible) : ");

if (strlen($password) < 12) {
    exit("Le mot de passe doit contenir au moins 12 caractères.\n");
}

$stmt = $pdo->prepare(
    'INSERT INTO users (username, password_hash)
     VALUES (:username, :hash)'
);

try {
    $stmt->execute([
        'username' => $username,
        'hash' => password_hash($password, PASSWORD_DEFAULT),
    ]);

    echo "Compte créé avec succès.\n";
} catch (PDOException $e) {
    echo "Impossible de créer le compte. Vérifie si le nom existe déjà.\n";
}
