<?php
require __DIR__ . '/../services/productservice.php';
require __DIR__ . '/../services/orderservice.php';

class HomeController
{
    private $productService;
    private $orderService;

    function __construct()
    {
        $this->productService = new ProductService();
        $this->orderService = new OrderService();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }

    public function cart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_POST['remove'])) {
            if ($_GET['action'] == 'remove') {
                foreach ($_SESSION['shopping-cart'] as $key => $value) {
                    if ($value["product_id"] == $_GET['id']) {
                        unset($_SESSION['shopping-cart'][$key]);
                        echo "<script>alert('Product has been removed from your shopping cart. ')</script>";
                        echo "<script>window.location = '/home/cart'</script>";
                    }
                }
            }
        }

        if (isset($_SESSION['shopping-cart'])) {
            $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
            foreach ($product_id as $id) {
                $product = $this->productService->getOne($id);
                $products[] = $product;
            }
        }

        require __DIR__ . '/../views/home/cart.php';
    }

    public function checkout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['shopping-cart'])) {
            $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
            foreach ($product_id as $id) {
                $product = $this->productService->getOne($id);
                $products[] = $product;
            }
        }

        if (isset($_POST["placeOrder"])) {
            $user_id = $_SESSION["user"];
            $user_email = htmlspecialchars($_POST["email"]);
            $user_firstname = htmlspecialchars($_POST["firstName"]);
            $user_lastname = htmlspecialchars($_POST["lastName"]);
            $user_address = htmlspecialchars($_POST["address"]);
            $user_country = htmlspecialchars($_POST["country"]);
            $user_zipcode = htmlspecialchars($_POST["zipCode"]);
            $order_totalprice = $_SESSION["total"];

            $order = new Order();

            $order->setUser_id($user_id);
            $order->setUser_email($user_email);
            $order->setUser_firstname($user_firstname);
            $order->setUser_lastname($user_lastname);
            $order->setUser_address($user_address);
            $order->setUser_country($user_country);
            $order->setUser_zipcode($user_zipcode);
            $order->setOrder_totalprice($order_totalprice);


            if (isset($_SESSION['shopping-cart'])) {
                $count = count($_SESSION['shopping-cart']);
                if ($count > 0) {
                    $this->orderService->placeOrder($order);
                }
            } else {
                echo "<script>alert('You can not place an empty order. Add something to shopping cart. ')</script>";
                echo "<script>window.location = '/home/cart'</script>";
            }

            if ($this->orderService) {
                if (isset($_SESSION['shopping-cart'])) {
                    $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
                    foreach ($product_id as $id) {
                        $product = $this->productService->getOne($id);

                        $orderid = htmlspecialchars($order->getOrder_id());
                        $productid = htmlspecialchars($product->getProduct_id());
                        $productqty = 1;
                        $productprice = htmlspecialchars($product->getProduct_price());

                        $orderItem = new Order_Item();

                        $orderItem->setOrder_id($orderid);
                        $orderItem->setProduct_id($productid);
                        $orderItem->setProduct_qty($productqty);
                        $orderItem->setProduct_price($productprice);

                        $this->orderService->addOrderItem($orderItem);
                    }
                    unset($_SESSION['shopping-cart']);
                    echo "<script>alert('You have placed an order successfully. ')</script>";
                    echo "<script>window.location = '/order'</script>";
                }
            } else {
                echo "<script>alert('There was an error while placing the order, please try again. ')</script>";
            }
        }

        require __DIR__ . '/../views/home/chekout.php';
    }
}
