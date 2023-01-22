<?php
require __DIR__ . '/../../services/residentservice.php';

class ResidentController
{
    private $residentService;

    function __construct()
    {
        $this->residentService = new ResidentService();
    }

    // router maps this to /api/resident automatically
    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");

        // Respond to a GET request to /api/resident
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $residents = $this->residentService->getAll();
            header('Content-Type: application/json');
            echo json_encode($residents);
        }

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $body = file_get_contents('php://input');
            $object = json_decode($body);

            $resident = new Resident();
            $resident->setName(htmlspecialchars($object->name));
            $resident->setDescription(htmlspecialchars($object->description));
            $resident->setPhoto(htmlspecialchars("/img/" . $object->photo));

            $this->residentService->addOne($resident);

            header('Content-Type: application/json');
            echo json_encode($resident);
        }
    }
}
