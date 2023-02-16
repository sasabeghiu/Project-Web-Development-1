<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/resident.php';

class ResidentRepository extends RepositoryDemo
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM resident");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Resident');
            $residents = $stmt->fetchAll();

            return $residents;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM resident WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Resident');
            $resident = $stmt->fetch();

            return $resident;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //insert
    function addOne($resident)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO resident (name, description, photo) VALUES (?,?,?)");
            $stmt->execute([$resident->getName(), $resident->getDescription(), $resident->getPhoto()]);
            $resident->setId($this->connection->lastInsertId());

            return $this->getOne($resident->getId());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //update
    function updateOne($resident, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE resident SET name = ?, description = ?, photo = ? WHERE id = ?");
            $stmt->execute([$resident->getName(), $resident->getDescription(), $resident->getPhoto(), $id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //delete
    function deleteOne($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM resident WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
