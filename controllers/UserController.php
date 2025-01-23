<?php
require_once __DIR__ . '/../config/database.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
       
    }

    public function addUser($login, $password)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $login = $_POST['username'];
                $password = $_POST['password'];

                if (!empty($login) && !empty($password)) {
                    $inserted = $this->userModel->insertUser($login, $password);
                    if ($inserted) {
                        header("Location: success.php");
                        exit();
                    } else {
                        echo "Une erreur est survenue lors de l'ajout de l'utilisateur.";
                    }
                } else {
                    echo "Tous les champs sont obligatoires.";
                }
            } catch (Exception $e) {
                error_log("Erreur dans le contrôleur: " . $e->getMessage());
                echo "Une erreur interne est survenue. Veuillez réessayer plus tard.";
            }
        }
    }

    public function loginUser(): void
    {
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->loginUser($login, $password);

            if ($user && !is_string($user)) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: /BookFace/BookFace/home");
                exit();
            } else {
                $error = $user;
            }
        } 
        require_once __DIR__ . '/../views/login.php';
    
    }
}