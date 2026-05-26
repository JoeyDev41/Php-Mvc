<?php

session_start();

// --- Chargement des classes (Core) ---
require __DIR__ . '/../app/Core/Database.php';
require __DIR__ . '/../app/Core/Validator.php';
require __DIR__ . '/../app/Core/FlashMessage.php';
require __DIR__ . '/../app/Core/View.php';
require __DIR__ . '/../app/Core/Router.php';

// --- Chargement des classes (MVC) ---
require __DIR__ . '/../app/Models/Resource.php';
require __DIR__ . '/../app/Repositories/ResourceRepository.php';
require __DIR__ . '/../app/Controllers/ResourceController.php';

// --- Déclaration des routes ---
$router = new Router();

$router->get('/resources',         [ResourceController::class, 'index']);
$router->get('/resources/create',  [ResourceController::class, 'create']);
$router->post('/resources/store',  [ResourceController::class, 'store']);
$router->get('/resources/edit',    [ResourceController::class, 'edit']);
$router->post('/resources/update', [ResourceController::class, 'update']);
$router->post('/resources/delete', [ResourceController::class, 'delete']);
$router->get('/resources/show',    [ResourceController::class, 'show']);

// --- Lancement du routeur ---
$router->dispatch();
