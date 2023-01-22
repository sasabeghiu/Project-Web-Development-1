<?php
require __DIR__ . '/../models/order.php';
require __DIR__ . '/../models/order_item.php';

class OrderRepository
{
    protected $connection;

    function __construct()
    {
        require __DIR__ . '/../config/dbconfig.php';

        try {
            $this->connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function getAllOrders()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOneOrder($order_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $order = $stmt->fetch();

            return $order;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOrdersByUserId($user_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM orders WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOneOrderItem($order_item_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_items WHERE id = :id");
            $stmt->bindParam(':id', $order_item_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order_Item');
            $order_item = $stmt->fetch();

            return $order_item;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getOrdersItemsByOrderId($order_id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $orders = $stmt->fetchAll();

            return $orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function placeOrder($order)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO orders (user_id, user_email, user_firstname, user_lastname, user_address, user_country, user_zipcode, order_totalprice) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute([$order->getUser_id(), $order->getUser_email(), $order->getUser_firstname(), $order->getUser_lastname(), $order->getUser_address(), $order->getUser_country(), $order->getUser_zipcode(), $order->getOrder_totalprice()]);
            $order->setOrder_id($this->connection->lastInsertId());

            return $this->getOneOrder($order->getOrder_id());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function addOrderItem($order_item)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO order_items (order_id, product_id, product_qty, product_price) VALUES (?,?,?,?)");
            $stmt->execute([$order_item->getOrder_id(), $order_item->getProduct_id(), $order_item->getProduct_qty(), $order_item->getProduct_price()]);
            $order_item->setId($this->connection->lastInsertId());

            return $this->getOneOrderItem($order_item->getId());
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
