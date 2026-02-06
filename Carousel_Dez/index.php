<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="carousel.css" rel="stylesheet" />
    <script src="assets/js/color-modes.js"></script>
    <title>Admin Panel</title>

    <style>
        body {}
    </style>
</head>

<body>
    <?php include "header.php" ?>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="1.png" alt="Carousel Image 1" width="100%" height="100%">

                <div class="container">

                </div>
            </div>
            <div class="carousel-item">
                <img src="2.png" alt="Carousel Image 2" width="100%" height="100%">
                <div class="container">

                </div>
            </div>
            <div class="carousel-item">

                <img src="3.png" alt="Carousel Image 3">
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
        <div class="row mb-5">

            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Announcement</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab ratione
                            repudiandae, harum et officia sunt accusantium cumque accusamus cum illum at laborum magnam
                            praesentium optio quibusdam voluptate adipisci aperiam tempora.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Updates</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab ratione
                            repudiandae, harum et officia sunt accusantium cumque accusamus cum illum at laborum magnam
                            praesentium optio quibusdam voluptate adipisci aperiam tempora.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include "footer.php" ?>

    <script src="./assets/dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>
</body>

</html>