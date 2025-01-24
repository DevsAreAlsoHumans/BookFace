<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <?php if (isset($profile)) : ?>
        <h1><?= htmlspecialchars($profile['username']); ?></h1>
        <?php foreach ($posts as $post): ?>
            <p><strong>Posts :</strong> </p>
            <p><?= htmlspecialchars($post['title']); ?></p>
            <p><?= htmlspecialchars($post['content']); ?></p>
        <?php endforeach ?>
    <?php elseif ($profile == null): ?>
        <p>Profile introuvable.</p>
    <?php endif; ?>
</body>

</html>