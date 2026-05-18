<?php require __DIR__ . '/partials/header.php'; ?>

<h1>Modifier une ressource</h1>

<?php require __DIR__ . '/partials/flash.php'; ?>

<form method="post" action="edit.php">
    <input type="hidden" name="id" value="<?= $resource->getId() ?>">

    <label>
        Titre
        <input type="text" name="title" value="<?= htmlspecialchars($resource->getTitle(), ENT_QUOTES, 'UTF-8') ?>" required>
    </label>

    <label>
        Type
        <input type="text" name="type" value="<?= htmlspecialchars($resource->getType(), ENT_QUOTES, 'UTF-8') ?>" required>
    </label>

    <label>
        Statut
        <select name="status">
            <?php foreach (['disponible' => 'Disponible', 'emprunte' => 'Emprunté', 'maintenance' => 'Maintenance'] as $val => $label): ?>
                <option value="<?= $val ?>" <?= $resource->getStatus() === $val ? 'selected' : '' ?>>
                    <?= $label ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>
        Emprunteur
        <input type="text" name="borrower" value="<?= htmlspecialchars($resource->getBorrower() ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </label>

    <button type="submit">Mettre à jour</button>
</form>

<p><a href="index.php">Retour à la liste</a></p>

<?php require __DIR__ . '/partials/footer.php'; ?>