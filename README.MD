# Médiathèque interne — Version POO

Application PHP de gestion de ressources, refactorisée en Programmation Orientée Objet.

## Prérequis

- PHP 8.0 ou supérieur
- MySQL 5.7 ou supérieur
- MAMP / XAMPP ou tout autre serveur local

## Installation

1. Cloner le dépôt :
   git clone https://github.com/JoeyDev41/OOP-brief-php-

2. Importer la base de données :
   Ouvrir phpMyAdmin et importer le fichier `database/schema.sql`

3. Configurer la connexion dans `config/database.php` :
   - host, port, database, username, password

4. Lancer le serveur PHP :
   php -S localhost:8001 -t public

5. Ouvrir dans le navigateur :
   http://localhost:8001

## Structure des classes

| Classe               | Fichier                      | Rôle                                 |
| -------------------- | ---------------------------- | ------------------------------------ |
| `Database`           | `src/Database.php`           | Connexion PDO unique (singleton)     |
| `Resource`           | `src/Resource.php`           | Représente une ressource (entité)    |
| `ResourceRepository` | `src/ResourceRepository.php` | Toutes les requêtes SQL              |
| `Validator`          | `src/Validator.php`          | Validation des données de formulaire |

## POO vs Procédural

Le code procédural utilisait une variable globale `$pdo` partagée entre tous les fichiers, des fonctions mélangées sans organisation claire, et du SQL directement dans les pages d'affichage.

La version POO centralise la connexion dans `Database`, regroupe tout le SQL dans `ResourceRepository`, sépare la validation dans `Validator`, et isole les vues des contrôleurs. Chaque classe a une responsabilité unique, ce qui rend le code plus lisible, maintenable et facile à faire évoluer.
