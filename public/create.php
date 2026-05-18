<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Resource.php';
require __DIR__ . '/../src/ResourceRepository.php';
require __DIR__ . '/../src/Validator.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validator->validate($_POST);

    if (!$validator->isValid()) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => implode('', $validator->getErrors()),
        ];
        header('Location: create.php');
        exit;
    }

    $repo = new ResourceRepository();
    $repo->insert($_POST);

    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Ressource ajoutée.'];
    header('Location: index.php');
    exit;
}

$flash     = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$pageTitle = 'Ajouter une ressource';
require __DIR__ . '/../views/create.php';
