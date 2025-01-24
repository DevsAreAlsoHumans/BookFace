<?php
require_once __DIR__ . '/../config/database.php';

class User
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users ;';
        $connection = $this->db->prepare($sql);
        $connection->execute();
        return $connection->fetchAll();
    }

    public function insertUser($login, $password)
    {
        try {
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $this->db->prepare($sql);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':username', $login);
            $stmt->bindParam(':password', $password);
            if ($stmt->execute()) {
                return true;
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            // Log de l'erreur (optionnel, à configurer selon votre système)
            error_log("Erreur lors de l'insertion de l'utilisateur: " . $e->getMessage());
            return false;
        }
    }

    public function loginUser($login, $password)
    {
        try {
            $sql = "SELECT id, username, password FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $login);
            $stmt->execute();
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return "Identifiant ou Mot de passe incorrect";
            }
        } catch (PDOException $e) {
            error_log("Erreur lors de la recherche de l'utilisateur: " . $e->getMessage());
            return false;
        }
    }
}
