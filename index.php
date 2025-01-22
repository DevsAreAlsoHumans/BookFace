<?php 
session_start();

// Récupérer l'URL demandée
$request = $_SERVER['REQUEST_URI'];


// Gérer les routes
switch ($request) {
    case '/':
        break;

    case '/login':
        break;

    case '/register':
        break;

    case '/logout':
        break;

    default:
        require_once __DIR__ . '/app/views/404.php';
        break;
}


?>
