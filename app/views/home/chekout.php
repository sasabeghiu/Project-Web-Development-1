<?php
include __DIR__ . '/../header.php';

$productService = new ProductService();
$orderService = new OrderService();
?>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    #productImg {
        width: 100px;
    }
</style>
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="text-light text-center">Checkout form</h2>
    </div>
    <form action="" method="post">
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary text-white">Your cart</span>
                    <span class="badge bg-white rounded-pill">
                        <span class="text-black">
                            <?php
                            if (isset($_SESSION['shopping-cart'])) {
                                $count = count($_SESSION['shopping-cart']);
                                echo "$count";
                            } else {
                                echo "0";
                            }
                            ?>
                        </span>
                    </span>
                </h4>
                <?php
                $total = 0;
                if (isset($_SESSION['shopping-cart'])) {
                    $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
                    foreach ($product_id as $id) {
                        $product = $productService->getOne($id);
                ?>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div class="col-md-3">
                                    <img src="<?= $product->getProduct_photo() ?>" alt="" id="productImg">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="my-0"><?= $product->getProduct_name() ?></h6>
                                    <small class="text-muted">Available stock: <?= $product->getProduct_stock() ?></small>
                                </div>
                                <span class="text-muted">&euro;<?= $product->getProduct_price() ?></span>
                            </li>
                    <?php
                        $unitPrice = $product->getProduct_price();
                        $total = $total + $unitPrice;
                    }
                }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (EUR)</span>
                        <strong>&euro;<?= $total ?> </strong>
                    </li>
                        </ul>
            </div>

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3 text-light">Billing address</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label text-light">First name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label text-light">Last name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label text-light">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label text-light">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="country" class="form-label text-light">Country</label>
                            <input type="text" class="form-control" name="country" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid country is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="zipCode" class="form-label text-light">Zip Code</label>
                            <input type="text" class="form-control" name="zipCode" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid zip code is required.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Place order</button>
                </form>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST["firstName"]) != "") {
        $user_id = $_SESSION["user"];
        $user_email = htmlspecialchars($_POST["email"]);
        $user_firstname = htmlspecialchars($_POST["firstName"]);
        $user_lastname = htmlspecialchars($_POST["lastName"]);
        $user_address = htmlspecialchars($_POST["address"]);
        $user_country = htmlspecialchars($_POST["country"]);
        $user_zipcode = htmlspecialchars($_POST["zipCode"]);
        $order_totalprice = $total;

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
                $orderService->placeOrder($order);
            }
        } else {
            echo "<script>alert('You can not place an empty order. Add something to shopping cart. ')</script>";
            echo "<script>window.location = '/home/cart'</script>";
        }

        if ($orderService) {
            if (isset($_SESSION['shopping-cart'])) {
                $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
                foreach ($product_id as $id) {
                    $product = $productService->getOne($id);

                    $orderid = htmlspecialchars($order->getOrder_id());
                    $productid = htmlspecialchars($product->getProduct_id());
                    $productqty = 1;
                    $productprice = htmlspecialchars($product->getProduct_price());

                    $orderItem = new Order_Item();

                    $orderItem->setOrder_id($orderid);
                    $orderItem->setProduct_id($productid);
                    $orderItem->setProduct_qty($productqty);
                    $orderItem->setProduct_price($productprice);

                    $orderService->addOrderItem($orderItem);
                }
                unset($_SESSION['shopping-cart']);
                echo "<script>alert('You have placed an order successfully. ')</script>";
                echo "<script>window.location = '/order'</script>";
            }
        } else {
            echo "<script>alert('There was an error while placing the order, please try again. ')</script>";
            echo "<script>window.location = '/home/checkout'</script>";
        }
    }
    ?>

    <?php
    include __DIR__ . '/../footer.php';
    ?>