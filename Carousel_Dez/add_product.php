<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: black;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        .container form {
            width: 80%;
        }

        .container button {
            padding: 5px;
            margin: 20px 75px;

        }

        .input-container {
            padding: 6px;
            border-radius: 8px;
            width: 80%;
        }

        .container-input {
            width: 100%;
            margin: 12px 0px;
        }


    </style>
</head>

<?php
if (isset($_POST["add"])) {
    $name = $_POST["product_name"];
    $price = $_POST["price"];
    $stocks = $_POST["stocks"];
    $image = file_get_contents($_FILES["image"]["tmp_name"]);


    include "db.php";

    $sql = "INSERT INTO products (`product_name`, `product_price`, `stock`, `picture`) VALUES ('$name', '$price', '$stocks', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully'); window.location.href='add_product.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<body>
    <div class="container">
        <form action="add_product.php" method="POST">
            <div class="container-input">
                <label for="">Product Name:</label>
                <input type="text" name="product_name" id="name" class="input-container">
            </div>
            <div class="container-input">
                <label for="">Product Price:</label>
                <input type="number" name="price" id="price" class="input-container">
            </div>
            <div class="container-input">
                <label for="">Stocks:</label>
                <input type="number" name="stocks" id="stocks" class="input-container">
            </div>
            <div class="container-input">
                <label for="">Product Image:</label>
                <input type="file" name="image" id="file" class="input-container">
            </div>
            <button name="add">Add Product</button>
        </form>
    </div>
</body>

</html>