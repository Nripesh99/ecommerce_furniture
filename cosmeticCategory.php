<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Skin Care Shop</title>
  <style>
    <?php include "Assets/style.css" ?>
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  include 'components/navbar.php';
  ?>
  <center>
    <div class="crousel-box">
      <?php
      include 'components/crousel.php';
      ?>
    </div>
  </center>

  <div class="container">
    <h2 class="trending-products">Cosmetics Products</h2>
    <div class="container mt-5 d-flex flex-wrap" id="card-container">
      <?php
      include "config/db.php";

      $sql = "select * from product_details where category='cosmetic'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        $product_name = $row['product_name'];
        $price = $row['product_price'];
        $product_id = $row['product_id'];
        $image = $row['product_image'];
      ?>
            <div class="col-md-3">
          <div class="wsk-cp-product">
            <a href="getProductDetails.php?product_id=<?php echo ($product_id) ?>" style="text-decoration: none;">
              <div class="wsk-cp-img">
                <img src="uploads/<?php echo ($image) ?>" alt="Product" class="img-responsive" />
              </div>
              <div class="wsk-cp-text">
                <div class="category"></div>
                <div class="title-product">
                  <h3>
                    <?php echo ($product_name) ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="wcf-left"><span class="price"> Rs.
                      <?php echo ($price) ?>
                    </span></div>
                  <div class="wcf-right"><a href="#" class="buy-btn"><i class="bi bi-cart"></i></a></div>
                </div>
              </div>
            </a>
          </div>
        </div>
     
        

      <?php
      }
      ?>

    </div>

  </div>


  <?php
  include "components/footer.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>