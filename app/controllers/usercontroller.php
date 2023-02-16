<?php
require __DIR__ . '/../services/userservice.php';

class UserController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function login()
    {
        session_start();
        if (isset($_POST['login'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            if ($username != "" && $password != "") {
                $this->userService->checkUsernamePassword($username, $password);
            } else {
                echo "<script>alert('Invalid username or password. Try again')</script>"; 
            }
            $user = $this->userService->getUserByName($username);
            $_SESSION["user"] = $user->getId();
            $_SESSION["userrole"] = $user->getRole();
            $_SESSION["test"] = $user->getUsername();
            header("Location: /home");
            exit;
        }
        require __DIR__ . '/../views/login.php';
    }

    public function register()
    {
        if (isset($_POST['register'])) {
            if ($_POST['email'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['confirm_password'] != "") {
                $email = htmlspecialchars($_POST['email']);
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $confirm_password = htmlspecialchars($_POST['confirm_password']);
                if ($password == $confirm_password) {
                    //encrypt password
                    $password = $this->userService->hashPassword($password);
                    $user = new User();
                    $user->setUsername($username);
                    $user->setPassword($password);
                    $user->setEmail($email);
                    $user->setRole("user");
                    $this->userService->insertUser($user);
                }
            }
            header("Location: /user/login");
            exit;
        } else {
            require __DIR__ . '/../views/register.php';
        }
    }

    public function logout()
    {
        require __DIR__ . '/../views/logout.php';
    }
}
