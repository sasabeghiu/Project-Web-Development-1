<?php
require __DIR__ . '/../services/eventservice.php';

class EventController
{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index()
    {
        $model = $this->eventService->getAll();

        require __DIR__ . '/../views/home/event.php';
    }

    public function cms()
    {
        $model = $this->eventService->getAll();

        require __DIR__ . '/../views/cms/event.php';
    }
}
