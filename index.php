<?php
require_once __DIR__ . '/models/Post.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/PostController.php';
session_start();

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];

if(!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
    if($request != '/BookFace/BookFace/login' && $request != '/BookFace/BookFace/register') {
        header('Location: /BookFace/BookFace/login');
        exit();
    }
}

$userController = new UserController();
$postController = new PostController();

// Gérer les routes
switch ($request) {
    case '/BookFace/BookFace':
        header("Location: /BookFace/BookFace/home");
        exit();

    case '/BookFace/BookFace/home':
        $postController->showHome();
        break;

    case '/BookFace/BookFace/login':
        $userController->loginUser();
        break;

    case '/BookFace/BookFace/register':
        $userController->addUser();
        break;

    case '/BookFace/BookFace/logout':
        break;

    default:
        require_once __DIR__ . '/views/404.php';
        break;
}
?>
