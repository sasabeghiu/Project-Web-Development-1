<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/product.php';

class ProductRepository extends RepositoryDemo
{
    function getOne($id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT product.product_id, 
            COALESCE(NULLIF(events.name,''), merchandise.name) AS product_name, 
            COALESCE(NULLIF(events.photo,''), merchandise.photo) AS product_photo,
            COALESCE(NULLIF(events.ticketsAvailable,''), merchandise.stock) AS product_stock,
            COALESCE(NULLIF(events.price,''), merchandise.price) AS product_price
            FROM product as product
            LEFT JOIN events as events on 
            (product.product_id = events.product_id AND product.item_id = events.id)
            LEFT JOIN merchandise as merchandise on
            (product.product_id=merchandise.product_id AND product.item_id = merchandise.id)
            WHERE product.product_id = :product_id");
            $stmt->bindParam(':product_id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $stmt->fetch();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
