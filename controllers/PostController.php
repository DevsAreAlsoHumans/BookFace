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

    // Ajouter un post
    public function addPost() {
        if(!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
            header('Location: /BookFace/BookFace/login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['title']) || empty($_POST['content'])) {
                $error = 'Veuillez remplir tous les champs.';
                require_once __DIR__ . '/../views/publish.php';
                return;
            }
            $postModel = new Post();
            $postModel->createPost($_POST['title'], $_POST['content'], $_SESSION['user_id']);
            header('Location: /BookFace/BookFace/home');
            exit();
        }
        require_once __DIR__ . '/../views/publish.php';
    }    
}
?>