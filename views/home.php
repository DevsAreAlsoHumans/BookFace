<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .post { border: 1px solid #ddd; margin: 20px 0; padding: 10px; }
        .post h2 { margin: 0; }
        .post p { margin: 5px 0; }
        .post small { color: #666; }
    </style>
</head>
<body>
    <h1>Accueil</h1>
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
        <p>Aucun post disponible.</p>
    <?php endif; ?>
</body>
</html>
