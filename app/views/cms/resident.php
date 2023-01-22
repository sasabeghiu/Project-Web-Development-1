<?php
$residentService = new ResidentService();

//checks if delete form was submitted and deletes a item from db, then refreshes the page using JS
if (isset($_POST["delete"])) {
    $id = htmlspecialchars($_GET["deleteID"]);
    $residentService->deleteOne($id);

    if ($residentService) {
        echo "<script>alert('Resident deleted successfully. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    } else {
        echo "<script>alert('Failed to delete resident. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    }
}

//navbar
include __DIR__ . '/../headerCms.php';
?>

<h1 class="text-center text-light">CRUD Operations for Residents</h1>
<div>
    <button class="btn btn-success mb-2" id="show-add-form">Add resident</button>
</div>

<!-- hidden form to add a new item -->
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
<!-- hidden form to add a new item finish -->

<!-- ADD - checks if adding form was submitted -->
<?php
if (isset($_POST["add"])) {
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $photo = htmlspecialchars($_POST["photo"]);

    $resident = new Resident();

    $resident->setName($name);
    $resident->setDescription($description);
    $resident->setPhoto("/img/" . $photo);

    $residentService->addOne($resident);

    if ($residentService) {
        echo "<script>alert('Resident addedd successfully. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    } else {
        echo "<script>alert('Failed to add resident. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    }
}
?>
<!-- ADD finish -->

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
<!-- display data finish -->

<!-- script to display add form if add button was clicked -->
<script>
    document.getElementById('show-add-form').addEventListener('click', function() {
        document.getElementById('form-add-container').style.display = 'block';
    });
</script>
<!-- script finish -->

<!-- UPDATE part start -->
<?php
if (isset($_POST["edit"])) {
    $id = htmlspecialchars($_GET["updateID"]);
    $resident = $residentService->getOne($id);
?>
    <h3 class="text-light">Edit resident #<?= $resident->getId() ?></h3>
    <div>
        <form method="POST">
            <div class="form-group row mb-1">
                <label for="changedName" class="col-sm-2 col-form-label text-light">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedName" name="changedName" value="<?= $resident->getName() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedDescription" class="col-sm-2 col-form-label text-light">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="changedDescription" id="changedDescription"><?= $resident->getDescription() ?></textarea>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPhoto" class="col-sm-2 col-form-label text-light">Photo:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="changedPhoto" name="changedPhoto" value="<?= $resident->getPhoto() ?>">
                </div>
            </div>
            <input type="submit" value="Update Resident" class="form-control btn btn-primary mb-1">
        </form>
    </div>
<?php
}

if (isset($_POST["changedName"]) != "") {
    $name = htmlspecialchars($_POST["changedName"]);
    $description = htmlspecialchars($_POST["changedDescription"]);
    $photo = htmlspecialchars($_POST["changedPhoto"]);

    $resident = new Resident();

    $resident->setName($name);
    $resident->setDescription($description);
    $resident->setPhoto("/img/" . $photo);

    $residentService->updateOne($resident, $_GET["updateID"]);

    if ($residentService) {
        echo "<script>alert('Resident updated successfully. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    } else {
        echo "<script>alert('Failed to update resident. ')</script>";
        echo "<script>window.location = '/resident/cms'</script>";
    }
}
?>
<!-- UPDATE part finish -->

<?php
include __DIR__ . '/../footer.php';
?>