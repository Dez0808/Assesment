<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="carousel.css" rel="stylesheet" />
  <script src="assets/js/color-modes.js"></script>
  <title>Carousel</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }



    /* Product Grid */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      width: 100%;
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
      border: 2px solid black;
      border-radius: 15px;
      transition: 200ms ease-in-out;
    }

    .product-card:hover {
      transform: translateY(-10px);

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
      object-fit: fill;
    }

    .label-box {
      margin-bottom: 10px;
      font-size: 18px;
    }



    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    .add-to-cart,
    .buy-now {
      flex: 1;
      padding: 8px;
      font-size: 13px;
      cursor: pointer;
      border-radius: 6px;
      font-weight: bold;
      transition: 0.3s;
    }

    .add-to-cart:hover,
    .buy-now:hover {
      background-color: green;
    }

    footer {
      margin-top: 50px;
      background-color: green;
      color: white;
      height: 70px;
      line-height: 75px;
      font-weight: bold;
      padding: 0px 20px;
    }

    /* MODAL */
    .active {
      display: block;
    }

    .modal {
      position: fixed;
      border-radius: 12px;
      scrollbar-width: none;
      padding: 18px 500px;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .modal-box {
      border: 1px solid black;
      border-radius: 12px;
      background-color: white;
      padding: 12px;
    }

    .buy-form img {
      width: 100%;
      height: 250px;
      border: 2px solid black;
      margin-bottom: 3px;
    }

    input[type=text],
    input[type=number] {
      width: 100%;
      padding: 3px;
    }
  </style>
</head>


<body>
  <?php include "header.php"; ?>

  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://media.licdn.com/dms/image/v2/C4E12AQHEfiIV5Xj67g/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1520043246063?e=2147483647&v=beta&t=1tqMXQHzsF0-8xCBTtwwPb-R_XRxT1In8SIGh0KZ_9Q"
          alt="Carousel Image 1" width="100%" height="100%">

        <div class="container">

        </div>
      </div>
      <div class="carousel-item">
        <img src="https://cdn.prod.website-files.com/64022de562115a8189fe542a/68962edfa5a1c7dcf1ca3532_6616718fe4a871d7278a2037_Product-Concept-What-Is-It-And-How-Can-You-Best-Use-It.jpeg"
          alt="Carousel Image 2" width="100%" height="100%">
        <div class="container">

        </div>
      </div>
      <div class="carousel-item">

        <img src="https://www.shipbob.com/wp-content/uploads/2022/06/PRODUCT-RANGE.jpg" alt="Carousel Image 3">
        <div class="container">

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <div class="container">
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
            <div class="btn-group">
              <button class="add-to-cart" onclick="addToCart(<?php echo $product['product_id']; ?>)">Add to cart</button>

              <button class="buy-now" name="buy" onclick="buyNow(<?php echo $product['product_id']; ?>,
                '<?php echo $product['product_name']; ?>',
                '<?php echo $product['product_price']; ?>'
                )">Buy now</button>
            </div>
          </div>

      <?php

        }
      } else {
        echo "<p> No Products available.</p>";
      }

      $conn->close();
      ?>
    </div>

    <div class="modal" id="modal">
      <div class="modal-box">
        <h4 align="center"><strong>Confirm Purchase</strong></h4>

        <form action="sold.php" method="POST" class="buy-form">
          <input type="hidden" name="product_id" id="product_id">
          <img src="" alt="" id="img">

          <div class="product-divider">
            <label for="">Product: </label>
            <input type="text" name="product_name" id="product_name" readonly>
            <label for="">Price: </label>
            <input type="number" name="product_price" id="product_price" readonly>

            <label for="">Quantity: </label>
            <input type="number" name="quantity" id="quantity" required min="1" oninput="compute()">

            <label for="">Total: </label>
            <input type="number" name="total_price" id="total_price" readonly>

            <div class="buttons mt-3">
              <center>
                <button type="submit" id="order" class="btn btn-success">Place Order</button>
                <button type="button" onclick="closeModal()" id="close" class="btn btn-danger">Close</button>
              </center>
            </div>

          </div>
        </form>
      </div>
    </div>

  </div>

  <footer>
    <p>
      &copy; 2017–2025 Company, Inc. &middot;
      <a href="#">Privacy</a> &middot; <a href="#">Terms</a>
    </p>
  </footer>

  <script>
    function buyNow(id, name, price) {
      document.getElementById("modal").classList.add("active");
      document.getElementById("product_id").value = id;
      document.getElementById("product_name").value = name;
      document.getElementById("product_price").value = price;
      document.getElementById("quantity").value = "1";
      document.getElementById("total_price").value = price;
      document.getElementById("img").src = "showImage.php?id=" + id;
    }

    function closeModal() {
      document.getElementById("modal").classList.remove("active");
    }

    function compute() {
      let price = document.getElementById("product_price").value;
      let qty = document.getElementById("quantity").value;
      document.getElementById("total_price").value = price * qty;
    }
  </script>


  <script src="./assets/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>

</body>

</html>