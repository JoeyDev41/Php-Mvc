<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Resource.php';
require __DIR__ . '/../src/ResourceRepository.php';
require __DIR__ . '/../src/Validator.php';

$repo = new ResourceRepository();
$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

$resource = $repo->findById($id);

if (!$resource) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Ressource introuvable.'];
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();
    $validator->validate($_POST);

    if (!$validator->isValid()) {
        $_SESSION['flash'] = [
            'type' => 'error',
            'message' => implode('', $validator->getErrors()),
        ];
        header('Location: edit.php?id=' . $id);
        exit;
    }

    $repo->update($id, $_POST);

    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Ressource modifiée.'];
    header('Location: index.php');
    exit;
}

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$pageTitle = 'Modifier une ressource';
require __DIR__ . '/../views/edit.php';
