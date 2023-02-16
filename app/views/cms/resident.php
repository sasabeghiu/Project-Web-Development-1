<?php
include __DIR__ . '/../headerCms.php';
?>

<h1 class="text-center text-light">CRUD Operations for Residents</h1>
<div>
    <button class="btn btn-success mb-2" id="show-add-form">Add resident</button>
</div>

<!-- hidden form to add a new resident -->
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
        <input type="submit" name="add" value="Insert Resident" class="form-control btn btn-primary mb-1">
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
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $resident) {
        ?>
            <tr>
                <td><?= $resident->getId() ?></td>
                <td><?= $resident->getName() ?></td>
                <td><?= $resident->getDescription() ?></td>
                <td><img src="<?= $resident->getPhoto() ?>" class="product-card img" height="300"></td>
                <td>
                    <form action="/resident/cms?updateID=<?= $resident->getId() ?>" method="POST">
                        <input type="hidden" name="edit" value="<?= $resident->getId() ?>">
                        <input type="submit" name="submit" value="Edit" class="btn btn-warning">
                    </form>
                </td>
                <td>
                    <form action="/resident/cms?deleteID=<?= $resident->getId() ?>" method="POST">
                        <input type="hidden" name="delete" value="<?= $resident->getId() ?>">
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
    <h3 class="text-light">Edit resident #<?= $updateResident->getId() ?></h3>
    <div>
        <form method="POST">
            <div class="form-group row mb-1">
                <label for="changedName" class="col-sm-2 col-form-label text-light">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedName" name="changedName" value="<?= $updateResident->getName() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedDescription" class="col-sm-2 col-form-label text-light">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="changedDescription" id="changedDescription"><?= $updateResident->getDescription() ?></textarea>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPhoto" class="col-sm-2 col-form-label text-light">Photo:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="changedPhoto" name="changedPhoto" value="<?= $updateResident->getPhoto() ?>">
                </div>
            </div>
            <input type="submit" name="update" value="Update Resident" class="form-control btn btn-primary mb-1">
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