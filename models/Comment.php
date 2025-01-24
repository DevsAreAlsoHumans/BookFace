<?php
require_once __DIR__ . '/../config/database.php';

class Comment
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function showComments($post_id)
    {
        try {
            $sql = "SELECT comments.content FROM comments
            JOIN posts ON posts.id = comments.post_id WHERE posts.id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error SQL : " . $e->getMessage();
        }
    }
}
