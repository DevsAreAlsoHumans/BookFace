<?php
require_once __DIR__ . '/../config/database.php';

class UserController
{
    private $userModel;

    public function __construct() {}

    public function addUser(): void
    {
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $login = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $inserted = $userModel->insertUser($login, $password);
            if ($inserted) {
                header("Location: /BookFace/BookFace/login");
                exit();
            } else {
                $error = $inserted;
            }
        }
        require_once __DIR__ . '/../views/register.php';
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
