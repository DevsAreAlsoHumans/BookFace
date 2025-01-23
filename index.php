<?php
include_once './models/Post.php';
include_once './models/User.php';
include_once './controllers/UserController.php';
session_start();

$userController = new UserController();

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, "?");
//var_dump($request);
// Gérer les routes
switch ($request) {
    case '/BookFace/BookFace/':
        break;

    case '/BookFace/BookFace/login':
        break;

    case '/BookFace/BookFace/register':

        /*if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'BookFace/BookFace/register':
                    $controller->addUser($login, $password);
                    break;
                default:
                    echo "Action inconnue.";
                    break;
            }
        } else {
            $controller->ShowRegister();
        }*/
        break;

    case '/BookFace/BookFace/logout':
        break;

    default:
        require_once __DIR__ . '/views/404.php';
        break;
}
