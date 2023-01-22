<?php
require __DIR__ . '/../services/orderservice.php';

class OrderController
{
    private $orderService;

    function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/myorders.php';
    }

    public function cms()
    {
        $model = $this->orderService->getAllOrders();

        require __DIR__ . '/../views/cms/order.php';
    }
}
