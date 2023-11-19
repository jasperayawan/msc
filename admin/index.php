<?php
require('./config/db.conn.php');

// Start a session (if not already started)
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["admin-username"];
    $password = $_POST["admin-password"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM admin_user WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Valid credentials, redirect to the dashboard or another page
        $_SESSION['admin_logged_in'] = true;
 
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, set an error message
        $error_message = "Invalid username or password";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Check if the user is already logged in, redirect to the dashboard

if(isset($_SESSION['admin_logged_in'])){
    header("Location: dashboard.php");
    exit();
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS bootstrap -->
    <?php include("./links.php");?>
</head>
<body>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>

    <?php if (isset($_SESSION['admin_logged_in'])) { ?>
        <div class="alert alert-success">This is a success alert!</div>
    <?php } ?>


    <div class="form-container w-lg-25 px-2 d-flex justify-content-center align-items-center gap-y-10">
        <h1 class="mb-5 title_admin">ADMIN LOGIN</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                <div class="w-100">
                    <input type="username" name="admin-username" placeholder="username" class="form-control" required>
                </div>
                <div class="w-100">
                    <input type="password" name="admin-password" placeholder="password" class="form-control" required>
                </div>
                <button class="btn btn-success w-100" name="login" type="submit">login</button>
            </div>
        </form>
    </div>

<?php include("./script.php"); ?>
</body>
</html>