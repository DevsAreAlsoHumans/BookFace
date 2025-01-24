<?php
require_once __DIR__ . '/models/Comment.php';
require_once __DIR__ . '/models/Post.php';
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/PostController.php';
session_start();

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

$userController = new UserController();
// $post = new Post();
$postController = new PostController();
$post = new Post();
$comments = new Comment();

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
        $userController->lougoutUser();
        break;

    case '/BookFace/BookFace/post-detail':
        // var_dump($comments->showComments(1));
        if (isset($_GET['id'])) {
            $postController->showGetPostDetail(($_GET['id']));
            // var_dump($post->getPostDetaille(($_GET['id'])));
        } else {
            require_once __DIR__ . '/views/404.php';
        }
        break;

    case '/BookFace/BookFace/profile':
        $postController->showGetProfile();
        // var_dump($post->getPostsByUser());
        break;

    case '/BookFace/BookFace/publish':
        $postController->publish();
        break;

    default:
        require_once __DIR__ . '/views/404.php';
        break;
}
