<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "msc";

    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>