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

        $model = $this->merchandiseService->getAll();

        require __DIR__ . '/../views/home/merchandise.php';
    }

    public function cms()
    {
        session_start();
        //delete
        if (isset($_POST["delete"])) {
            $id = htmlspecialchars($_GET["deleteID"]);
            $this->merchandiseService->deleteOne($id);

            if ($this->merchandiseService) {
                echo "<script>alert('Merchandise deleted successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to delete merchandise. ')</script>";
            }
        }
        //add
        if (isset($_POST["add"])) {
            $name = htmlspecialchars($_POST["name"]);
            $description = htmlspecialchars($_POST["description"]);
            $photo = htmlspecialchars($_POST["photo"]);
            $price = htmlspecialchars($_POST["price"]);
            $size = htmlspecialchars($_POST["size"]);
            $stock = htmlspecialchars($_POST["stock"]);
            $product_id = htmlspecialchars($_POST["product_id"]);

            $merchandise = new Merchandise();

            $merchandise->setName($name);
            $merchandise->setDescription($description);
            $merchandise->setPhoto("/img/" . $photo);
            $merchandise->setPrice($price);
            $merchandise->setSize($size);
            $merchandise->setStock($stock);
            $merchandise->setProduct_id($product_id);

            $this->merchandiseService->addOne($merchandise);

            if ($this->merchandiseService) {
                echo "<script>alert('Merchandise addedd successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to add merchandise. ')</script>";
            }
        }
        //edit
        if (isset($_POST["edit"])) {
            $id = htmlspecialchars($_GET["updateID"]);
            $updateMerchandise = $this->merchandiseService->getOne($id);
        }
        //update
        if (isset($_POST["update"])) {
            $name = htmlspecialchars($_POST["changedName"]);
            $description = htmlspecialchars($_POST["changedDescription"]);
            $photo = htmlspecialchars($_POST["changedPhoto"]);
            $price = htmlspecialchars($_POST["changedPrice"]);
            $size = htmlspecialchars($_POST["changedSize"]);
            $stock = htmlspecialchars($_POST["changedStock"]);
            $product_id = htmlspecialchars($_POST["changedProduct_id"]);

            $merchandise = new Merchandise();

            $merchandise->setName($name);
            $merchandise->setDescription($description);
            $merchandise->setPhoto("/img/" . $photo);
            $merchandise->setPrice($price);
            $merchandise->setSize($size);
            $merchandise->setStock($stock);
            $merchandise->setProduct_id($product_id);

            $this->merchandiseService->updateOne($merchandise, $_GET["updateID"]);

            if ($this->merchandiseService) {
                echo "<script>alert('Merchandise updated successfully. ')</script>";
            } else {
                echo "<script>alert('Failed to update merchandise. ')</script>";
            }
        }

        $model = $this->merchandiseService->getAll();

        require __DIR__ . '/../views/cms/merchandise.php';
    }
}
