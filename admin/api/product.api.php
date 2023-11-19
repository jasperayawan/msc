<?php
include("../config/db.conn.php");


// insert data to database
if($_GET["action"] === "insertData"){
    if(!empty($_POST["product_name"]) && !empty($_POST["description"]) && !empty($_POST["price"])
    && !empty($_POST["category_id"]) && $_FILES["image"]["size"] != 0) {

        $product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $category_id = mysqli_real_escape_string($conn, $_POST["category_id"]);

        // rename the image before saving to database
        $original_name = $_FILES["image"]["name"];
        $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $new_name);

        $sql = "INSERT INTO `product`(`id`,`product_name`,`image`, `description`, `price`, `category_id`) VALUES (NULL,'$product_name','$new_name','$description','$price','$category_id')";
    
    
        if(mysqli_query($conn, $sql)) {
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data inserted successfully!"
            ]);
        } else {
            echo json_encode([
                "statusCode" => 500,
                "message" => "Failed to insert data!"
            ]);
        }
    } else {
        echo json_encode([
            "statusCode" => 400,
            "message" => "Please fill all the required fields"
        ]);
    }
}



// fetch data to database
if($_GET["action"] === "fetchData"){
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    $data = [];

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode([  
        "data" => $data 
    ]);
}

// fetch data of individual user for edit form
if($_GET["action"] === "fetchSingle"){
    $id = $_POST["id"];
    $sql = "SELECT * FROM product WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        header("Content-Type: application/json");
        echo json_encode([
            "statusCode" => 200,
            "data" => $data
        ]);
    } else {
        echo json_encode([
            "statusCode" => 404,
            "message" => "No user found with this id"
        ]);
    }
    mysqli_close($conn);
}

if($_GET["action"] === "deleteData"){
    $id = $_POST["id"];
    $delete_image = $_POST["delete_image"];

    $sql = "DELETE FROM product WHERE `id`=$id";

    if(mysqli_query($conn, $sql)){
        unlink("../uploads/" . $delete_image);

        echo json_encode([
            "statusCode" => 200,
            "message" => "Data deleted successfully!"
        ]);
    } else {
        echo json_encode([
            "statusCode" => 500,
            "message" => "failed to delete data"
        ]);
    }
}



// function to update data
if($_GET["action"] === "updateData"){
    if(!empty($_POST["product_name"]) && !empty($_POST["description"]) && !empty($_POST["price"])
    && !empty($_POST["category_id"])){

        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $category_id = mysqli_real_escape_string($conn, $_POST["category_id"]);

        if($_FILES["image"]["size"] != 0){

             // rename the image before saving to database

            $original_name = $_FILES["image"]["name"];
            $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["image"]["tmp_name"], "../uploads/" . $new_name);

            // remove the old image from uploads directory

            unlink("../uploads/" . $_POST["image_old"]);
        } else {
            $new_name = mysqli_real_escape_string($conn, $_POST["image_old"]);
        }

        $sql = "UPDATE `product` SET `product_name`='$product_name',`image`='$new_name',`description`='$description',`price`='$price',`category_id`='$category_id' WHERE `id`=$id";
        
        if(mysqli_query($conn, $sql)) {
            echo json_encode([
                "statusCode" => 200,
                "message" => "Data updated successfully!"
            ]);
        } else {
            echo json_encode([
                "statusCode" => 500,
                "message" => "Failed to update data!"
            ]);
        }

        mysqli_close($conn);
    } else {
        echo json_encode([
            "statusCode" => 400,
            "message" => "Please fill all the required fields"
        ]);
    }
}
?>
