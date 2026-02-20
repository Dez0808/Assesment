<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="assets/js/color-modes.js"></script>
  <title>Product Page</title>

  <style>
    .card-img-top {
      height: 200px;
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


    /* MODAL */
    .active {
      display: block;
    }

    .modal {
      position: fixed;
      border-radius: 12px;
      scrollbar-width: none;
      padding: 18px 150px;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .modal-box {
      border: 1px solid black;
      border-radius: 12px;
      background-color: white;
      padding: 20px;
      margin-top: 120px;
    }

    .buy-form {
      display: flex;
      gap: 40px;
    }

    .buy-form img {
      width: 100%;
      height: 100%;
      border: 2px solid black;
      margin-bottom: 3px;
    }

    .image-box {
      width: 100%;
    }

    input[type=text],
    input[type=number],
    input[type=email] {
      width: 100%;
      padding: 2px;
    }

    .card-title {
      font-size: 18px;
    }
  </style>
</head>

<body>
  <header>
    <?php include "header.php" ?>
  </header>

  <main class="p-5 mb-5">

    <?php
    include "db.php";
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    ?>

    <div class="row row-cols-1 row-cols-md-4 g-4">

      <?php

      if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
      ?>
          <div class="col">
            <div class="card">
              <img src="showImage.php?id=<?php echo $product['product_id']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                <p class="card-text">Price: ₱<?php echo $product['product_price']; ?></p>
                <p class="card-text" id="stock">Stocks Available: <?php echo $product['stock']; ?></p>
                <div class="btn-group">
                  <button class="add-to-cart" onclick="addToCart(<?php echo $product['product_id']; ?>)">Add to
                    cart</button>
                  <button class="buy-now" name="buy" id="buy-now" onclick="buyNow(<?php echo $product['product_id']; ?>,
                '<?php echo $product['product_name']; ?>',
                '<?php echo $product['product_price']; ?>'
                )">Buy now</button>
                </div>
              </div>
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

        <form action="sold.php" method="POST" class="buy-form">

          <div class="image-box">
            <img src="" alt="" id="image">
          </div>


          <div class="purchase-info">
            <h4 align="center"><strong>Confirm Purchase</strong></h4>
            <input type="hidden" name="product_id" id="product_id">

            <div class="product-divider">
              <label for="">Product: </label>
              <input type="text" name="product_name" id="product_name" readonly>
              <label for="">Price: </label>
              <input type="number" name="product_price" id="product_price" readonly>

              <label for="">Quantity: </label>
              <input type="number" name="quantity" id="quantity" required min="1" max="" oninput="compute()">

              <label for="">Total: </label>
              <input type="number" name="total_price" id="total_price" readonly>
              <div class="buttons mt-3">
                <center>
                  <button type="submit" id="order" class="btn btn-success">Place Order</button>
                  <button type="button" onclick="closeModal()" id="close" class="btn btn-danger">Close</button>
                </center>
              </div>
            </div>
          </div>

          <div class="buyer-info">
            <h4 align="center"><strong>Customer Information</strong></h4>
            <label for="">Customer name: </label>
            <input type="text" name="buyer-name" id="buyer-name" required>
            <label for="">Email: </label>
            <input type="email" name="email" id="email" required>
            <label for="">Address: </label>
            <input type="text" name="address" id="address" required>
            <label for="">Contact No: </label>
            <input type="number" name="contact" id="contact" required>
          </div>

        </form>
      </div>
    </div>

  </main>


  <footer>
    <?php include "footer.php" ?>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const cards = document.querySelectorAll(".col");

      cards.forEach((card) => {
        const stockText = card.querySelector("#stock").innerText;
        const buyBtn = card.querySelector(".buy-now")
        if (stockText.includes("0")) {
          buyBtn.disabled = true;
          buyBtn.style.pointerEvents = "none";
          buyBtn.style.opacity = "0.5";
        }
      });
    });
// Additional code para pag may stock na 0, magiging disabled yung buy now button. so hindi na pwedeng i click yung buy now button kapag wala ng stock.

    function buyNow(id, name, price) {
      document.getElementById("modal").classList.add("active");
      // pag click ng buy now, lalabas yung modal. "active" class yung nag cocontrol kung nakikita or hindi yung modal.
      // sa bootstrap kasi pag sa div nakalagay yung class na "modal" automatic na siyang hidden, kaya my add class na "active"
      // so add kayo ng .active { display: block; } sa css nyo para mag work.
      document.getElementById("product_id").value = id;
      document.getElementById("product_name").value = name;
      document.getElementById("product_price").value = price;
      // so pag click ng buy now, lalabas yung modal then automatic na mapupuno yung mga input sa modal ng name, price, at id ng product na binili.
      document.getElementById("quantity").value = "1";
      document.getElementById("total_price").value = price;
      document.getElementById("image").src = "showImage.php?id=" + id;
      // para mag show din yung image sa modal. 
    }

    function closeModal() {
      document.getElementById("modal").classList.remove("active");
      // pag click ng close button, mawawala yung modal. remove class na "active" para mawala yung display block sa css nyo.
    }

    function compute() {
      let price = document.getElementById("product_price").value;
      let qty = document.getElementById("quantity").value;
      document.getElementById("total_price").value = price * qty;
      // so pag nag input ng quantity, automatic na mag compute yung total price. price * quantity.
    }
  </script>


  <script src="assets/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>

</body>

</html>