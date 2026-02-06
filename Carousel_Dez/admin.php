<?php
include "db.php";

$nextID = 1;
$result = $conn->query("SELECT MAX(product_id) AS product_id FROM products");
if ($result && $row = $result->fetch_assoc()) {
    $nextID = $row["product_id"] + 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./assets\dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="./assets\dist\js\bootstrap.bundle.min.js">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .container1 {
        display: flex;
        gap: 150px;
        margin-left: 70px;

    }

    table {
        border-collapse: collapse;
        text-align: center;
    }

    td,
    th {
        padding: 5px;
        border: 1px solid black;
    }

    td {
        height: 80px;
        width: 120px;
    }

    .box {
        width: 100%;
    }

    img {
        height: 100%;
        width: 100%;
    }
</style>

<body>
    <?php include "header.php" ?>
    <div class="container1 mt-5">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <h3><strong>Add Product</strong></h3>

            <div class="container-fluid">
                <label for="">Product Id: </label>
                <input type="number" name="p_id" placeholder="" class="box" value="<?php echo $nextID ?>" readonly>
            </div>

            <div class="container-fluid">
                <label for="">Product Name: </label>
                <input class="box" type="text" name="p_name" autocomplete="off">
            </div>
            <div class="container-fluid">
                <label for="">Product Price: </label>
                <input class="box" type="number" name="p_price" autocomplete="off">
            </div>
            <div class="container-fluid">
                <label for="">Product Stocks: </label>
                <input class="box" type="number" name="p_stocks" autocomplete="off">
            </div>
            <div class="container-fluid">
                <label for="">Product Image: </label>
                <input class="box" type="file" name="p_image">
            </div>
            <div class="container-fluid">
                <button class="btn btn-primary mt-4" name="submit">Add Product</button>
            </div>
        </form>

        <table border="0">
            <thead>
                <tr>
                    <th colspan="5">
                        <h3><strong>Product List</strong></h3>
                    </th>
                </tr>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Stocks</th>
                    <th>Product Image</th>
                </tr>
            </thead>

            <tbody>
                <?php

                include "db.php";

                $query = "SELECT * FROM products";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row["product_id"] ?></td>
                            <td><?php echo $row["product_name"] ?></td>
                            <td>₱<?php echo $row["product_price"] ?></td>
                            <td><?php echo $row["stock"] ?></td>
                            <td><img src="showImage.php?id=<?php echo $row["product_id"] ?>" alt=""></td>
                        </tr>

                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'> No Products</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php include "footer.php"?>
    <script>
        fetch("fetch.php")
            .then(response => response.json())
            .then(data => {
                data.forEach(student => {
                    const tbody = document.createElement('tr');
                    row.innerHTML = `
                <td>${student.id}</td>
                <td>${student.name}</td>
                <td>${student.price}</td>
                <td>${student.stock}</td>
                <td>${student.image}</td>
                `;
                    tbody.appendChild(row);
                });
            })
    </script>
</body>

</html>