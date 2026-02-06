<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="assets/js/color-modes.js"></script>
  <style>
    main {
      display: flex;
      gap: 20px;
    }

    .form-container {
      width: 50%;
    }
  </style>
</head>

<body>
  <?php include "header.php" ?>

  <main class="p-5">
    <div class="form-container">

      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name: </label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Juan Dela Cruz">
        <label for="exampleFormControlInput1" class="form-label">Email address: </label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        <label for="exampleFormControlInput1" class="form-label">Contact: </label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="09123456789">
        <label for="exampleFormControlInput1" class="form-label">Subject: </label>
        <input type="email" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
    </div>
    <div class="container">
      <svg aria-hidden="true" class="bd-placeholder-img" height="100%" preserveAspectRatio="xMidYMid slice" width="100%"
        xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
      </svg>
    </div>
  </main>

  <?php include "footer.php" ?>
</body>

</html>