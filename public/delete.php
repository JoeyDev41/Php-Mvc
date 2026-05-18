<?php

session_start();

require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/Resource.php';
require __DIR__ . '/../src/ResourceRepository.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
$repo = new ResourceRepository();

$resource = $repo->findById($id);

if (!$resource) {
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Ressource introuvable.'];
    header('Location: index.php');
    exit;
}

$repo->delete($id);

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Ressource supprimée.'];
header('Location: index.php');
exit;
