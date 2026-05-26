<h1>Modifier une ressource</h1>

<form method="post" action="/resources/update?id=<?= $resource->getId() ?>">
    <div>
        <label for="title">Titre *</label>
        <input type="text" id="title" name="title"
            value="<?= htmlspecialchars($resource->getTitle(), ENT_QUOTES, 'UTF-8') ?>" required>
    </div>
    <div>
        <label for="type">Type *</label>
        <input type="text" id="type" name="type"
            value="<?= htmlspecialchars($resource->getType(), ENT_QUOTES, 'UTF-8') ?>" required>
    </div>
    <div>
        <label for="status">Statut *</label>
        <select id="status" name="status">
            <?php foreach (['disponible', 'emprunte', 'maintenance'] as $s): ?>
                <option value="<?= $s ?>" <?= $resource->getStatus() === $s ? 'selected' : '' ?>>
                    <?= ucfirst($s) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="borrower">Emprunteur</label>
        <input type="text" id="borrower" name="borrower"
            value="<?= htmlspecialchars($resource->getBorrower() ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <button type="submit">Enregistrer</button>
    <a href="/resources">Annuler</a>
</form>