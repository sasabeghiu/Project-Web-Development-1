<?php
include __DIR__ . '/../headerCms.php';
?>

<h1 class="text-center text-light">Read Orders</h1>

<!-- display data -->
<table class="table table-striped table-dark table-responsive">
    <thead>
        <tr>
            <th scope="col">OrderID</th>
            <th scope="col">UserID</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Country</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Total Price</th>
            <th scope="col">Created at</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($model as $order) {
            $timestamp = $order->getCreated_at();
            $timestamp = date('d-m-Y H:i:s')
        ?>
            <tr>
                <td><?= $order->getOrder_id() ?></td>
                <td><?= $order->getUser_id() ?></td>
                <td><?= $order->getUser_email() ?></td>
                <td><?= $order->getUser_firstname() ?></td>
                <td><?= $order->getUser_lastname() ?></td>
                <td><?= $order->getUser_address() ?></td>
                <td><?= $order->getUser_country() ?></td>
                <td><?= $order->getUser_zipcode() ?></td>
                <td><?= $order->getOrder_totalprice() ?> &euro;</td>
                <td><?= $timestamp ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
include __DIR__ . '/../footer.php';
?>