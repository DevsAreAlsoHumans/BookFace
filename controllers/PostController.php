<?php
require_once __DIR__ . '/../config/database.php';

class PostController {

    public function __construct() {
    }

    // Afficher la page d'accueil avec tous les posts
    public function showHome() {
        if(!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
            header('Location: /BookFace/BookFace/login');
            exit();
        }
        $postModel = new Post();
        $posts = $postModel->getAllPosts();
        require_once __DIR__ . '/../views/home.php';
    }
}
?>