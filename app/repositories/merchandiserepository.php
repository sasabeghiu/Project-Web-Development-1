<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/merchandise.php';

class MerchandiseRepository extends RepositoryDemo
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM merchandise");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Merchandise');
            $merchandise = $stmt->fetchAll();

            return $merchandise;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM merchandise WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Merchandise');
            $merchandise = $stmt->fetch();

            return $merchandise;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //insert
    function addOne($merchandise)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO merchandise (name, description, photo, price, size, stock, product_id) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$merchandise->getName(), $merchandise->getDescription(), $merchandise->getPhoto(), $merchandise->getPrice(), $merchandise->getSize(), $merchandise->getStock(), $merchandise->getProduct_id()]);
            $merchandise->setId($this->connection->lastInsertId());

            return $this->getOne($merchandise->getId());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //update
    function updateOne($merchandise, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE merchandise SET name = ?, description = ?, photo = ?, price = ?, size = ?, stock = ?, product_id = ? WHERE id = ?");
            $stmt->execute([$merchandise->getName(), $merchandise->getDescription(), $merchandise->getPhoto(), $merchandise->getPrice(), $merchandise->getSize(), $merchandise->getStock(), $merchandise->getProduct_id(), $id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //delete
    function deleteOne($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM merchandise WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
