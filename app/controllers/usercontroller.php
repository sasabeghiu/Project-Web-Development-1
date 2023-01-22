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
        require __DIR__ . '/../views/login.php';
    }

    public function register()
    {
        require __DIR__ . '/../views/register.php';
    }

    public function logout()
    {
        require __DIR__ . '/../views/logout.php';
    }
}
