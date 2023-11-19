<?php
    session_start();
    require('./config/db.conn.php');

   // Check if the admin is not logged in
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("./links.php") ?>
</head>
<body>
    <div class="containers">
        <div class="left-container">
            <?php include("./sidebar.php")?>
        </div>
        <div class="right-container">
           <div class="topbar d-flex justify-content-between align-items-center">
            <h1 class="title_dashboard">
            Welcome to Dashboard
            </h1>
            <a href="/index.php" class="btn bg-success text-white btn-md">Go to home</a>
           </div>
        </div>
    </div>

</body>
</html>