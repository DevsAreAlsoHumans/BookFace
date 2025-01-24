<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/BookFace/BookFace/assets/css/home.css" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/publish">Publier</a>
        <a href="/BookFace/BookFace/profile">Profil</a>
        <a href="/BookFace/BookFace/logout">Déconnexion</a>
    </nav>

    <h1 style="margin-left: 20px;">Accueil</h1>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <a href=<?= "/BookFace/BookFace/post-detail?id=" . htmlspecialchars($post['post_id']); ?>>
                <div class="post">
                    <h2><?= htmlspecialchars($post['title']); ?></h2>
                    <p><?= nl2br(htmlspecialchars($post['content'])); ?></p>
                    <small>Posté par l'utilisateur : <?= htmlspecialchars($post['author_username']); ?>
                        le <?= htmlspecialchars($post['post_created_at']); ?></small>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="margin-left: 20px;">Aucun post disponible.</p>
    <?php endif; ?>
</body>

</html>