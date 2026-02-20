<?php
// upload.php - File to handle image upload and product insertion into the database, galing admin page to 
// Sample pag process ng form sa ibang file.
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_id = $_POST["p_id"];
    $name = $_POST["p_name"];
    $price = $_POST["p_price"];
    $stock = $_POST["p_stocks"];
    if (!isset($_FILES["p_image"]) || $_FILES["p_image"]["error"] !== 0) {
        die("Error");
    }
    $imageData = file_get_contents($_FILES["p_image"]["tmp_name"]);
    // ^^ btw eto ung lalagay nyo sa values (yung sa my bind_param) kapag blob data yung image nyo. Hindi yung name ng file input nyo sa form.
    // ^^ since blob data yung image, kailangan natin i-convert sa binary data gamit yung "file_get_contents" function.
    $sql = "INSERT INTO products (product_id, product_name, product_price, stock, picture) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdis", $p_id, $name, $price, $stock, $imageData);
    // "isdis" means: i - integer, s - string, d - double, b - blob (binary data)
    if ($stmt->execute()) {
        echo "<script>alert('Succesful'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    // code ni sir to
}


