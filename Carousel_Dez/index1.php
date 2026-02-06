<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Product Grid */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      width: 90%;
      margin: auto;
      padding: 20px;
    }

    .product-card {
      width: 100%;
      margin: auto;
      padding: 20px;
      background-color: white;
      border: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-img-holder {
      width: 100%;
      height: 250px;
      overflow: hidden;
      margin-bottom: 15px;
    }

    .product-img-holder {
      height: 200px;
    }

    .product-img-holder img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .label-box {
      margin-bottom: 10px;
      font-size: 18px;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 12px;
    }

    .add-to-cart,
    .buy-now {
      flex: 1;
      padding: 10px;
      font-size: 15px;
      cursor: pointer;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      transition: 0.3s;
    }
  </style>
</head>

<body>
  <main>
    <div>
    </div>
    <div class="container">
      <section>

        <?php
        include "db.php";
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        ?>
        <div class="product-grid">
          <?php

          if ($result->num_rows > 0) {
            while ($product = $result->fetch_assoc()) {
          ?>
              <div class="product-card">
                <div class="product-img-holder">
                  <img src="showImage.php?id=<?php echo $product['product_id']; ?>" alt="Product Image">
                </div>
                <div class="label-box">
                  <strong>Product Name: </strong> <?php echo $product["product_name"]; ?>
                </div>
                <div class="label-box">
                  <strong>Price: ₱</strong> <?php echo number_format($product["product_price"], 2) ?>
                </div>
                <div class="label-box">
                  <strong>Stocks Available: </strong> <?php echo $product["stock"]; ?>
                </div>
                <div class="btn_group">
                  <button class="add-to-cart" onclick="addToCart(<?php echo $product['product_id']; ?>)">Add to cart</button>
                  <button class="buy-now" onclick="buyNow(<?php echo $product['product_id']; ?>)">Buy now</button>
                </div>
              </div>

          <?php

            }
          } else {
            echo "<p> No Products available.</p>";
          }

          $conn->close();
          ?>
      </section>
    </div>
    </div>
  </main>
</body>

</html>