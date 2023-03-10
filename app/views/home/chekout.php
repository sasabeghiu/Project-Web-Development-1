<?php
include __DIR__ . '/../header.php';
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
                $_SESSION["total"] = 0;
                if (isset($_SESSION['shopping-cart']) && count($_SESSION['shopping-cart']) > 0) {
                    foreach ($products as $product) {
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
                        $_SESSION["total"] += $unitPrice;
                    }
                }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (EUR)</span>
                        <strong>&euro;<?= $_SESSION["total"] ?> </strong>
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
                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="placeOrder">Place order</button>
                </form>
            </div>
        </div>
    </form>

    <?php
    include __DIR__ . '/../footer.php';
    ?>