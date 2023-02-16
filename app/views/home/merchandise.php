<?php
include __DIR__ . '/../header.php';
?>

<div class="album py-5">
    <div class="container mb-5">
        <h2 class="text-light text-center">Merchandise</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach ($model as $merchandise) {
            ?>
                <form action="merchandise" method="post">
                    <div class="col">
                        <div class="card shadow-sm text-light bg-dark">
                            <img src="<?= $merchandise->getPhoto() ?>" class="product-card img" height="450">
                            <div class="card-body">
                                <p class="card-text fw-bold"><?= $merchandise->getName() ?></p>
                                <p class="card-text displayinline"><?= $merchandise->getDescription() ?></p>
                                <small class="text-muted"><i class="fa-sharp fa-solid fa-ruler-combined"></i> <?= $merchandise->getSize() ?></small><br>
                                <small class="text-muted"><i class="fa-solid fa-shirt"></i> <?= $merchandise->getStock() ?></small><br>
                            </div>
                            <div class="card-footer">
                                <span class="fw-bold fs-4 price float-start">&euro; <?= $merchandise->getPrice() ?></span>
                                <button type="submit" class="round btn btn-secondary float-end" name="add-to-cart"> Add to cart <i class="fas fa-shopping-cart"></i></button>
                                <input type="hidden" name="product_id" value="<?= $merchandise->getProduct_id() ?>">
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