<?php require __DIR__ . '/partials/header.php'; ?>

<h1>Médiathèque interne</h1>

<?php require __DIR__ . '/partials/flash.php'; ?>

<p><a href="create.php">Ajouter une ressource</a></p>

<?php if (empty($resources)): ?>
    <p>Aucune ressource pour le moment.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Emprunteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resources as $resource): ?>
                <tr>
                    <td><?= htmlspecialchars($resource->getTitle(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($resource->getType(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($resource->getStatus(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($resource->getBorrower() ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="action">
                        <a href="edit.php?id=<?= $resource->getId() ?>">Modifier</a>
                        <form method="post" action="delete.php" onsubmit="return confirm('Supprimer ?')">
                            <input type="hidden" name="id" value="<?= $resource->getId() ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php require __DIR__ . '/partials/footer.php'; ?>