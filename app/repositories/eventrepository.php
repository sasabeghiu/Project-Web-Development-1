<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/event.php';

class EventRepository extends RepositoryDemo
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetchAll();

            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM events WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $events = $stmt->fetch();

            return $events;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //insert
    function addOne($event)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO events (name, description, photo, datetime, location, ticketsAvailable, price, product_id) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute([$event->getName(), $event->getDescription(), $event->getPhoto(), $event->getDatetime(), $event->getLocation(), $event->getTicketsAvailable(), $event->getPrice(), $event->getProduct_id()]);
            $event->setId($this->connection->lastInsertId());

            return $this->getOne($event->getId());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //update
    function updateOne($event, $id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE events SET name = ?, description = ?, photo = ?, datetime = ?, location = ?, ticketsAvailable = ?, price = ?, product_id = ? WHERE id = ?");
            $stmt->execute([$event->getName(), $event->getDescription(), $event->getPhoto(), $event->getDatetime(), $event->getLocation(), $event->getTicketsAvailable(), $event->getPrice(), $event->getProduct_id(), $id]);
        } catch (PDOException $e) {
            echo $e;
        }
    }

    //delete
    function deleteOne($id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM events WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }
}
