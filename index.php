<?php
require_once __DIR__ . '/models/Post.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/controllers/UserController.php';
session_start();

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];

$userController = new UserController();

// Gérer les routes
switch ($request) {
    case '/BookFace/BookFace':
        break;

    case '/BookFace/BookFace/home':
        break;

    case '/BookFace/BookFace/login':
        $userController->loginUser();
        break;

    case '/BookFace/BookFace/register':
        break;

    case '/BookFace/BookFace/logout':
        break;

    default:
        require_once __DIR__ . '/views/404.php';
        break;
}
