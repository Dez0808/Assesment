<?php
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

    $sql = "INSERT INTO products (product_id, product_name, product_price, stock, picture) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdis", $p_id, $name, $price, $stock, $imageData);

    if ($stmt->execute()) {
        echo "<script>alert('Succesful'); window.location.href='admin.php';</script>";

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
