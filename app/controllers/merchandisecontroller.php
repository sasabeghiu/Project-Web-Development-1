<?php
require __DIR__ . '/../services/merchandiseservice.php';

class MerchandiseController
{
    private $merchandiseService;

    function __construct()
    {
        $this->merchandiseService = new MerchandiseService();
    }

    public function index()
    {
        $model = $this->merchandiseService->getAll();

        require __DIR__ . '/../views/home/merchandise.php';
    }

    public function cms()
    {
        $model = $this->merchandiseService->getAll();

        require __DIR__ . '/../views/cms/merchandise.php';
    }
}
