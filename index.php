<?php
    session_start();
    include("./admin/config/db.conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
    <?php if (isset($_SESSION['admin_logged_in'])) { ?>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fs-5">Admin</h1>
            <a href="./admin/index.php" class="btn btn-success text-white btn-sm">Back to admin</a>
        </div>
    <?php } ?>

    <nav class="navbar navbar-expand-md bg-body-tertiary">
        <div class="container">
            <div class="logo navbar-brand">
            <i class="fa-solid fa-gear fa-xl"></i>    
            <span class="text-dark">MSC</span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn btn-success me-2">Login</button>
                    <button class="btn btn-success">Signup</button>
                </div>
            </div>
        </div>
    </nav>

    <div class="hero d-flex justify-content-center align-items-center">
        <div class="hero-content">
            <h1>
                Welcome to MSC -<br /> Your One-Stop Shop for Quality Products!
            </h1>
            <h3>
            Discover the Latest Trends and Must-Have Items
            </h3>
            <p>
            At MSC, we pride ourselves on bringing you a curated selection of the latest trends and timeless classics. Explore our collection to find the perfect products that suit your lifestyle.
            </p>
        </div>
    </div>

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>