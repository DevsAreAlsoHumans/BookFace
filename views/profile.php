<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
</head>

<body>
    <nav class="navbar">
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/profile">Profil</a>
        <a href="/BookFace/BookFace/logout">Déconnexion</a>
    </nav>
    <?php if (isset($profiles)) : ?>
        <h1><?= htmlspecialchars($username); ?></h1>
        <?php foreach ($profiles as $profile): ?>
            <p><strong>Posts :</strong> </p>
            <a href=<?= "/BookFace/BookFace/post-detail?id=" . htmlspecialchars($profile['id']); ?>>
                <p><?= htmlspecialchars($profile['title']); ?></p>
                <p><?= htmlspecialchars($profile['content']); ?></p>
                <p><?= htmlspecialchars($profile['created_at']); ?></p>
            </a>
        <?php endforeach ?>
    <?php elseif ($profiles == null): ?>
        <p>Pas de post trouvable.</p>
    <?php endif; ?>
</body>

</html>