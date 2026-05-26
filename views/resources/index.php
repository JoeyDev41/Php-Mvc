<h1>Médiathèque interne</h1>

<p><a href="/resources/create">➕ Ajouter une ressource</a></p>

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
                        <a href="/resources/show?id=<?= $resource->getId() ?>">Détail</a>
                        <a href="/resources/edit?id=<?= $resource->getId() ?>">Modifier</a>
                        <form method="post" action="/resources/delete" onsubmit="return confirm('Supprimer ?')">
                            <input type="hidden" name="id" value="<?= $resource->getId() ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>