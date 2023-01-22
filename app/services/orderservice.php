<?php
require __DIR__ . '/../repositories/orderrepository.php';

class OrderService
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function getOneOrder($order_id)
    {
        return $this->orderRepository->getOneOrder($order_id);
    }

    public function getOrdersByUserId($user_id)
    {
        return $this->orderRepository->getOrdersByUserId($user_id);
    }

    public function getOrdersItemsByOrderId($order_id)
    {
        return $this->orderRepository->getOrdersItemsByOrderId($order_id);
    }

    public function placeOrder($order)
    {
        return $this->orderRepository->placeOrder($order);
    }

    public function addOrderItem($order_item)
    {
        return $this->orderRepository->addOrderItem($order_item);
    }
}
