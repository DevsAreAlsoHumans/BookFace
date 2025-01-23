<?php
require_once __DIR__. '/../config/database.php';

class Post {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function createPost($title, $content, $userId) {
        try {
            $sql = "INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            echo "Post created successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getAllPosts() {
        try {
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>