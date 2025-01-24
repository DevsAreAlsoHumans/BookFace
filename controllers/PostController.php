<?php
require_once __DIR__ . '/../config/database.php';

class PostController
{

    public function __construct() {}

    // Afficher la page d'accueil avec tous les posts
    public function showHome()
    {
        if (!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
            header('Location: /BookFace/BookFace/login');
            exit();
        }
        $postModel = new Post();
        $posts = $postModel->getAllPosts();
        require_once __DIR__ . '/../views/home.php';
    }

    public function showGetPostDetail($post_id)
    {
        $postModel = new Post();
        $commentModel = new Comment();
        $posts = $postModel->getPostDetaille($post_id);
        $comments = $commentModel->showComments($post_id);
        if ($posts) {
            $posts = $posts[0];
        } else {
            $posts = null;
        }
        // var_dump($comments);
        // var_dump($posts);
        require_once 'views/post_detail.php';
    }
}
