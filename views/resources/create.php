<h1>Ajouter une ressource</h1>

<form method="post" action="/resources/store">
    <div>
        <label for="title">Titre *</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="type">Type *</label>
        <input type="text" id="type" name="type" required>
    </div>
    <div>
        <label for="status">Statut *</label>
        <select id="status" name="status">
            <option value="disponible">Disponible</option>
            <option value="emprunte">Emprunté</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </div>
    <div>
        <label for="borrower">Emprunteur</label>
        <input type="text" id="borrower" name="borrower">
    </div>
    <button type="submit">Ajouter</button>
    <a href="/resources">Annuler</a>
</form>