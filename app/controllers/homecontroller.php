<?php
require __DIR__ . '/../services/productservice.php';
require __DIR__ . '/../services/orderservice.php';

class HomeController
{
    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }

    public function cart()
    {
        require __DIR__ . '/../views/home/cart.php';
    }

    public function checkout()
    {
        require __DIR__ . '/../views/home/chekout.php';
    }
}
