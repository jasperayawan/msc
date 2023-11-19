<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("./links.php")?>
</head>
<body>
<div class="sidebar">
            <div class="logo">Admin</div>
            <ul class="navbar-nav ul-container">
                <li class="nav-link ps-5"><a href="/admin/dashboard.php" class="nav-link">
                <i class="fa-brands fa-dashcube fa-sm"></i>
                Dashboard</a></li>
                <li class="nav-link ps-5"><a href="" class="nav-link">
                <i class="fa-solid fa-user fa-sm"></i>    
                Users</a></li>
                <li class="nav-link ps-5"><a href="/admin/product.php" class="nav-link">
                <i class="fa-solid fa-box fa-sm"></i>   
                Product</a></li>
                <li class="nav-link ps-5"><a href="logout.php" class="nav-link">
                <i class="fa-solid fa-right-from-bracket fa-xs"></i>    
                Logout</a></li>
            </ul>
        </div>
</body>
</html>