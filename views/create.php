<?php require __DIR__ . '/partials/header.php'; ?>

<h1>Ajouter une ressource</h1>

<?php require __DIR__ . '/partials/flash.php'; ?>

<form method="post" action="create.php">
    <label>
        Titre
        <input type="text" name="title" required>
    </label>
    <label>
        Type
        <input type="text" name="type">
    </label>
    <label>
        Statut
        <select name="status">
            <option value="disponibke">Disponible</option>
            <option value="emprunte">Emprunté</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </label>
    <label>
        Emprunteur
        <input type="text" name="borrower">
    </label>

    <button type="submit">Enregistrer</button>
</form>

<p><a href="index.php">Retour à la liste</a></p>

<?php require __DIR__ . '/partials/footer.php'; ?>