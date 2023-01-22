<?php
include __DIR__ . '/../header.php';

if (isset($_POST['add-to-cart'])) {
    //print_r($_POST['product_id']);
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
            //print_r($_SESSION['shopping-cart']);
        }
    } else {
        $items_array = array(
            'product_id' => $_POST['product_id']
        );
        //Create new session variable
        $_SESSION['shopping-cart'][0] = $items_array;
        //print_r(($_SESSION['shopping-cart']));
    }
?>
    <script type="text/javascript">
        window.location.href = '/event';
    </script>
<?php
}
?>

<div class="album py-5">
    <div class="container mb-5">
        <h2 class="text-light text-center">Events</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach ($model as $event) {
                $date_string = $event->getDatetime();
                $date = new DateTime($date_string);
                $formated = $date->format("l, j F Y h:i A");
            ?>
                <form action="event" method="post">
                    <div class="col">
                        <div class="card shadow-sm text-light bg-dark">
                            <img src="<?= $event->getPhoto() ?>" class="product-card img" height="570">
                            <div class="card-body">
                                <p class="card-text fw-bold"><?= $event->getName() ?></p>
                                <p class="card-text"><?= $event->getDescription() ?></p><br>
                                <small class="text-muted"><i class="fa-solid fa-location-dot"></i> <?= $event->getLocation() ?></small><br>
                                <small class="text-muted"><i class="fa-solid fa-calendar-days"></i> <? echo $formated; ?></small><br>
                                <small class="text-muted"><i class="fa-solid fa-ticket-simple"></i> <?= $event->getTicketsAvailable() ?> available tickets</small>
                            </div>
                            <div class="card-footer">
                                <span class="fw-bold fs-4 price float-start">&euro; <?= $event->getPrice() ?></span>
                                <button type="submit" class="round btn btn-secondary float-end" name="add-to-cart"> Add to cart <i class="fas fa-shopping-cart"></i></button>
                                <input type="hidden" name="product_id" value="<?= $event->getProduct_id() ?>">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include __DIR__ . '/../footer.php';
?>