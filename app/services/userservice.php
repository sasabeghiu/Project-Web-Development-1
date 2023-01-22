<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UserRepository;
    }

    public function getUserByID($id)
    {
        return $this->repository->getUserByID($id);
    }

    public function getUserByName($name)
    {
        return $this->repository->getUserByName($name);
    }

    public function getIdByUsernameAndPassword($username, $password)
    {
        return $this->repository->getIdByUsernameAndPassword($username, $password);
    }

    public function insertUser($user)
    {
        $this->repository->insertUser($user);
    }

    public function checkUsernamePassword($username, $password)
    {
        return $this->repository->checkUsernamePassword($username, $password);
    }

    public function hashPassword($password)
    {
        return $this->repository->hashPassword($password, PASSWORD_DEFAULT);
    }

    function verifyPassword($input, $hash)
    {
        return $this->repository->verifyPassword($input, $hash);
    }
}
