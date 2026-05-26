<h1>Détail de la ressource</h1>

<table>
    <tr>
        <th>Titre</th>
        <td><?= htmlspecialchars($resource->getTitle(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Type</th>
        <td><?= htmlspecialchars($resource->getType(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Statut</th>
        <td><?= htmlspecialchars($resource->getStatus(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Emprunteur</th>
        <td><?= htmlspecialchars($resource->getBorrower() ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Ajouté le</th>
        <td><?= htmlspecialchars($resource->getCreatedAt(), ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
</table>

<p>
    <a href="/resources/edit?id=<?= $resource->getId() ?>">✏️ Modifier</a>
    &nbsp;|&nbsp;
    <a href="/resources">← Retour à la liste</a>
</p>