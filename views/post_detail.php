<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .post {
            border: 1px solid #ddd;
            margin: 20px 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .post h2 {
            margin: 0;
        }

        .post p {
            margin: 5px 0;
        }

        .post small {
            color: #666;
        }
    </style>
</head>


<body>
    <nav class="navbar">
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/profile">Profil</a>
        <a href="/BookFace/BookFace/logout">Déconnexion</a>
    </nav>
    <?php if (isset($posts)) : ?>
        <h1><?= htmlspecialchars($posts['title']); ?></h1>
        <p><strong>Créé par :</strong> <?= htmlspecialchars($posts['username']); ?></p>
        <p><strong>Catégorie :</strong> <?= htmlspecialchars($posts['name']); ?></p>
        <p><?= nl2br(htmlspecialchars($posts['content'])); ?></p>
        <p><em>Publié le :</em> <?= $posts['created_at']; ?></p>
        <p><em>Liké par </em> <?= $posts['votes_up']; ?> personnes</p>
        <p><em>Disliké par </em> <?= $posts['votes_down']; ?> personnes</p>
        <p><strong>Comments :</strong> </p>
        <?php foreach ($comments as $comment): ?>
            <p><?= htmlspecialchars($comment['content']); ?></p><br>
        <?php endforeach ?>
    <?php elseif ($posts == null): ?>
        <p>Post introuvable.</p>
    <?php endif; ?>
</body>

</html>