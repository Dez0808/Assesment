<?php


$name = $_POST["p_name"];
$price = $_POST["p_price"];
$stock = $_POST["p_stocks"];
$image = file_get_contents($_FILES["p_image"]["tmp_name"]);

if (isset($_POST["submit"])) {
 //   $target_dir = "uploads/";
   // $target_file = $target_dir . basename($_FILES["p_image"]["tmp_name"]);

   // if (move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)) {
   //     echo "Done";
   // } else {
    //    echo "Error";
   // }
    include "db.php";

    $sql = "INSERT INTO products (product_name, product_price, stock, picture) VALUES ('$name', '$price', '$stock', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Succesful'); window.location.href='admin.php';</script>";
    } else {
        echo "Error";
    }
}
