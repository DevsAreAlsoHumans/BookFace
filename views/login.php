<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/BookFace/BookFace/assets/css/login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>

    <form action="/BookFace/BookFace/login" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required><br>
        <span> <?= isset($error) ? htmlspecialchars($error) : '' ?> </span>
        <button type="submit">Se connecter</button><br>
        <a href="/BookFace/BookFace/register">S'inscrire</a>
    </form>


</body>

</html>