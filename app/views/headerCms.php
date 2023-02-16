<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["user"])) {
  header("Location: /user/login");
} else if ($_SESSION["userrole"] == "admin") {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIT 240 CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link type="text/css" rel="stylesheet" href="../mystyle.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-black mb-4">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="../img/test.png" alt="" class="logoheader"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link text-light" href="/resident/cms">Residents</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/event/cms">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/merchandise/cms">Merchandise</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/order/cms">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/">Home Page</a>
            </li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Logged in as: <?= $_SESSION["test"] ?> (<?= $_SESSION["user"] ?>)
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="/home/cart">
                    <i class="fas fa-shopping-cart"></i>
                    Shopping Cart
                    <?php
                    if (isset($_SESSION['shopping-cart'])) {
                      $count = count($_SESSION['shopping-cart']);
                      echo "<span id='card_count' class='text-dark bg-light fw-bold'>$count</span>";
                    } else {
                      echo "<span id='card_count' class='text-dark bg-light fw-bold'>0</span>";
                    }
                    ?></a></li>
                <li><a class="dropdown-item" href="/order">My Orders</a></li>
                <li><a class="dropdown-item" href="/user/logout">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
    </nav>
    <div class="container container-fluid">

    <?php
  } else {
    echo "<script>alert('You do not have the rights to access this page. ')</script>";
    echo "<script>window.location = '/home'</script>";
  }
    ?>