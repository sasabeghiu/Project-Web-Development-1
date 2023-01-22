<?php
require __DIR__ . '/../repositories/residentrepository.php';

class ResidentService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ResidentRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function addOne($resident)
    {
        $this->repository->addOne($resident);
    }

    public function updateOne($resident, $id)
    {
        $this->repository->updateOne($resident, $id);
    }

    public function deleteOne($id)
    {
        return $this->repository->deleteOne($id);
    }
}
