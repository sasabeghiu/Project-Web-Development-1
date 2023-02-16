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
        session_start();
        if (isset($_POST['add-to-cart'])) {
            if (isset($_SESSION['shopping-cart'])) {
                $items_array_id = array_column($_SESSION['shopping-cart'], "product_id");
                if (in_array($_POST['product_id'], $items_array_id)) {
                    echo "<script>alert('This product is already in your shopping cart. You can change the quantity in the shopping cart page.')</script>";
                    echo "<script>window.location = '/home/cart'</script>";
                } else {
                    $count = count($_SESSION['shopping-cart']);
                    $items_array = array(
                        'product_id' => $_POST['product_id']
                    );
                    $_SESSION['shopping-cart'][$count] = $items_array;
                }
            } else {
                $items_array = array(
                    'product_id' => $_POST['product_id']
                );
                //Create new session variable
                $_SESSION['shopping-cart'][0] = $items_array;
            }
        }

        $model = $this->eventService->getAll();

        require __DIR__ . '/../views/home/event.php';
    }

    public function cms()
    {
        session_start();
        //delete
        if (isset($_POST["delete"])) {
            $id = htmlspecialchars($_GET["deleteID"]);
            $this->eventService->deleteOne($id);

            if ($this->eventService) {
                echo "<script>alert('Event deleted successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to delete event. ')</script>";
            }
        }
        //add
        if (isset($_POST["add"])) {
            $name = htmlspecialchars($_POST["name"]);
            $description = htmlspecialchars($_POST["description"]);
            $photo = htmlspecialchars($_POST["photo"]);
            $datetime = htmlspecialchars($_POST["datetime"]);
            $location = htmlspecialchars($_POST["location"]);
            $ticketsAvailable = htmlspecialchars($_POST["ticketsAvailable"]);
            $price = htmlspecialchars($_POST["price"]);
            $product_id = htmlspecialchars($_POST["product_id"]);

            $event = new Event();

            $event->setName($name);
            $event->setDescription($description);
            $event->setPhoto("/img/" . $photo);
            $event->setDatetime($datetime);
            $event->setLocation($location);
            $event->setTicketsAvailable($ticketsAvailable);
            $event->setPrice($price);
            $event->setProduct_id($product_id);

            $this->eventService->addOne($event);

            if ($this->eventService) {
                echo "<script>alert('Event addedd successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to add event. ')</script>";
            }
        }
        //edit
        if (isset($_POST["edit"])) {
            $id = htmlspecialchars($_GET["updateID"]);
            $updateEvent = $this->eventService->getOne($id);
        }
        //update
        if (isset($_POST["update"])) {
            $name = htmlspecialchars($_POST["changedName"]);
            $description = htmlspecialchars($_POST["changedDescription"]);
            $photo = htmlspecialchars($_POST["changedPhoto"]);
            $datetime = htmlspecialchars($_POST["changedTime"]);
            $location = htmlspecialchars($_POST["changedLocation"]);
            $ticketsAvailable = htmlspecialchars($_POST["changedTicketsAvailable"]);
            $price = htmlspecialchars($_POST["changedPrice"]);
            $product_id = htmlspecialchars($_POST["changedProduct_id"]);

            $event = new Event();

            $event->setName($name);
            $event->setDescription($description);
            $event->setPhoto("/img/" . $photo);
            $event->setDatetime($datetime);
            $event->setLocation($location);
            $event->setTicketsAvailable($ticketsAvailable);
            $event->setPrice($price);
            $event->setProduct_id($product_id);

            $this->eventService->updateOne($event, $_GET["updateID"]);

            if ($this->eventService) {
                echo "<script>alert('Event updated successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to update event. ')</script>";
            }
        }

        $model = $this->eventService->getAll();

        require __DIR__ . '/../views/cms/event.php';
    }
}
