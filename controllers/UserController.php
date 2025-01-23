<?php
require_once __DIR__ . '/../config/database.php';

class UserController
{
    private $userModel;

    public function __construct($db)
    {
        $this->userModel = new User($db);
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
}
