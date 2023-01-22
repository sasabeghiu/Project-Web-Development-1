<?php
require_once __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends RepositoryDemo
{
    function getUserByID($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByName($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM user WHERE username = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getIdByUsernameAndPassword($username, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id FROM user WHERE username = :username AND password = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //insert
    function insertUser($user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO user (username, password, email, role) VALUES (?,?,?,?)");
            $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getRole()]);
            $user->setId($this->connection->lastInsertId());

            return $this->getUserByID($user->getId());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function checkUsernamePassword($username, $password)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, password, email, role FROM user WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            $result = $this->verifyPassword($password, $user->getPassword());

            if (!$result)
                return false;

            // do not pass the password hash
            $user->setPassword("");

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }
}
