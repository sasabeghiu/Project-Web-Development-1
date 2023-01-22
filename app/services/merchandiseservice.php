<?php
require __DIR__ . '/../repositories/merchandiserepository.php';

class MerchandiseService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new MerchandiseRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function addOne($merchandise)
    {
        $this->repository->addOne($merchandise);
    }

    public function updateOne($merchandise, $id)
    {
        $this->repository->updateOne($merchandise, $id);
    }

    public function deleteOne($id)
    {
        return $this->repository->deleteOne($id);
    }
}
