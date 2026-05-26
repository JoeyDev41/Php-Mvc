<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Médiathèque', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/resources">🏠 Médiathèque</a>
            <a href="/resources/create">➕ Ajouter</a>
        </nav>
    </header>

    <main>

        <?php if ($flash): ?>
            <div class="flash flash-<?= htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <?= $content ?>
    </main>

    <footer>
        <p>Médiathèque interne & copy; <?= date('Y') ?></p>
    </footer>
</body>

</html>