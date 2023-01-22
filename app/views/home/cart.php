<?php
include __DIR__ . '/../header.php';
$productService = new ProductService();

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
?>

<div class="containter-fluid py-5">
    <div class="text-center mb-5">
        <h2 class="text-light text-center">Shopping Cart</h2>
    </div>
    <div class="row px-5">
        <div class="col-md-7 mt-4">
            <div class="shopping-cart">
                <?php
                $total = 0;
                if (isset($_SESSION['shopping-cart'])) {
                    $product_id = array_column($_SESSION['shopping-cart'], 'product_id');
                    foreach ($product_id as $id) {
                        $product = $productService->getOne($id);
                ?>
                        <form action="/home/cart?action=remove&id=<?= $product->getProduct_id() ?>" method="post" class="cart-items product-data">
                            <div class="">
                                <div class="row bg-dark">
                                    <div class="col-md-3 pl-0">
                                        <img src="<?= $product->getProduct_photo() ?>" alt="Product" class="img-fluid">
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="pt-2 text-white"><?= $product->getProduct_name() ?></h5>
                                        <small class="text-secondary text-white">Available stock: <?= $product->getProduct_stock() ?></small>
                                        <h5 class="pt-2 text-white">Price per unit: &euro; <label id="pricePERunit"><?php echo $product->getProduct_price(); ?></label></h5>
                                        <!-- <h5 class="pt-2">Price in total: &euro; <label id="priceINtotal"><?php //echo $product->getProduct_price(); 
                                                                                                                ?></label></h5> -->
                                        <button type="submit" class="btn btn-danger" name="remove">Remove product from cart</button>
                                    </div>
                                    <div class="col-md-3 py-5">
                                        <div>
                                            <button type="button" class="btn bg-light border rounded-circle decrement-btn"><i class="fas fa-minus"></i></button>
                                            <input type="text" name="test" value="1" class="form-control w-25 p-2 d-inline input-qty" id="test" disabled>
                                            <button type="button" class="btn bg-light border rounded-circle increment-btn"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                <?php
                        $unitPrice = $product->getProduct_price();
                        $total += $unitPrice;
                    }
                } else {
                    echo "<h5>Your cart is empty</h5>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-dark h-25">
            <div class="pt-4 text-white">
                <h6 class="text-center">Order Details</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION['shopping-cart'])) {
                            $count = count($_SESSION['shopping-cart']);
                            echo "<h6>Price ($count items)</h6>";
                        } else {
                            echo "<h6>Price (0 items)</h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Total Price</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>&euro; <?php echo $total; ?></h6>
                        <h6 class="text-success"> FREE </h6>
                        <hr>
                        <h6>&euro; <?php echo $total; ?></h6>
                    </div>
                </div>
                <hr>
                <a class="btn btn-success d-flex justify-content-center mb-3" href="/home/checkout">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".increment-btn").click(function(e) {
            e.preventDefault();
            var qty = $(this).closest(".product-data").find(".input-qty").val();
            var value = parseInt(qty, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).closest(".product-data").find(".input-qty").val(value);
            }
        });

        $(".decrement-btn").click(function(e) {
            e.preventDefault();
            var qty = $(this).closest(".product-data").find(".input-qty").val();
            var value = parseInt(qty, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest(".product-data").find(".input-qty").val(value);
            }
        });
    });

    // const qtyEl = document.getElementById('test');
    // const valueEL = document.getElementById('pricePERunit');
    // const totalEl = document.getElementById('priceINtotal');

    // const setTotal = () => {
    //     var qty = qtyEl.value;
    //     var value = valueEL.value;
    //     var total = qty * value;
    //     totalEl.innerText = total;
    // };
</script>

<?php
include __DIR__ . '/../footer.php';
?>