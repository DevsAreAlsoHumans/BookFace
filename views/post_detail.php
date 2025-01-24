<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/BookFace/BookFace/assets/css/view_posts.css" rel="stylesheet">
    <title>Post</title>
</head>


<body>
    <nav class="navbar">
        <a href="/BookFace/BookFace/home">Accueil</a>
        <a href="/BookFace/BookFace/publish">Publier</a>
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