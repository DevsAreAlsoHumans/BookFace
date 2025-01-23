<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Connexion</h2>

    <form action="/BookFace/BookFace/login" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br>
        <span> <?= isset($error) ? htmlspecialchars($error) : '' ?> </span>
        <button type="submit">Se connecter</button>
    </form>

   
</body>
</html>
