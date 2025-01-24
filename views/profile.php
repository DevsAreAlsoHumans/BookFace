<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/BookFace/BookFace/assets/css/profile.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    <nav class="navbar">
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/publish">Publier</a>
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