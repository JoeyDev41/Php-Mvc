<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Resource.php';
require __DIR__ . '/../src/ResourceRepository.php';

$repo = new ResourceRepository();
$resources = $repo->findAll();
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$pageTitle = 'Médiathèque interne';
require __DIR__ . '/../views/index.php';
