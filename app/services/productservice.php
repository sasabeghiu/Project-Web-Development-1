<?php
require __DIR__ . '/../repositories/productrepository.php';

class ProductService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }
}
