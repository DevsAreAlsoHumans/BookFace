<?php
require_once __DIR__ . '/../config/database.php';

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function createPost($title, $content, $userId)
    {
        try {
            $sql = "INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }

    public function getAllPosts()
    {
        try {
            $query = "
                SELECT 
                    posts.id AS post_id,
                    posts.title,
                    posts.content,
                    posts.votes_up,
                    posts.votes_down,
                    posts.created_at AS post_created_at,
                    users.id AS user_id,
                    users.username AS author_username,
                    users.created_at AS user_created_at
                FROM posts
                INNER JOIN users ON posts.user_id = users.id
                ORDER BY posts.created_at DESC
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return "Erreur SQL : " . $e->getMessage();
        }
    }

    public function getPostsByUser($userId)
    {
        try {
            $sql = "SELECT posts.title, posts.content, posts.created_at , users.username FROM posts WHERE user_id = :user_id ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }

    public function getPostDetaille($post_id)
    {
        try {
            $sql = "SELECT title, posts.content, categories.name, posts.created_at FROM categories
            JOIN posts ON posts.category_id = categories.id WHERE posts.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }
}
