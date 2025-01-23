<?php
require_once __DIR__ . '/models/Post.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/controllers/UserController.php';
session_start();
// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];

$userController = new UserController();
// $post = new Post();

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
        $userController->addUser();
        break;

    case '/BookFace/BookFace/logout':
        $userController->lougoutUser();
        break;

    case '/BookFace/BookFace/posts-details':
        // var_dump($post->getPostDetaille(1));
        break;

    default:
        require_once __DIR__ . '/views/404.php';
        break;
}
