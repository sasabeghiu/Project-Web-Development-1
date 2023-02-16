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
        session_start();
        //delete
        if (isset($_POST["delete"])) {
            $id = htmlspecialchars($_GET["deleteID"]);
            $this->residentService->deleteOne($id);

            if ($this->residentService) {
                echo "<script>alert('Resident deleted successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to delete resident. ')</script>";
            }
        }
        //add
        if (isset($_POST["add"])) {
            $name = htmlspecialchars($_POST["name"]);
            $description = htmlspecialchars($_POST["description"]);
            $photo = htmlspecialchars($_POST["photo"]);

            $resident = new Resident();

            $resident->setName($name);
            $resident->setDescription($description);
            $resident->setPhoto("/img/" . $photo);

            $this->residentService->addOne($resident);

            if ($this->residentService) {
                echo "<script>alert('Resident addedd successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to add resident. ')</script>";
            }
        }
        //edit
        if (isset($_POST["edit"])) {
            $id = htmlspecialchars($_GET["updateID"]);
            $updateResident = $this->residentService->getOne($id);
        }
        //update
        if (isset($_POST["update"])) {
            $name = htmlspecialchars($_POST["changedName"]);
            $description = htmlspecialchars($_POST["changedDescription"]);
            $photo = htmlspecialchars($_POST["changedPhoto"]);

            $resident = new Resident();

            $resident->setName($name);
            $resident->setDescription($description);
            $resident->setPhoto("/img/" . $photo);

            $this->residentService->updateOne($resident, $_GET["updateID"]);

            if ($this->residentService) {
                echo "<script>alert('Resident updated successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to update resident. ')</script>";
            }
        }

        $model = $this->residentService->getAll();

        require __DIR__ . '/../views/cms/resident.php';
    }
}
