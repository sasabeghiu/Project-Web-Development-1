<?php
require __DIR__ . '/../repositories/eventrepository.php';

class EventService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EventRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getOne($id)
    {
        return $this->repository->getOne($id);
    }

    public function addOne($event)
    {
        $this->repository->addOne($event);
    }

    public function updateOne($event, $id)
    {
        $this->repository->updateOne($event, $id);
    }

    public function deleteOne($id)
    {
        return $this->repository->deleteOne($id);
    }
}
