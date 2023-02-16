<?php
include __DIR__ . '/../headerCms.php';
?>

<h1 class="text-center text-light">CRUD Operations for Merchandise</h1>
<div>
    <button class="btn btn-success mb-2" id="show-add-form">Add merchandise</button>
</div>

<!-- hidden form to add a new merchandise -->
<div id="form-add-container" style="display: none;">
    <form method="POST">
        <div class="form-group row mb-1">
            <label for="name" class="col-sm-2 col-form-label text-light">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="description" class="col-sm-2 col-form-label text-light">Description:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="photo" class="col-sm-2 col-form-label text-light">Photo:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="price" class="col-sm-2 col-form-label text-light">Price:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="size" class="col-sm-2 col-form-label text-light">Size:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="size" name="size" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="stock" class="col-sm-2 col-form-label text-light">Stock:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="product_id" class="col-sm-2 col-form-label text-light">Product ID:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="product_id" name="product_id" required>
            </div>
        </div>
        <input type="submit" name="add" value="Insert Merchandise" class="form-control btn btn-primary mb-1">
    </form>
</div>

<!-- display data -->
<table class="table table-striped table-dark table-responsive">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Photo</th>
            <th scope="col">Price</th>
            <th scope="col">Size</th>
            <th scope="col">Stock</th>
            <th scope="col">Product ID</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $merchandise) {
        ?>
            <tr>
                <td><?= $merchandise->getId() ?></td>
                <td><?= $merchandise->getName() ?></td>
                <td class="displayinline"><?= $merchandise->getDescription() ?></td>
                <td><img src="<?= $merchandise->getPhoto() ?>" class="img-fluid"></td>
                <td><?= $merchandise->getPrice() ?> &euro;</td>
                <td><?= $merchandise->getSize() ?></td>
                <td><?= $merchandise->getStock() ?></td>
                <td><?= $merchandise->getProduct_id() ?></td>
                <td>
                    <form action="/merchandise/cms?updateID=<?= $merchandise->getId() ?>" method="POST">
                        <input type="hidden" name="edit" value="<?= $merchandise->getId() ?>">
                        <input type="submit" name="submit" value="Edit" class="btn btn-warning">
                    </form>
                </td>
                <td>
                    <form action="/merchandise/cms?deleteID=<?= $merchandise->getId() ?>" method="POST">
                        <input type="hidden" name="delete" value="<?= $merchandise->getId() ?>">
                        <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- UPDATE part -->
<?php
if (isset($_POST["edit"])) {
?>
    <h3 class="text-light">Edit merchandise #<?= $updateMerchandise->getId() ?></h3>
    <div>
        <form method="POST">
            <div class="form-group row mb-1">
                <label for="changedName" class="col-sm-2 col-form-label text-light">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedName" name="changedName" value="<?= $updateMerchandise->getName() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedDescription" class="col-sm-2 col-form-label text-light">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="changedDescription" name="changedDescription"><?= $updateMerchandise->getDescription() ?></textarea>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPhoto" class="col-sm-2 col-form-label text-light">Photo:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="changedPhoto" name="changedPhoto" value="<?= $updateMerchandise->getPhoto() ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPrice" class="col-sm-2 col-form-label text-light">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedPrice" name="changedPrice" value="<?= $updateMerchandise->getPrice() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedSize" class="col-sm-2 col-form-label text-light">Size:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedSize" name="changedSize" value="<?= $updateMerchandise->getSize() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedStock" class="col-sm-2 col-form-label text-light">Stock:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedStock" name="changedStock" value="<?= $updateMerchandise->getStock() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedProduct_id" class="col-sm-2 col-form-label text-light">Product ID:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedProduct_id" name="changedProduct_id" value="<?= $updateMerchandise->getProduct_id() ?>" required>
                </div>
            </div>
            <input type="submit" name="update" value="Update Merchandise" class="form-control btn btn-primary mb-1">
        </form>
    </div>
<?php
}
?>

<!-- script to display add form if add button was clicked -->
<script>
    document.getElementById('show-add-form').addEventListener('click', function() {
        document.getElementById('form-add-container').style.display = 'block';
    });
</script>

<?php
include __DIR__ . '/../footer.php';
?>