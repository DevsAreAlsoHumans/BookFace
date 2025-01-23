<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
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
        .post h2 { margin: 0; }
        .post p { margin: 5px 0; }
        .post small { color: #666; }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="">Profil</a>
        <a href="/BookFace/BookFace/logout">Déconnexion</a>
    </div>

    <h1 style="margin-left: 20px;">Accueil</h1>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2><?= htmlspecialchars($post['title']); ?></h2>
                <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
                <small>Posté par l'utilisateur : <?= htmlspecialchars($post['author_username']); ?> 
                       le <?= htmlspecialchars($post['post_created_at']); ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="margin-left: 20px;">Aucun post disponible.</p>
    <?php endif; ?>
</body>
</html>
