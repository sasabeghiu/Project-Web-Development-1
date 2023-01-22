<?php
$eventService = new EventService();

//checks if delete form was submitted and deletes a item from db, then refreshes the page using JS
if (isset($_POST["delete"])) {
    $id = htmlspecialchars($_GET["deleteID"]);
    $eventService->deleteOne($id);

    if ($eventService) {
        echo "<script>alert('Event deleted successfully. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
    } else {
        echo "<script>alert('Failed to delete event. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
    }
}

//navbar
include __DIR__ . '/../headerCms.php';
?>

<h1 class="text-center text-light">CRUD Operations for Events</h1>
<div>
    <button class="btn btn-success mb-2" id="show-add-form">Add event</button>
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
        <div class="form-group row mb-1">
            <label for="datetime" class="col-sm-2 col-form-label text-light">DateTime:</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="location" class="col-sm-2 col-form-label text-light">Location:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" name="location">
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="ticketsAvailable" class="col-sm-2 col-form-label text-light">TicketsAvailable:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ticketsAvailable" name="ticketsAvailable" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="price" class="col-sm-2 col-form-label text-light">Price:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
        </div>
        <div class="form-group row mb-1">
            <label for="product_id" class="col-sm-2 col-form-label text-light">Product ID:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="product_id" name="product_id" required>
            </div>
        </div>
        <input type="submit" value="Insert event" name="add" class="form-control btn btn-primary mb-1">
    </form>
</div>
<!-- hidden form to add a new item finish-->

<!--ADD -  checks if adding form was submitted and adds a new item to db -->
<?php
if (isset($_POST["add"]) != "") {
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $photo = htmlspecialchars($_POST["photo"]);
    $datetime = htmlspecialchars($_POST["datetime"]);
    $location = htmlspecialchars($_POST["location"]);
    $ticketsAvailable = htmlspecialchars($_POST["ticketsAvailable"]);
    $price = htmlspecialchars($_POST["price"]);
    $product_id = htmlspecialchars($_POST["product_id"]);

    $event = new Event();

    $event->setName($name);
    $event->setDescription($description);
    $event->setPhoto("/img/" . $photo);
    $event->setDatetime($datetime);
    $event->setLocation($location);
    $event->setTicketsAvailable($ticketsAvailable);
    $event->setPrice($price);
    $merchandise->setProduct_id($product_id);

    $eventService->addOne($event);

    if ($eventService) {
        echo "<script>alert('Event addedd successfully. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
    } else {
        echo "<script>alert('Failed to add event. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
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
            <th scope="col">Date/Time</th>
            <th scope="col">Location</th>
            <th scope="col">Tickets</th>
            <th scope="col">Price</th>
            <th scope="col">Product ID</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $event) {
            $date = new DateTimeImmutable($event->getDatetime());
        ?>
            <tr>
                <td><?= $event->getId() ?></td>
                <td><?= $event->getName() ?></td>
                <td><?= $event->getDescription() ?></td>
                <td><img src="<?= $event->getPhoto() ?>" class="product-card img" height="300"></td>
                <td><?php echo $date->format('d-m-Y H:i'); ?></td>
                <td><?= $event->getLocation() ?></td>
                <td><?= $event->getTicketsAvailable() ?></td>
                <td><?= $event->getPrice() ?> &euro;</td>
                <td><?= $event->getProduct_id() ?></td>
                <td>
                    <form action="/event/cms?updateID=<?= $event->getId() ?>" method="POST">
                        <input type="hidden" name="edit" value="<?= $event->getId() ?>">
                        <input type="submit" name="submit" value="Edit" class="btn btn-warning">
                    </form>
                </td>
                <td>
                    <form action="/event/cms?deleteID=<?= $event->getId() ?>" method="POST">
                        <input type="hidden" name="delete" value="<?= $event->getId() ?>">
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
    $event = $eventService->getOne($id);
?>
    <h3 class="text-light">Edit event #<?= $event->getId() ?></h3>
    <div>
        <form method="POST">
            <div class="form-group row mb-1">
                <label for="changedName" class="col-sm-2 col-form-label text-light">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedName" name="changedName" value="<?= $event->getName() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedDescription" class="col-sm-2 col-form-label text-light">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="changedDescription" name="changedDescription"><?= $event->getDescription() ?></textarea>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPhoto" class="col-sm-2 col-form-label text-light">Photo:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="changedPhoto" name="changedPhoto" value="<?= $event->getPhoto() ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedTime" class="col-sm-2 col-form-label text-light">DateTime:</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" id="changedTime" name="changedTime" value="<?= $event->getDatetime() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedLocation" class="col-sm-2 col-form-label text-light">Location:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="changedLocation" name="changedLocation" value="<?= $event->getLocation() ?>">
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedTicketsAvailable" class="col-sm-2 col-form-label text-light">TicketsAvailable:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedTicketsAvailable" name="changedTicketsAvailable" value="<?= $event->getTicketsAvailable() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedPrice" class="col-sm-2 col-form-label text-light">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedPrice" name="changedPrice" value="<?= $event->getPrice() ?>" required>
                </div>
            </div>
            <div class="form-group row mb-1">
                <label for="changedProduct_id" class="col-sm-2 col-form-label text-light">Product ID:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="changedProduct_id" name="changedProduct_id" value="<?= $merch->getProduct_id() ?>" required>
                </div>
            </div>
            <input type="submit" value="Update Event" class="form-control btn btn-primary mb-1">
        </form>
    </div>
    <?php
}

if (isset($_POST["changedName"]) != "") {
    $name = htmlspecialchars($_POST["changedName"]);
    $description = htmlspecialchars($_POST["changedDescription"]);
    $photo = htmlspecialchars($_POST["changedPhoto"]);
    $datetime = htmlspecialchars($_POST["changedTime"]);
    $location = htmlspecialchars($_POST["changedLocation"]);
    $ticketsAvailable = htmlspecialchars($_POST["changedTicketsAvailable"]);
    $price = htmlspecialchars($_POST["changedPrice"]);
    $product_id = htmlspecialchars($_POST["changedProduct_id"]);

    $event = new Event();

    $event->setName($name);
    $event->setDescription($description);
    $event->setPhoto("/img/" . $photo);
    $event->setDatetime($datetime);
    $event->setLocation($location);
    $event->setTicketsAvailable($ticketsAvailable);
    $event->setPrice($price);
    $merchandise->setProduct_id($product_id);

    $eventService->updateOne($event, $_GET["updateID"]);

    if ($eventService) {
        echo "<script>alert('Event updated successfully. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
    } else {
        echo "<script>alert('Failed to update event. ')</script>";
        echo "<script>window.location = '/event/cms'</script>";
    }
}
?>
<!-- UPDATE part finish -->

<?php
include __DIR__ . '/../footer.php';
?>