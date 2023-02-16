<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Unit 240</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../login.css">
</head>

<div class="logo-overlay">
    <img src="https://i.imgur.com/Exlcutf.png" alt="logo" width="150px">
</div>

<body>
    <main class="w-100 m-auto container row justify-content-center col-md-6 card shadow-sm card-body bg-dark">
        <h1 class="main-heading text-white">Login</h1>
        <form method="POST">
            <div class="row mb-3">
                <label for="username" class="col-md-4 col-form-label text-md-end text-white">Username</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end text-white">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
            </div>

            <div class="row mb-0 mt-4">
                <div class="col-md-8 offset-md-3">
                    <button name="login" class="btn btn-primary py-1 px-4">Login</button>

                    <a class="text-decoration-none ps-4" href="/user/register">
                        Don't have an account? Sign up
                    </a>
                </div>
            </div>
        </form>
    </main>
</body>

</html>