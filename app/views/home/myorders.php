<?php
include __DIR__ . '/../header.php';
$orderService = new OrderService();
?>

<div class="album py-5">
    <div class="container mb-5">
        <h2 class="text-light text-center">My orders</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $model = $orderService->getOrdersByUserId($_SESSION["user"]);
            if ($model) {
                foreach ($model as $order) {
            ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="" class="product-card img">
                            <div class="card-body text-light bg-dark">
                                <p class="card-text">Order ID: <span style="font-weight:bold"><?= $order->getOrder_id() ?></span></p>
                                <p class="card-text">Your Email: <span style="font-weight:bold"><?= $order->getUser_email() ?></span></p>
                                <p class="card-text">Your First Name: <span style="font-weight:bold"><?= $order->getUser_firstname() ?></span></p>
                                <p class="card-text">Your Last Name: <span style="font-weight:bold"><?= $order->getUser_lastname() ?></span></p>
                                <p class="card-text">Your Address: <span style="font-weight:bold"><?= $order->getUser_address() ?></span></p>
                                <p class="card-text">Your Country: <span style="font-weight:bold"><?= $order->getUser_country() ?></span></p>
                                <p class="card-text">Your Zip Code: <span style="font-weight:bold"><?= $order->getUser_zipcode() ?></span></p>
                                <p class="card-text">Order total price: <span style="font-weight:bold"><?= $order->getOrder_totalprice() ?> &euro; </span></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<h5>You do not have any orders placed yet. </h5   >";
            }
            ?>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../footer.php';
?>