<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <h2>Inscription</h2>

    <form action="/BookFace/BookFace/register" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" placeholder="Login" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" placeholder="Password" required><br>
        <span> <?= isset($error) ? htmlspecialchars($error) : '' ?> </span>
        <button name="btn-ajout" type="submit">Ajouter</button><br>
        <a href="/BookFace/BookFace/login">Se connecter</a>
    </form>
</body>

</html>