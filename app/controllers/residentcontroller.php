<?php
require __DIR__ . '/../services/residentservice.php';

class ResidentController
{
    private $residentService;

    function __construct()
    {
        $this->residentService = new ResidentService();
    }

    public function index()
    {
        $model = $this->residentService->getAll();

        require __DIR__ . '/../views/home/resident.php';
    }

    public function cms()
    {
        $model = $this->residentService->getAll();

        require __DIR__ . '/../views/cms/resident.php';
    }
}
