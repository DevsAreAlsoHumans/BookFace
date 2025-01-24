<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/home.css" rel="stylesheet">
    <title>Accueil</title>
    <link href="/assets/css/publish.css" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <a href="">Profil</a>
        <a href="/BookFace/BookFace/publish">Publier</a>
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
