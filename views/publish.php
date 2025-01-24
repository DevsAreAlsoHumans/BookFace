<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication</title>
    <link href="/BookFace/BookFace/assets/css/publish.css" rel="stylesheet">
</head>

<body>
    <nav>
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/profile">Profil</a>
        <a href="/BookFace/BookFace/logout">Déconnexion</a>
    </nav>
    <div class="container">
        <h1>Créer un post</h1>

        <form action="/BookFace/BookFace/publish" method="POST">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
            <br>

            <label for="content">Contenu :</label>
            <textarea id="content" name="content" required></textarea>
            <br>

            <span class="error" style="color: red;">
                <?= isset($error) ? htmlspecialchars($error) : ''; ?>
            </span>
            <br>

            <button type="submit">Publier</button>
        </form>
    </div>
</body>

</html>