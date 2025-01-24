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
        if (!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
            header('Location: /BookFace/BookFace/login');
            exit();
        }
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

    public function publish(){
        if (!(isset($_SESSION['user_id']) && isset($_SESSION['username']))) {
            header('Location: /BookFace/BookFace/login');
            exit();
        }
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];
            $postModel = new Post();
            $inserted = $postModel->createPost($title, $content, $user_id);
            if ($inserted) {
                header("Location: /BookFace/BookFace/home");
                exit();
            } else {
                $error = $inserted;
            }
        }
        require_once __DIR__ . '/../views/publish.php';
    }

    public function showGetProfile($user_id)
    {
        $profileModel = new Post();
        $profile = $profileModel->getPostsByUser($user_id);
    }
}
