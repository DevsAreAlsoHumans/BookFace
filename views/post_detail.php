<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <?php if (isset($posts)) : ?>
        <h1><?= htmlspecialchars($posts['title']); ?></h1>
        <p><strong>Catégorie :</strong> <?= htmlspecialchars($posts['name']); ?></p>
        <p><?= nl2br(htmlspecialchars($posts['content'])); ?></p>
        <p><em>Publié le :</em> <?= $posts['created_at']; ?></p>
        <?php foreach ($comments as $comment): ?>
            <p><strong>Comments :</strong> </p>
            <p><?= htmlspecialchars($comment['content']); ?></p>
        <?php endforeach ?>
    <?php elseif ($posts == null): ?>
        <p>Post introuvable.</p>
    <?php endif; ?>
</body>

</html>