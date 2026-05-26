# Médiathèque interne — PHP MVC

Brief PHP MVC — La Fabrique du Numérique 2025-2027 — Ferreira Joey

---

## Prérequis

- PHP 8.x (XAMPP ou CLI)
- MySQL 8.x
- Navigateur web

---

## Installation

1. Cloner le dépôt
```bash
git clone <url-du-repo>
cd oop
```

2. Créer la base de données
```bash
mysql -u root -p -e "CREATE DATABASE mediatheque CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p mediatheque < database/schema.sql
```

3. Configurer la connexion dans `config/database.php`
```php
return [
    'host'     => '127.0.0.1',
    'port'     => 3306,
    'database' => 'mediatheque',
    'username' => 'root',
    'password' => ''
];
```

4. Lancer le serveur PHP
```bash
php -S localhost:8080 -t public/
```

5. Ouvrir dans le navigateur : `http://localhost:8080/resources`

---

## Routes

| Méthode | URL | Action |
|---------|-----|--------|
| GET | `/resources` | Liste toutes les ressources |
| GET | `/resources/create` | Formulaire d'ajout |
| POST | `/resources/store` | Enregistre une nouvelle ressource |
| GET | `/resources/edit?id=X` | Formulaire de modification |
| POST | `/resources/update?id=X` | Enregistre la modification |
| POST | `/resources/delete` | Supprime une ressource |
| GET | `/resources/show?id=X` | Détail d'une ressource |

---

## Architecture MVC

```
oop/
├── app/
│   ├── Controllers/
│   │   └── ResourceController.php  → reçoit les requêtes, appelle le repository, redirige
│   ├── Core/
│   │   ├── Database.php            → connexion PDO singleton
│   │   ├── FlashMessage.php        → messages de retour en session
│   │   ├── Router.php              → dispatch les URLs vers les contrôleurs
│   │   ├── Validator.php           → validation des données du formulaire
│   │   └── View.php                → rendu des vues avec layout
│   ├── Models/
│   │   └── Resource.php            → représente une ressource (getters, fromArray)
│   └── Repositories/
│       └── ResourceRepository.php  → toutes les requêtes SQL (CRUD)
├── config/
│   └── database.php                → paramètres de connexion
├── database/
│   └── schema.sql                  → script de création de la base
├── public/
│   ├── assets/style.css            → feuille de style
│   ├── .htaccess                   → redirige toutes les URLs vers index.php
│   └── index.php                   → point d'entrée unique
└── views/
    ├── layouts/
    │   └── main.php                → layout HTML commun (header, nav, footer)
    └── resources/
        ├── index.php               → liste des ressources
        ├── create.php              → formulaire d'ajout
        ├── edit.php                → formulaire de modification
        └── show.php                → détail d'une ressource
```

---

## Rôle de chaque dossier

- **app/Controllers/** : reçoit la requête HTTP, orchestre la logique, ne contient aucun HTML
- **app/Core/** : classes utilitaires réutilisables (routeur, vues, BDD, validation, flash)
- **app/Models/** : représentation objet des données
- **app/Repositories/** : accès aux données, toutes les requêtes SQL centralisées ici
- **config/** : configuration de l'application (connexion BDD)
- **public/** : seul dossier accessible depuis le navigateur
- **views/** : fichiers HTML/PHP d'affichage, aucune requête SQL

---

## 5 cas de test manuels

| # | Action | Résultat attendu |
|---|--------|-----------------|
| 1 | Aller sur `/resources` | La liste des ressources s'affiche |
| 2 | Cliquer "Ajouter", remplir le formulaire et valider | Redirection vers la liste avec message "Ressource ajoutée" |
| 3 | Soumettre le formulaire d'ajout vide | Rester sur le formulaire avec message d'erreur de validation |
| 4 | Cliquer "Modifier" sur une ressource, changer le titre, valider | Redirection vers la liste avec message "Ressource modifiée" |
| 5 | Cliquer "Supprimer" et confirmer | La ressource disparaît de la liste avec message "Ressource supprimée" |

---

## PHP procédural vs POO vs POO MVC

**PHP procédural** : le code SQL, la logique et le HTML sont mélangés dans un même fichier. Rapide à écrire pour un petit projet, mais difficile à maintenir et à faire évoluer dès que le projet grossit.

**PHP POO** : le code est organisé en classes (Resource, ResourceRepository, Validator). La logique métier est séparée de l'affichage, mais chaque page PHP (index.php, create.php) contient encore une partie de traitement HTTP et de redirection.

**PHP POO MVC** : la séparation est totale entre le modèle (données), la vue (affichage) et le contrôleur (logique HTTP). Un point d'entrée unique reçoit toutes les requêtes, un routeur les dispatch vers le bon contrôleur. Le projet est prêt à évoluer : ajout de routes, authentification, filtres, sans toucher à l'existant.
