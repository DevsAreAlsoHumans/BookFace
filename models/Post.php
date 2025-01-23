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
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }

    public function getPostsByUser($userId)
    {
        try {
            $sql = "SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC";
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
            $sql = "SELECT title, content, categories.name, posts.created_at FROM posts 
            JOIN categories ON posts.category_id = categories.id WHERE posts.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
            // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }
}
